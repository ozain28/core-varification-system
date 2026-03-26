<?php
include "config.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();

    if($res && password_verify($password, $res['password'])){
        if($res['verified_email'] && $res['verified_number']){
            echo "Login successful!";
        } else {
            echo "Please verify your email & number first!";
        }
    } else {
        echo "Invalid credentials!";
    }
}
?>

<form method="post">
Email: <input type="email" name="email" required><br>
Password: <input type="password" name="password" required><br>
<button name="login">Login</button>
</form>