<?php

$to = 'saskeazaske@mail.ru';
$from = 'From: Заявка с сайта';
$email = $_POST['email'];
$theme = $_POST['theme'];
$text = $_POST['text'];
$page = 'Страница, с которой была заполнена форма';

$message =
    '<html>

<body>
    <center>
        <table border=1 cellpadding=6 cellspacing=0 width=90% bordercolor="#DBDBDB">
            <tr>
                <td colspan=2 align=center bgcolor="#E4E4E4"><b>Информация</b></td>
            </tr>
            <tr>
                <td><b>Откуда</b></td>
                <td>' . $page . '</td>
            </tr>
            <tr>
                <td><b>Адресат</b></td>
                <td><a href="mailto:' . $email . '">' . $email . '</a></td>
            </tr>
            <tr>
                <td><b>Тема</b></td>
                <td>' . $theme . '</td>
            </tr>
            <tr>
                <td><b>Сообщение</b></td>
                <td>' . $text . '</td>
            </tr>
        </table>
    </center>
</body>

</html>';

$headers  = "Content-type: text/html; charset=utf-8\r\n";

// if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     mail($to, $theme, $text, $headers);
// } else {
//     echo 1;
// }

$domain = substr(strrchr($email, '@'), 1);
$res = getmxrr($domain, $mx_records, $mx_weight);
if (false == $res || 0 == count($mx_records) || (1 == count($mx_records) && ($mx_records[0] == null || $mx_records[0] == '0.0.0.0'))) {
    echo 1;
} else {
    echo $message;
    mail($to, $theme, $message, $headers);
}

// как в дату закидывать данные?
// как через респонс в нетворке доставать данные?
// дата, которая объект и дата, которая ответ сервера - это разные даты?
