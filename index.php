<?php setcookie('name','');?>
<!DOCTYPE html>
<html>
    <head>
        <title>Форма валидации</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class= "row">
                <div class="col-md-4">
                </div>
                <div class="login-block col-md-4">
                    <img width="80%" src="img/1.png" alt="not registered">
                    <h1>Введите свои данные</h1>
                    <form action="reg.php" method="POST" >
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user ti-user"></i></span>
                                <input type="text" class="form-control" name = "login" placeholder="Ваш логин">
                            </div>
                        </div>
                        <hr class="hr-xs">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock ti-unlock"></i></span>
                                <input type="password" name= "password" class="form-control" placeholder="Ваш пароль">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">ВОЙТИ НА САЙТ</button>
                    </form>
                </div> 
                <div class="login-links">
                    <p class="text-center"><a class="txt-brand" href="registration.php">Регистрируйся</a></p>
                </div>
                <div class="col-md-4">
                </div>
            </div>
    </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    </body>
</html>
