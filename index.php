<?php include 'base.php' ?>

<?php startblock('body') ?>
    <div class="row">
        <div class="container">
             <div class="col-md-6 col-md-offset-3">
                <form class="form" id="id_form_category">
                    <select class="form-control" name="category" id="id_category">
                        <option value="">Selecione uma Categoria</option>
                        <?php
                            include('connection.php');
                            $RESULT = mysql_query("SELECT * FROM category");
                            while($row = mysql_fetch_array($RESULT)){
                                echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                            }
                            mysql_free_result($RESULT);
                            mysql_close($CONNECTION);
                        ?>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="container">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Título do Curso
                    </div>
                    <div class="panel-body">
                        <p class="text-center img-client"><img src="static/img/logo-cliente.jpg"></p>
                        <p>Breve Descrição</p>
                        <p>Nome do Instrutor</p>
                        <p>Responsável pelo curso</p>
                        <p class="text-center img-course"><img src="static/img/logo-curso.jpg"></p>
                    </div>
                    <div class="panel-footer">
                        <a href="#">Mais Informação</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endblock() ?>