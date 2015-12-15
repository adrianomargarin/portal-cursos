<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Portal de Cursos</title>
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="static/css/main.css">
        <script type="text/javascript" src="static/js/jquery.min.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="static/js/work.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <p class="navbar-text">Portal de Cursos</p>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="client_form.php">Cadastrar Cliente</a></li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="container">
                <form class="form" id="id_form_category">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="id_client_name">Nome Cliente</label>
                            <input class="form-control" type="text" name="client_name" id="id_client_name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="id_client_name">Razão Social</label>
                            <input class="form-control" type="text" name="client_name" id="id_client_name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="id_client_name">CNPJ</label>
                            <input class="form-control" type="text" name="client_name" id="id_client_name">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>