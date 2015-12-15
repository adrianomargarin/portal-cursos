<?php
    include('connection.php');
    $SQL = "SELECT * FROM Course INNER JOIN client WHERE Course.id_categ='".$_POST["id"]."' Course.id_client=client.id";
    $COURSE = mysql_query($SQL);

    $json_array = array();
    while($row = mysql_fetch_array($COURSE)){
        $json_array[] = array(
            "carga_horaria" => $row["carga_horaria"],
            "descricao" => $row["descricao"],
            "credito" => $row["creditos"],
            "codigo_turno" => $row["codigo_turno"],
            "codigo" => $row["codigo_disciplina"],
            "horario" => $row["horario"],
        );
    }

    mysql_close($CONNECTION);
    echo json_encode($json_array);
?>