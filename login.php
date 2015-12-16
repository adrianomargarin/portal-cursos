<?php include 'base.php' ?>

<?php startblock('body') ?>
    <div class="row">
        <div class="container">
            <div class="col-md-4 col-md-offset-4">
                <form class="form" id="id_form_category" method="POST" action="authentication.php" autocomplete="on">
                    <?php
                        if(isset($_COOKIE["username_error"])){
                            $html = "<div class='alert alert-danger'>";
                            $html = $html."<p>".$_COOKIE["username_error"]."</p>";
                            $html = $html."</div>";
                            echo $html;
                        }
                    ?>

                    <div class="form-group">
                        <label for="id_username">Usuário</label>
                        <input class="form-control" type="text" name="username" id="id_username" required
                            value="<?php if(isset($_COOKIE["username"])){ echo $_COOKIE["username"]; } ?>"  >
                    </div>
                    <div class="form-group">
                        <label for="id_password">Senha</label>
                        <input class="form-control" type="password" name="password" id="id_password" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="reset">Limpar</button>
                        <button class="btn btn-success pull-right" type="submit">Acessar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endblock() ?>
