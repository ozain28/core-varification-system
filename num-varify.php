<?php
include "config.php";

if(isset($_POST['verify'])){
    $code = $_POST['code'];
    $number = $_POST['number'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE number=? AND number_code=?");
    $stmt->bind_param("ss", $number, $code);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0){
        $conn->query("UPDATE users SET verified_number=1 WHERE number='$number'");
        echo "Number verified!";
    } else {
        echo "Invalid code!";
    }
}
?>

<form method="post">
Number: <input type="text" name="number" required><br>
Code: <input type="text" name="code" required><br>
<button name="verify">Verify Number</button>
</form>