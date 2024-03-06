<?php
session_start();

if (isset($_GET['lang'])) {
    setcookie('lang', $_GET['lang'], time() + (6 * 30 * 24 * 60 * 60));
    header('Location: index.php');
    exit;
}

if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'ukr';
}

switch ($lang) {
    case 'ukr':
        $selected_language = 'Вибрана мова: Українська';
        break;
    case 'en':
        $selected_language = 'Вибрана мова: Англійська';
        break;
    case 'pl':
        $selected_language = 'Вибрана мова: Польська';
        break;
    case 'fr':
        $selected_language = 'Вибрана мова: Французька';
        break;
    case 'de':
        $selected_language = 'Вибрана мова: Німецька';
        break;
    case 'rus':
        $selected_language = 'Вибрана мова: Російська';
        break;
    default:
        $selected_language = 'Вибрана мова: Українська';
        break;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['about'] = $_POST['about'];
}

$loginValue = isset($_SESSION['login']) ? $_SESSION['login'] : '';
$genderValue = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
$cityValue = isset($_SESSION['city']) ? $_SESSION['city'] : '';
$aboutValue = isset($_SESSION['about']) ? $_SESSION['about'] : '';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <title>Завдання 3</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <p><?php echo $selected_language; ?></p>

    <form action="display.php" method="post" enctype="multipart/form-data">

        <label for="login">Логін:</label>
        <input class="input-margin" type="text" id="login" name="login" value="<?php echo $loginValue; ?>"><br>

        <label for="password">Пароль:</label>
        <input class="input-margin" type="password" id="password" name="password"><br>

        <label for="password_confirm">Пароль ще раз:</label>
        <input class="input-margin" type="password" id="password_confirm" name="password_confirm"><br>
        </div>

        <label for="gender">Стать:</label>
        <input class="radio-margin" type="radio" id="male" name="gender" value="Чоловік" <?php if ($genderValue === 'Чоловік') echo 'checked'; ?>>
        <label for="male">Чоловік</label>
        <input type="radio" id="female" name="gender" value="Жінка" <?php if ($genderValue === 'Жінка') echo 'checked'; ?>>
        <label for="female">Жінка</label><br>

        <label for="city">Місто:</label>
        <select class="input-select" id="city" name="city">
            <option value="Київ" <?php if ($cityValue === 'Київ') echo 'selected'; ?>>Київ</option>
            <option value="Львів" <?php if ($cityValue === 'Львів') echo 'selected'; ?>>Львів</option>
            <option value="Житомир" <?php if ($cityValue === 'Житомир') echo 'selected'; ?>>Житомир</option>
        </select><br>


        <label for="games">Улюблені ігри:</label>
        <ul class="checkboxes">
            <li class="checkbox-group">
                <input type="checkbox" id="game1" name="games[]" value="футбол">
                <label for="game1">футбол</label>
            </li>
            <li class="checkbox-group">
                <input type="checkbox" id="game2" name="games[]" value="баскетбол">
                <label for="game2">баскетбол</label>
            </li>
            <li class="checkbox-group">
                <input type="checkbox" id="game3" name="games[]" value="волейбол">
                <label for="game3">волейбол</label>
            </li>
            <li class="checkbox-group">
                <input type="checkbox" id="game4" name="games[]" value="шахи">
                <label for="game4">шахи</label>
            </li>
            <li class="checkbox-group">
                <input type="checkbox" id="game5" name="games[]" value="World of Tanks">
                <label for="game5">World of Tanks</label>
            </li>
            <li class="checkbox-group">
                <input type="checkbox" id="game6" name="games[]" value="Cult of the Lamb">
                <label for="game6">Cult of the Lamb</label>
            </li>
        </ul>

        <label for="about">Про себе:</label><br>
        <textarea class="textarea-margin" id="about" name="about"><?php echo $aboutValue; ?></textarea><br>

        <label for="photo">Фотографії:</label>
        <input class="st-margin" type="file" id="photo" name="photo"><br><br>

        <input class="st-margin" type="submit" value="Зареєструватися">
    </form>
    <br>
    <div style=" background-color: #37365c; padding: 10px;  width: 350px;">
        <a href="index.php?lang=ukr"><img style="width: 55px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Ukraine.svg/250px-Flag_of_Ukraine.svg.png"></a>
        <a href="index.php?lang=rus"><img style="width: 55px;" img src="https://upload.wikimedia.org/wikipedia/commons/f/f3/Flag_of_Russia.svg"></a>
        <a href="index.php?lang=pl"><img style="width: 55px;" img src="https://upload.wikimedia.org/wikipedia/commons/1/12/Flag_of_Poland.svg"></a>
        <a href="index.php?lang=en"><img style="width: 55px;" img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/US_flag_51_stars.svg/300px-US_flag_51_stars.svg.png"></a>
        <a href="index.php?lang=de"><img style="width: 55px;" img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Germany.svg/2560px-Flag_of_Germany.svg.png.png"></a>
        <a href="index.php?lang=fr"><img style="width: 55px;" img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Flag_of_France_%281794%E2%80%931815%2C_1830%E2%80%931974%29.svg/250px-Flag_of_France_%281794%E2%80%931815%2C_1830%E2%80%931974%29.svg.png"></a>
    </div>
</body>

</html>