<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login | 8A</title>
    <link rel="shortcut icon" href="logo.png">
</head>



<body>

    <?php
    //     $URL="https://www.php.net/manual/ru/function.crypt.php";
    //     $status = NULL;
    //     $data = $_POST;
    //     $login = $data['login'];
    //     $passw = $data['password'];

    //     if( isset($data['do_login'])){

    //     if($login == 'Kiryazzz' AND $passw =='12345ki'){
    //         $status = 1;
    //     }elseif( $login == 'kirya' AND $passw=='12345' ){
    //         $status = 1;
    //     }else{
    //         $status = 2;
    //     }


    //     if($status == 1){
    //         header ("Location: $URL");
    //     }

    //     if($status == 2){
    //         echo ' <script> alert("Неверный логин или пароль!"); </script> ';
    //     }
    // }


    $button = $_POST['logbut'];
    $URL = null;

    if (isset($button)) {

        $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
        $passw = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

        if ($login == '') {
            $errors[] = 'there are empty fields';
        }
        if ($passw == '') {
            $errors[] = 'there are empty fields';
        }

        if (empty($errors)) {



            $passw = md5($passw);



            // БД с пользователями
            $mysql = new mysqli('localhost', 'root', 'root', 'users-bd');
            //  ПОДКЛЮЧЕНИЕ
            $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$passw'");

            $user = $result->fetch_assoc();

            if (count($user) == 0) {
                $errors[] = 'odkmks';
            }


            // ОПЕРАЦИИ С БД
            $mysql->close();
            //    ЗАКРЫТИЕ СОЕДИНЕНИЯ
            if (empty($errors)) {
                $URL = "/site.html";
                header("Location: $URL");
            } else {
                echo '<script>
        alert("Неверный логин или пароль");
        </script> ';
            }
        
        }
        
    }

    
  
    ?>

    <img src="logo light.png" alt="site logo">

    <div class="box">
        <h2 style="color:white; text-transform:uppercase; font-weight: 500;" class="subtitle">
            LOGIN
        </h2>
        <form action="index.php" method="post" class="formbox">
            <input class="b3" type="text" placeholder="Введите логин" name="login">
            <input class="b4" type="password" placeholder="Введите пароль" name="password">
            <button name="logbut" type="submit">
                ВОЙТИ
            </button>
        </form>
        <p style="font-size: 0.7em; font-weight: bolder; color:white">
            <a href="https://forms.gle/nm5ui6pycG1qjXdu7">
                Создать аккаунт
            </a>|
            <a href="rules.html">
                Правила
            </a>|
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSeI2TYNrKBIhcnGZwBbznZgnApSuzIrZuaGMNbkrIl9LKKDBw/viewform?usp=sf_link">
                Забыли пароль?
            </a>
        </p>
    </div>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #34495e;
            font-family: sans-serif;
        }

        a {
            text-decoration: none;
            color: white;
            margin: 5px;
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
            z-index: 2;
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

        img {
            text-align: center;
            width: 25%;
            position: absolute;
            left: 50%;
            transform: translate(-50%, -0%);
        }
    </style>


</body>

</html>