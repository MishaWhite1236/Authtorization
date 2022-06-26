<?php
session_start();
require_once 'connect.php';
// var_dump($_FILES['avatar']);
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_login) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой email уже существует!",
        "fields" => ['email']
    ];

    echo var_dump($response);
    die();
}
$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_email) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такая почта уже зарегистрирована!",
        "fields" => ['email']
    ];

    echo var_dump($response);
    die();
}
$error_fields = [];


if ($password === '') {
    $error_fields[] = 'password';
}


if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}

if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
}

// if (!$_FILES['avatar']) {
//     $error_fields[] = 'avatar';
// }

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo var_dump($response);

    die();
}

if ($password === $password_confirm) {

    // $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    // if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
    //     $response = [
    //         "status" => false,
    //         "type" => 2,
    //         "message" => "Ошибка при загрузке аватарки",
    //     ];
    //     echo var_dump($response);
    // }

    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL,'$email', '$password')");

    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];
    $new_url = './index.php';
    header('Location: '.$new_url);
    exit();
    
} else {
    $response = [
        "status" => false,
        "message" => "Пароли не совпадают",
    ];
    echo var_dump($response);
}

?>
