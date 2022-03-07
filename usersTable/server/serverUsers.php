
<?php
// include($_SERVER['DOCUMENT_ROOT'] . '/includes/db.php');

if (isset($_POST['addUser'])) {
    $domain = substr(strrchr($_POST['mail'], '@'), 1);
    $res = getmxrr($domain, $mx_records, $mx_weight);
    $options = array(
        'options' => array(
            'min_range' => 14,
            'max_range' => 110,
        )
    );

    $errors = array();

    if ($_POST['first_name'] == '') {
        $errors[] = 'Введите имя!';
    }
    if ($_POST['last_name'] == '') {
        $errors[] = 'Введите фамилию!!';
    }
    if ($_POST['mail'] == '') {
        $errors[] = 'Введите почту!!';
    }
    if (false == $res || 0 == count($mx_records) || (1 == count($mx_records) && ($mx_records[0] == null || $mx_records[0] == '0.0.0.0'))) {
        $errors[] = 'Введите корректную почту!';
    }
    if ($_POST['age'] == '') {
        $errors[] = 'Введите возраст!!';
    }
    if (filter_var($_POST['age'], FILTER_VALIDATE_INT, $options) == FALSE) {
        $errors[] = 'Перепроверьте введенные данные!';
    }
    if (empty($errors)) {
            // добавить пользователя, если массив с ошибками пустой
            mysqli_query($db, "INSERT INTO `users_db` (`first_name`, `last_name`, `mail`, `age`) VALUES ('" . $_POST['first_name'] . "', '" . $_POST['last_name'] . "', '" . $_POST['mail'] . "', '" . $_POST['age'] . "')");
            echo 1;
    } else {
        // ошибка
        echo '<span style="color: red; font-weight: bold;">' . $errors[0] . '</span>';
    }
}

?>
