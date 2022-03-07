<?php

// function clearData($data) {
//     return $data;
// }

// $first = clearData($_POST['first']);
// $second = clearData($_POST['second']);
// $operator = clearData($_POST['operator']);

$first = $_POST['first'];
$second = $_POST['second'];
$operator = $_POST['operator'];

switch ($operator) {
    case '+':
        $result = $first + $second;
        break;
    case '-':
        $result = $first - $second;
        break;
    case '*':
        $result = $first * $second;
        break;
    case '/':
        $second == 0 ? $result = 'На 0 делить нельзя!' : $result = $first / $second;
        break;
}

if ($result) {
    echo $result;
}
