<?php
const SERVERNAME = "localhost";
const USERNAME = "root";
const PASSWORD = "root";
const TABLENAME = "users";

function delete($id)
{
    $link=mysqli_connect( SERVERNAME,  USERNAME,  PASSWORD, TABLENAME );
    if ($link == false)
    {
        return ("Ошибка: Невозможно подключиться к MySQL ");
    }
    $sql="DELETE FROM users WHERE id = $id";
    $sql=mysqli_query($link, $sql);
    mysqli_close($link);
    session_unset();
    return $sql;
}

function block($id)
{
    $link=mysqli_connect( SERVERNAME,  USERNAME,  PASSWORD, TABLENAME );
    if ($link == false)
    {
        return ("Ошибка: Невозможно подключиться к MySQL ");
    }
    $sql="UPDATE users SET  status = '0' WHERE id = $id";
    $sql=mysqli_query($link, $sql);
    mysqli_close($link);
    session_unset();
    return $sql;
}

if($_POST["button"]=="Delete")
{
    $id=$_POST["values"];
    foreach($id as $i )
    {
        delete($i);
    }
}elseif ($_POST["button"]=="Block")
{
    $id=$_POST["values"];
    foreach($id as $i )
    {
        block($i);
    }
}

