<?php include 'base.php' ?>
<?php
    include('security.php');
    include('connection.php');

    if(isset($_GET["rowid"])){
        $ID = $_GET["rowid"];
        $SQL = "SELECT * FROM client WHERE id='".$ID."'";
        $RESULT = mysql_query($SQL);
        $RESULT_CLIENT = mysql_fetch_array($RESULT);

        $SQL = "SELECT * FROM users WHERE id='".$RESULT_CLIENT["id_user"]."'";
        $RESULT = mysql_query($SQL);
        $RESULT_USER = mysql_fetch_array($RESULT);
    }else if(isset($_SESSION["POST"])){
        $RESULT_CLIENT = $_SESSION["POST"];
        $RESULT_USER = $_SESSION["POST"];
        unset($_SESSION["POST"]);
    }
    mysql_close($CONNECTION);
?>

<?php startblock('body') ?>
    <div class="row">
        <div class="container">
            <h2><?php if(isset($_GET["rowid"])){ echo "Editando Cliente com ID ".$_GET["rowid"]; }else{ echo "Cadastrando novo Cliente"; } ?></h2>
            <form class="form" id="id_form_category" method="POST" enctype="multipart/form-data"
                action="client_post.php<?php if(isset($_GET["rowid"])){ echo "?rowid=".$_GET["rowid"]; }?>">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_client_name">Nome Cliente</label>
                        <input required class="form-control" type="text" name="client_name" id="id_client_name"
                            value="<?php if(isset($RESULT_CLIENT['client_name'])){ echo $RESULT_CLIENT['client_name']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_company_name">Razão Social</label>
                        <input required class="form-control" type="text" name="company_name" id="id_company_name"
                            value="<?php if(isset($RESULT_CLIENT['company_name'])){ echo $RESULT_CLIENT['company_name']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_cnpj">CNPJ</label>
                        <input required class="form-control" type="text" name="cnpj" id="id_cnpj"
                            value="<?php if(isset($RESULT_CLIENT['cnpj'])){ echo $RESULT_CLIENT['cnpj']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_uf">Estado</label>
                        <select required class="form-control" name="uf" id="id_uf">
                            <option <?php if(!isset($RESULT_CLIENT['uf'])){ echo "selected"; } ?> value="">Selecione</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "AC" ){ echo "selected"; } ?> value="AC">Acre</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "AL" ){ echo "selected"; } ?> value="AL">Alagoas</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "AP" ){ echo "selected"; } ?> value="AP">Amapá</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "AM" ){ echo "selected"; } ?> value="AM">Amazonas</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "BA" ){ echo "selected"; } ?> value="BA">Bahia</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "CE" ){ echo "selected"; } ?> value="CE">Ceará</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "DF" ){ echo "selected"; } ?> value="DF">Distrito Federal</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "ES" ){ echo "selected"; } ?> value="ES">Espirito Santo</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "GO" ){ echo "selected"; } ?> value="GO">Goiás</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "MA" ){ echo "selected"; } ?> value="MA">Maranhão</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "MS" ){ echo "selected"; } ?> value="MS">Mato Grosso do Sul</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "MT" ){ echo "selected"; } ?> value="MT">Mato Grosso</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "MG" ){ echo "selected"; } ?> value="MG">Minas Gerais</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "PA" ){ echo "selected"; } ?> value="PA">Pará</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "PB" ){ echo "selected"; } ?> value="PB">Paraíba</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "PR" ){ echo "selected"; } ?> value="PR">Paraná</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "PE" ){ echo "selected"; } ?> value="PE">Pernambuco</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "PI" ){ echo "selected"; } ?> value="PI">Piauí</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "RJ" ){ echo "selected"; } ?> value="RJ">Rio de Janeiro</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "RN" ){ echo "selected"; } ?> value="RN">Rio Grande do Norte</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "RS" ){ echo "selected"; } ?> value="RS">Rio Grande do Sul</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "RO" ){ echo "selected"; } ?> value="RO">Rondônia</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "RR" ){ echo "selected"; } ?> value="RR">Roraima</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "SC" ){ echo "selected"; } ?> value="SC">Santa Catarina</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "SP" ){ echo "selected"; } ?> value="SP">São Paulo</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "SE" ){ echo "selected"; } ?> value="SE">Sergipe</option>
                            <option <?php if(isset($RESULT_CLIENT['uf']) and $RESULT_CLIENT['uf'] == "TO" ){ echo "selected"; } ?> value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_city">Cidade</label>
                        <input required class="form-control" type="text" name="city" id="id_city"
                            value="<?php if(isset($RESULT_CLIENT['city'])){ echo $RESULT_CLIENT['city']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_district">Bairro</label>
                        <input required class="form-control" type="text" name="district" id="id_district"
                            value="<?php if(isset($RESULT_CLIENT['district'])){ echo $RESULT_CLIENT['district']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_street">Rua</label>
                        <input required class="form-control" type="text" name="street" id="id_street"
                            value="<?php if(isset($RESULT_CLIENT['street'])){ echo $RESULT_CLIENT['street']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_number">Número</label>
                        <input required class="form-control" type="number" name="number" id="id_number"
                            value="<?php if(isset($RESULT_CLIENT['number'])){ echo $RESULT_CLIENT['number']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_complement">Complemento</label>
                        <input required class="form-control" type="text" name="complement" id="id_complement"
                            value="<?php if(isset($RESULT_CLIENT['complement'])){ echo $RESULT_CLIENT['complement']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_cep">CEP</label>
                        <input required class="form-control" type="text" name="cep" id="id_cep"
                            value="<?php if(isset($RESULT_CLIENT['cep'])){ echo $RESULT_CLIENT['cep']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_phone1">Telefone Fixo</label>
                        <input required class="form-control" type="text" name="phone1" id="id_phone1"
                            value="<?php if(isset($RESULT_CLIENT['phone1'])){ echo $RESULT_CLIENT['phone1']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_phone2">Celular</label>
                        <input required class="form-control" type="text" name="phone2" id="id_phone2"
                            value="<?php if(isset($RESULT_CLIENT['client_name'])){ echo $RESULT_CLIENT['client_name']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_email">E-mail</label>
                        <input required class="form-control" type="email" name="email" id="id_email"
                            value="<?php if(isset($RESULT_CLIENT['email'])){ echo $RESULT_CLIENT['email']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_responsible">Responsável</label>
                        <input required class="form-control" type="text" name="responsible" id="id_responsible"
                            value="<?php if(isset($RESULT_CLIENT['responsible'])){ echo $RESULT_CLIENT['responsible']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_email_rep">E-mail do Responsável</label>
                        <input required class="form-control" type="text" name="email_rep" id="id_email_rep"
                            value="<?php if(isset($RESULT_CLIENT['email_rep'])){ echo $RESULT_CLIENT['email_rep']; } ?>">
                    </div>
                </div><div class="col-md-4">
                    <div class="form-group">
                        <label for="id_phone_resp">Telefone do Responsável</label>
                        <input required class="form-control" type="text" name="phone_resp" id="id_phone_resp"
                            value="<?php if(isset($RESULT_CLIENT['phone_resp'])){ echo $RESULT_CLIENT['phone_resp']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_localization_googlemaps">Mapa do Google</label>
                        <input required class="form-control" type="text" name="localization_googlemaps" id="id_localization_googlemaps"
                            value="<?php if(isset($RESULT_CLIENT['localization_googlemaps'])){ echo $RESULT_CLIENT['localization_googlemaps']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_company_logo">Logo Entidade</label>
                        <input class="form-control" type="file" name="company_logo" id="id_company_logo"
                            value="<?php if(isset($RESULT_CLIENT['company_logo'])){ echo $RESULT_CLIENT['company_logo']; } ?>">
                        <p class="has-error">
                            <?php if(isset($_COOKIE["company_logo_error"])){ echo $_COOKIE["company_logo_error"]; } ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_page_link">Link da Inscrição</label>
                        <input required class="form-control" type="text" name="page_link" id="id_page_link"
                            value="<?php if(isset($RESULT_CLIENT['page_link'])){ echo $RESULT_CLIENT['page_link']; } ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_username">Usuário</label>
                        <input required class="form-control" type="text" name="username" id="id_username"
                            value="<?php if(isset($RESULT_USER['username'])){ echo $RESULT_USER['username']; } ?>">
                        <p class="has-error">
                            <?php if(isset($_COOKIE["username_error"])){ echo $_COOKIE["username_error"]; } ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_password">Senha</label>
                        <input required class="form-control" type="password" name="password" id="id_password">
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-default" type="reset">Limpar</button>
                    <button class="btn btn-success pull-right" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
<?php endblock() ?>
