<!DOCTYPE html>
<html>

<head>
    <title>Ex1-2</title>
</head>

<body>
    <h1>Завдання 1-1</h1>
    <form method="post">
        <label for="text">Текст:</label><br>
        <textarea id="text" name="text" rows="4" cols="50"></textarea><br><br>
        <label for="find">Знайти:</label><br>
        <input type="text" id="find" name="find" value="<?php echo isset($_POST['find']) ? htmlspecialchars($_POST['find']) : ''; ?>"><br><br>
        <label for="replace">Замінити на:</label><br>
        <input type="text" id="replace" name="replace" value="<?php echo isset($_POST['replace']) ? htmlspecialchars($_POST['replace']) : ''; ?>"><br><br>
        <input type="submit" name="submit" value="Виконати заміну">
        <input type="hidden" name="action" value="sort">
    </form>

    <h1>Завдання 1-2 </h1>

    <form method="post">
        <label for="cities">Введіть назви міст через пробіл:</label><br>
        <input type="text" id="cities" name="cities"><br>
        <input type="hidden" name="action" value="process_other_data">
        <input type="submit" value="Впорядкувати">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["action"] == "sort") {
            $text = isset($_POST['text']) ? $_POST['text'] : '';
            $find = isset($_POST['find']) ? $_POST['find'] : '';
            $replace = isset($_POST['replace']) ? $_POST['replace'] : '';

            $result = str_replace($find, $replace, $text);

            echo "<h3>Результат:</h3>";
            echo "<p>" . htmlspecialchars($result) . "</p>";
        } elseif ($_POST["action"] == "process_other_data") {
            $cities_input = $_POST["cities"];
            $cities_array = explode(" ", $cities_input);

            sort($cities_array);

            echo "<br>Відсортовані міста: <br>";
            foreach ($cities_array as $city) {
                echo $city . " ";
            }
        }
    }

    echo "<h1>Завдання 1-3</h1>";

    $fullFilePath = 'D:\WebServers\home\testsite\www\myfile.txt';
    echo "Назва файу з розширенням - $fullFilePath<br>";

    $fileNameWithoutExtension = pathinfo($fullFilePath, PATHINFO_FILENAME);
    echo "Назва файу без розширення - $fileNameWithoutExtension";

    echo "<h1>Завдання 1-4</h1>";

    $date1 = "10-02-2015";
    $date2 = "15-02-2015";

    $date1_parts = explode('-', $date1);
    $date2_parts = explode('-', $date2);

    $date1_timestamp = mktime(0, 0, 0, $date1_parts[1], $date1_parts[0], $date1_parts[2]);
    $date2_timestamp = mktime(0, 0, 0, $date2_parts[1], $date2_parts[0], $date2_parts[2]);

    $difference = abs($date2_timestamp - $date1_timestamp);

    $days_difference = floor($difference / (60 * 60 * 24));

    echo "Перша дата - $date1";
    echo "<br>Друга дата - $date2";
    echo "<br>Кількість днів між датами: $days_difference";

    echo "<h1>Завдання 1-5</h1>";

    $passwordLength = 10;
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+{}|:<>?-=[];,./';
    $password = '';
    $charsLength = strlen($chars) - 1;
    for ($i = 0; $i < $passwordLength; $i++) {
        $password .= $chars[rand(0, $charsLength)];
    }
    echo "Згонерований пароль: $password\n";

    $containsUppercase = preg_match('/[A-Z]/', $password);
    $containsLowercase = preg_match('/[a-z]/', $password);
    $containsDigit = preg_match('/[0-9]/', $password);
    $containsSpecialChar = preg_match('/[^a-zA-Z0-9]/', $password);
    if ($containsUppercase && $containsLowercase && $containsDigit && $containsSpecialChar && strlen($password) >= 8) {
        echo "Пароль сильний.\n";
    } else {
        echo "Пароль слабкий.\n";
    }

    echo "<h1>Завдання 2-1</h1>";
    function findDuplicates($arr)
    {
        $duplicateElements = array();
        $counts = array_count_values($arr);

        foreach ($counts as $key => $value) {
            if ($value > 1) {
                $duplicateElements[] = $key;
            }
        }

        return $duplicateElements;
    }

    echo "Массив: ";
    $array = array(1, 2, 3, 4, 2, 3, 5, 6, 7, 5);
    $duplicates = findDuplicates($array);
    for ($i = 0; $i < count($array); $i++) {
        echo "$array[$i] ";
    }
    echo "<br>Повторюючі елементи масиву: ";
    foreach ($duplicates as $element) {
        echo $element . " ";
    }

    echo "<h1>Завдання 2-2</h1>";

    $Arr1 = array("ки", "мар", "сик", "сер", "ик", "мер", "яр", "кар", "бер", "зар", "ад", "лед", "ал", "иса", "им", "рук", "цик");

    echo "КРУТИМ БАРАБАН.....<br><br><br><br>";
    echo "Кличка вашего кота.....<br>";
    for ($i = 0; $i < rand(1, 5); $i++) {

        $name = $Arr1[array_rand($Arr1, 1)];
        echo "$name";
    }

    echo "<h1>Завдання 2-3</h1>";

    function seeArray($array) {
        for ($i = 0; $i < count($array); $i++) {
        echo "$array[$i] ";
    }
}
    function createArray()
    {
        $length = rand(3, 7);
        $array = array();
        for ($i = 0; $i < $length; $i++) {
            $array[] = rand(10, 20);
        }
        return $array;
    }

    function processArrays($array1, $array2)
    {
        $mergedArray = array_merge($array1, $array2);
        $uniqueArray = array_unique($mergedArray);

        sort($uniqueArray);
        return $uniqueArray;
    }

    $array1 = createArray();
    echo "Перший масив: ";
    echo seeArray($array1);
    echo "<br>";

    $array2 = createArray();
    echo "Другий масив: ";
    echo seeArray($array2);
    echo "<br>";

    $resultArray = processArrays($array1, $array2);
    echo "Результат: ";
    echo seeArray($resultArray);

    echo "<h1>Завдання 2-4</h1>";

    $users = array(
        "Міка" => 30,
        "Аліса" => 25,
        "Павло" => 35,
        "Юлія" => 28
    );
    
    function sortUsers($users, $sortBy) {
        if ($sortBy == 'age') {
            asort($users);
        } elseif ($sortBy == 'name') {
            ksort($users);
        }
        return $users;
    }

    echo "Масив: <br>";
    print_r($users);
    echo "<br><br>";
    
    $sortedByAge = sortUsers($users, 'age');
    echo "Сортування за віком: <br>";
    print_r($sortedByAge);
    echo "<br><br>";
    
    $sortedByName = sortUsers($users, 'name');
    echo "Сортування за ім'ям: <br>";
    print_r($sortedByName);
    
    ?>


</body>

</html>