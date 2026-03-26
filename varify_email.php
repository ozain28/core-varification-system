<?php
include "config.php";

if(isset($_POST['verify'])){
    $code = $_POST['code'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND email_code=?");
    $stmt->bind_param("ss", $email, $code);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0){
        $conn->query("UPDATE users SET verified_email=1 WHERE email='$email'");
        echo "Email verified!";
    } else {
        echo "Invalid code!";
    }
}
?>

<form method="post">
Email: <input type="email" name="email" required><br>
Code: <input type="text" name="code" required><br>
<button name="verify">Verify Email</button>
</form>