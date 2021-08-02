<!DOCTYPE html>
<html>
    <head>
        <title>Регистрация</title>
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
                    <h1>Введите свои данные</h1>
                    <form method="POST" action="reg.php">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name = "e-mail" class="form-control" placeholder="e-mail">
                            </div>
                        </div>
                        <hr class="hr-xs">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name ="login" class="form-control" placeholder="Ваш логин">
                            </div>
                        </div>
                        <hr class="hr-xs">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name = "password" class="form-control" placeholder="Ваш пароль">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">РЕГИСТРАЦИЯ</button>
                    </form>
                </div> 
                <div class="col-md-4">
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>     
    </body>
</html>