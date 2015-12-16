<?php
    header("Content-Type: text/html; charset=UTF-8");

    session_start();
    $_SESSION["POST"] = $_POST;

    include('connection.php');

    if(isset($_GET["rowid"])){
        $rowid = $_GET["rowid"];
    }else{
        $rowid = false;
    }

    $error = false;

    $client_name = $_POST["client_name"];
    $company_name = $_POST["company_name"];
    $cnpj = $_POST["cnpj"];
    $street = $_POST["street"];
    $number = $_POST["number"];
    $complement = $_POST["complement"];
    $district = $_POST["district"];
    $city = $_POST["city"];
    $UF = $_POST["uf"];
    $CEP = $_POST["cep"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $email = $_POST["email"];
    $responsible = $_POST["responsible"];
    $email_rep = $_POST["email_rep"];
    $phone_resp = $_POST["phone_resp"];
    $localization_googlemaps = $_POST["localization_googlemaps"];
    $company_logo = $_POST["company_logo"];
    // $company_logo = "aaaabbb";
    $page_link = $_POST["page_link"];

    $username = $_POST["username"];
    $password = md5(trim($_POST["password"]));


    $allowed_types= array('image/jpeg', 'image/png'); // Lista de tipos de arquivos permitidos
    // $tamanhoPermitido = 1024 * 1024 * 1024; // 500 Kb - Tamanho máximo (em bytes)
    $file_name = $_FILES['company_logo']['name']; // O nome original do arquivo no computador do usuário
    $file_type = $_FILES['company_logo']['type']; // O tipo mime do arquivo. Um exemplo pode ser "image/gif"
    // $arqSize = $_FILES['arquivo']['size']; // O tamanho, em bytes, do arquivo
    $tmp_name = $_FILES['company_logo']['tmp_name']; // O nome temporário do arquivo, como foi guardado no servidor
    // $arqError = $_FILES['arquivo']['error']; // O código de erro associado a este upload de arquivo

    if(!array_search($file_type, $allowed_types)){
        setcookie("company_logo_error", "Arquivo inválido!", (time() + (5)));
        $error = true;
    }

    $SQL_USER = "SELECT * FROM users WHERE username='".$username."'";
    $RESULT = mysql_query($SQL_USER);
    $RESULT = mysql_fetch_array($RESULT);

    if($RESULT>0 and !$rowid){
        setcookie("username_error", "Usuário já cadastrado!", (time() + (5)));
        $error = true;
    }

    if($error){
        $location = "Location: client_form.php";
        if($rowid){
            $location = $location."?rowid=".$rowid;
        }
        header(location);
        exit();
    }

    // if ($arqError == 0) {
    //     if (array_search($arqType, $tiposPermitidos) === false){ // Verifica o tipo de arquivo enviado
    //         echo 'O tipo de arquivo enviado é inválido!';
    //     }else if ($arqSize > $tamanhoPermitido){ // Verifica o tamanho do arquivo enviado
    //         echo 'O tamanho do arquivo enviado é maior que o limite!';
    //     }else { // Não houveram erros, move o arquivo
    //         $pasta = ".\uploads\\";
    //         $foo = explode('.', $arqName); // Pega a extensão do arquivo enviado
    //         $extensao = strtolower(end($foo));
    //         $nome = time().'.'.$extensao; // Define o novo nome do arquivo usando um UNIX TIMESTAMP
    //         //$nomeMySQL = mysql_real_escape_string($_POST['nome']); // Escapa os caracteres protegidos do MySQL (para o nome do usuário)

    //         $upload = move_uploaded_file($arqTemp, $pasta . $nome);
    //         if($upload == true){ // Verifica se o arquivo foi movido com sucesso
    //             // Cria uma query MySQL
    //             // $sql = "INSERT INTO `contas` (`id`, `nome`, `foto`) VALUES (NULL, '". $nomeMySQL ."', '". $nome ."')";
    //             // Executa a consulta
    //             // $query = mysql_query($sql);
    //             // if ($query == true) {
    //                 echo 'Usuário inserido com sucesso!';
    //             // }
    //         }
    //     }
    // }else{
    //     echo 'Ocorreu algum erro com o upload, por favor tente novamente!';
    // }


    if(!$rowid){
        $SQL_USER = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $USER = mysql_query($SQL_USER);
        $SQL_USER = "SELECT * FROM users WHERE username='".$username."'";
        $USER = mysql_query($SQL_USER);
        $USER = mysql_fetch_array($USER);

        $SQL_CLIENT = "INSERT INTO client (client_name, company_name, cnpj, street,
            number, complement, district, city, UF, CEP, phone1, phone2, email,
            responsible, email_rep, phone_resp, localization_googlemaps,
            company_logo, page_link, id_user) VALUES ('$client_name', '$company_name', '$cnpj', '$street',
            '$number', '$complement', '$district', '$city', '$UF', '$CEP', '$phone1', '$phone2', '$email',
            '$responsible', '$email_rep', '$phone_resp', '$localization_googlemaps',
            '$company_logo', '$page_link', '$RESULT[id]')";
        mysql_query($SQL_CLIENT);
        echo "Cliente cadastrado com sucesso!";
    }else{
        $SQL_CLIENT = "UPDATE client SET";
        $SQL_CLIENT = $SQL_CLIENT." client_name='".$client_name."',";
        $SQL_CLIENT = $SQL_CLIENT." company_name='".$company_name."',";
        $SQL_CLIENT = $SQL_CLIENT." cnpj='".$cnpj."',";
        $SQL_CLIENT = $SQL_CLIENT." street='".$street."',";
        $SQL_CLIENT = $SQL_CLIENT." number='".$number."',";
        $SQL_CLIENT = $SQL_CLIENT." complement='".$complement."',";
        $SQL_CLIENT = $SQL_CLIENT." district='".$district."',";
        $SQL_CLIENT = $SQL_CLIENT." city='".$city."',";
        $SQL_CLIENT = $SQL_CLIENT." UF='".$UF."',";
        $SQL_CLIENT = $SQL_CLIENT." CEP='".$CEP."',";
        $SQL_CLIENT = $SQL_CLIENT." phone1='".$phone1."',";
        $SQL_CLIENT = $SQL_CLIENT." phone2='".$phone2."',";
        $SQL_CLIENT = $SQL_CLIENT." email='".$email."',";
        $SQL_CLIENT = $SQL_CLIENT." responsible='".$responsible."',";
        $SQL_CLIENT = $SQL_CLIENT." email_rep='".$email_rep."',";
        $SQL_CLIENT = $SQL_CLIENT." phone_resp='".$phone_resp."',";
        $SQL_CLIENT = $SQL_CLIENT." localization_googlemaps='".$localization_googlemaps."',";
        $SQL_CLIENT = $SQL_CLIENT." company_logo='".$company_logo."',";
        $SQL_CLIENT = $SQL_CLIENT." page_link='".$page_link."'";
        $SQL_CLIENT = $SQL_CLIENT." WHERE id='".$rowid."'";
        mysql_query($SQL_CLIENT);

        $CLIENT = mysql_query("SELECT * FROM client WHERE id=".$rowid);
        $CLIENT = mysql_fetch_array($CLIENT);

        $SQL_USER = "UPDATE users SET username='".$username."', password='".$password."' WHERE id=".$CLIENT["id_user"]."";
        $USER = mysql_query($SQL_USER);

        echo "Cliente editado com sucesso!";
    }

    mysql_close($CONNECTION);
    // header("Location: index_authenticated.php");
?>