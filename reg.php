<?php
session_start();
const SERVERNAME = "localhost";
const USERNAME = "root";
const PASSWORD = "root";
const TABLENAME = "users";

if($_POST['e-mail'] && $_POST['login'] && $_POST['password'])
{
    $link = new mysqli( SERVERNAME, USERNAME, PASSWORD);
    $sql = "CREATE DATABASE IF NOT EXISTS  users ";
    mysqli_query($link, $sql);
    $link=mysqli_connect( SERVERNAME,  USERNAME,  PASSWORD, TABLENAME );
    if ($link == false)
    {
        return ("Ошибка: Невозможно подключиться к MySQL ");
    }
    mysqli_set_charset($link, 'utf8');
    $sql="CREATE TABLE IF NOT EXISTS `users` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(65) NOT NULL,
        `e-mail` VARCHAR(65) NOT NULL,
        `password` VARCHAR(65) NOT NULL,
        `registration` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
        `visit` TIMESTAMP NULL, 
        `status` BOOLEAN NULL DEFAULT NULL,
        PRIMARY KEY (id))
        ENGINE = InnoDB";
    mysqli_query($link, $sql);
    $sql = "SELECT * FROM `users` WHERE name = {$_POST['login']}";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($result);
    if ($result)
    {
        mysqli_close($link);
        echo '<h1 align="center"><a href="registration.php"> Логин уже существует. Выберите другое имя. </a></h1>';
        exit;
    }
    $sql= "INSERT INTO `users` VALUES
    ( NULL, {$_POST['login']}, {$_POST['e-mail']}, {$_POST['password']},CURRENT_TIMESTAMP, NULL, NULL)";
    $sql = mysqli_query($link, $sql);
    mysqli_close($link);
    if ($sql)
    {
        echo '<h1 align="center"><a href="index.php"> Регистрация завершена. Нажмите чтобы продолжить. </a></h1>';
    } else
    {
        echo '<h1 align="center"><a href="index.php"> Ошибка регистрации.Нажмите чтобы продолжить. </a></h1>';
    }    
} elseif ($_POST['login'] && $_POST['password'])
{
    $link=mysqli_connect( SERVERNAME,  USERNAME,  PASSWORD, TABLENAME );
    if ($link == false)
    {
        return ("Ошибка: Невозможно подключиться к MySQL ");
    }
    mysqli_set_charset($link, 'utf8');
    $sql = "SELECT * FROM users WHERE name = {$_POST['login']}";;
    $result = mysqli_query($link,$sql);
    $result = mysqli_fetch_array($result);
    if ($result["password"]==$_POST["password"])
    {        
        $sql= "UPDATE users SET visit = CURRENT_DATE(), status = '1' WHERE id = {$result['id']}";
        $sql=mysqli_query($link,$sql);
        $_SESSION["is_auth"] = true; 
        $_SESSION["login"] = $result['name']; 
        mysqli_close($link);
    }
    else 
    {
        echo '<h1 align="center"><a href="index.php"> Вы не авторизированы. </a></h1>';
        exit;
    } 
} 
if ($_SESSION["is_auth"] && $_SESSION["login"])
{
    $link=mysqli_connect( SERVERNAME,  USERNAME,  PASSWORD, TABLENAME );
    if ($link == false)
    {
        return ("Ошибка: Невозможно подключиться к MySQL ");
    }
    mysqli_set_charset($link, 'utf8');
    $sql = "SELECT * FROM users";
    $result = mysqli_query($link,$sql);
    $users = [];
    while ($row=mysqli_fetch_array($result))
    {
        $users[] =
        [
            'id'=>$row['id'],
            'name'=>$row['name'],
            'e-mail'=>$row['e-mail'],
            'registration'=>$row['registration'],
            'visit'=>$row['visit'],
            'status'=>$row['status']
        ];
    }
} else 
{
    echo '<h1 align="center"><a href="index.php"> Ошибка регистрации.Нажмите чтобы продолжить. </a></h1>';
}
?>
    <!DOCTYPE html>
<html>
    <head>
        <title>Таблица</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script  src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
        <script src="all.js"></script>
    </head>
    <body>
        <div id="test" class="container-fluid">
            <diw class="row py-3 ">
                <diw class="col-md-8 ">
                </diw>
                <diw class="col-md-1 ">
                    <button ><img id="Block" src=img/4.png alt="Block" width= "100%" ></button>
                </diw>
                <diw class="col-md-1">
                    <button  ><img id="Unblock" src=img/2.png alt="Unblock" width= "100%"></button> 
                </diw>
                <diw class="col-md-1 ">
                    <button ><img id="Delete" src=img/3.jpg width= "100%" alt="Delete"></button>  
                </diw>
                <diw class="col-md-1 ">
                </diw>
            </diw>
            <div class="row py-6 ">
                <div class="col-md-1"></div>
                <div class="col-md-10 ">
                    <table class="table table-bordered table-hover align-middle text-center px-5" >
                        <thead>
                            <tr>
                                <th>
                                    <input  type="checkbox"> выделить все/снять выделение
                                </th>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    E-mail
                                </th>
                                <th>
                                    Registration date
                                </th>
                                <th>
                                    Last visit
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user):?>
                            <tr class="table-success" >
                                <td>
                                <input name="chekUser" value="<?= $user['id'];?>" type="checkbox">
                                </td>
                                <td>
                                <?= $user['id'];?>
                                </td>
                                <td>
                                <?= $user['name'];?>
                                </td>
                                <td>
                                <?= $user['e-mail'];?>
                                </td>
                                <td>
                                <?= $user['registration'];?>
                                </td>
                                <td>
                                <?= $user['visit'];?>
                                </td>
                                <td>
                                <?= $user['status'];?>
                                </td>
                            </tr>
                            <?php endforeach ;?>                        
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <script>
            $('.table').checkboxTable();
        </script>
    </body>
</html>
