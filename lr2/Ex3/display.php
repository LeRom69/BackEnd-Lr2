<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}


$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$games = isset($_POST['games']) ? implode("<p style='margin-left: 106px;
margin-top: -15px;'>", $_POST['games']) : "</p>";
$about = $_POST['about'];
echo "<div>";
echo "<p style='margin-left: 58px;'><span style='color: #9e9e9e;'>Логін</span>: $login</p>";
echo "<p style='margin-left: 58px;'><span style='color: #9e9e9e;'>Стать</span>: $gender</p>";
echo "<p style='margin-left: 56px;'><span style='color: #9e9e9e;'>Місто</span>: $city</p>";
echo "<p><span style='color: #9e9e9e;'>Улюблені ігри</span>: $games</p>";
echo "<p style='margin-left: 36px;'><span style='color: #9e9e9e;'>Про себе</span>: <span>$about</span></p>";
echo "</div>";

if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($photo_tmp, $photo_name);
} else {
    $photo_name = 'No photo uploaded';
}

unset($_SESSION['login']);
unset($_SESSION['gender']);
unset($_SESSION['city']);
unset($_SESSION['about']);
unset($_SESSION['photo']);

echo "<p style='color: #9e9e9e;margin-top: 120px;margin-left: 58px;'>Фото:</p>";
echo "<img style='width: 360px;margin-top: -145px;margin-left: 105px;' src='$photo_name' alt='Uploaded Image'>";
echo "<br>";
echo "<a href ='index.php'> Повернутися назад</a>"
?>