<?php
include "config.php";
include "functions.php";

if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Generate codes
    $email_code = generateOTP();
    $number_code = generateOTP();

    // Save user in DB (unverified)
    $stmt = $conn->prepare("INSERT INTO users (email, number, password, email_code, number_code, verified_email, verified_number) VALUES (?, ?, ?, ?, ?, 0, 0)");
    $stmt->bind_param("sssss", $email, $number, $password, $email_code, $number_code);
    $stmt->execute();

    // Send codes
    sendEmail($email, "Email Verification", "Your code is: $email_code");
    sendSMS($number, "Your verification code is: $number_code");

    echo "Signup successful! Check email & phone for codes.";
}
?>

<form method="post">
Email: <input type="email" name="email" required><br>
Number: <input type="text" name="number" required><br>
Password: <input type="password" name="password" required><br>
<button name="signup">Sign Up</button>
</form>