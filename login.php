<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Portal de Cursos</title>
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
        <script type="text/javascript" src="static/js/jquery.min.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="static/js/work.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <p class="navbar-text">Portal de Cursos</p>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <div class="col-md-4 col-md-offset-4">
                    <form class="form" id="id_form_category" method="POST" action="authentication.php" autocomplete="on">
                        <div class="form-group">
                            <label for="id_username">Username</label>
                            <input class="form-control" type="text" name="username" id="id_username" required>
                        </div>
                        <div class="form-group">
                            <label for="id_password">Password</label>
                            <input class="form-control" type="password" name="password" id="id_password" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="reset">Clear</button>
                            <button class="btn btn-success pull-right" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>