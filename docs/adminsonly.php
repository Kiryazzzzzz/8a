<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администраторы | 8A</title>
    <link rel="shortcut icon" href="logo.png">
</head>

<body>

    <?php
    
    $button = $_POST['reg'];
    
    if(isset($button)){
    $errors = array();
    $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $surname = filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $passw = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
    $date = date("d.m.Y");

    if($name == ''){
        $errors[] = 'there are empty fields';
    }
    if($surname == ''){
        $errors[] = 'there are empty fields';
    }
    if($login == ''){
        $errors[] = 'there are empty fields';
    }
    if($passw == ''){
        $errors[] = 'there are empty fields';
    }
    if(empty($errors)){

     $passw = md5($passw);



    // БД с пользователями
    $mysql = new mysqli('localhost', 'root' , 'root', 'users-bd');
    //  ПОДКЛЮЧЕНИЕ
    $mysql->query("INSERT INTO `users` (`name`, `surname`, `login`, `password`, `date` ) VALUES('$name', '$surname', '$login', '$passw', '$date')");
    // ОПЕРАЦИИ С БД
    $mysql->close();
    //    ЗАКРЫТИЕ СОЕДИНЕНИЯ

   echo ' <div class="infobox" id="tip">
   <img src="info.png" alt="" class="infoimg" style="
   width:25px;
   height:25px;
   margin-right:5px;
   ">
   Пользователь зарегестрирован! Незабуть сказать ему об этом :)
</diV>';

}else{
    echo ' <div class="infobox" id="error">
    <img src="error.png" alt="" class="infoimg" style="
    width:25px;
    height:25px;
    margin-right:5px;
    ">
    Заполни все поля ввода!
</div>';
}
    }
?>

    <div class="box">
        <h2 style="color:white; text-transform:uppercase; font-weight: 500;" class="subtitle">
            Регистрация пользователей
        </h2>
        <p style="color: white;">введите в форму данные из <a href="">таблицы заявок</a></p>
        <form action="adminsonly.php" method="post" class="formbox">
            <input class="b1" type="text" placeholder="Введите имя" name="name">
            <input class="b2" type="text" placeholder="Введите фамилию" name="surname">
            <input class="b3" type="text" placeholder="Введите логин" name="login">
            <input class="b4" type="password" placeholder="Введите пароль" name="password">
            <button name="reg" type="submit">
                ЗАРЕГЕСТРИРОВАТЬ
            </button>
            </p>
    </div>

</body>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #34495e;
        font-family: sans-serif;
    }

.infobox{
    margin: 15px 0px 15px 0px;
    padding: 5px 15px 5px 15px;
    font-weight: bolder;
    font-size: 1.5em;
    display: flex;
    justify-content: center;
    border-radius: 25px;
    width: 95%;
    position: absolute;
    z-index: 2;
}

#tip{
    color: darkblue;
    border: 10px solid darkblue;
    background: rgb(130, 130, 255);
}

#error{
    color: darkred;
    border: 10px solid darkred;
    background: rgb(225, 142, 146);
}

    .box {
        width: 300px;
        padding: 20px 60px 20px 60px;
        background-color: #191919;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        z-index: 0;
    }

    input {
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #3498db;
        padding: 14px 10px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
    }

    .b1:focus,
    .b2:focus,
    .b3:focus,
    .b4:focus {
        width: 280px;
        border-color: #2ecc71;
    }

    button {
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #2ecc71;
        padding: 14px 10px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer;
    }

    button:hover {
        background-color: #2ecc71;
    }

</style>

</html>