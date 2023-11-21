<?php
    session_start();
    require "./Connection.php";

    $is_login = false;

    //get data from login form
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

//check if email exists in database
$query = "SELECT * FROM user WHERE Email=?;";
$stmt = $db->prepare($query);
var_dump($email);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$db->close();


if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    
    $_SESSION['userid'] = $row['userid'];
    $_SESSION['fullname'] = $row['fullname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    header("Location: /front-end/home page/home.html");
} else {
    header("Location: /front-end/Login Page & Register Page/HTML/Login.php");
}

}

?>


