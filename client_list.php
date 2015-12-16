<?php include 'base.php' ?>

<?php startblock('body') ?>
    <?php
        $SQL = "SELECT * FROM client";
        $RESULT = mysql_query($SQL);
    ?>
    <div class="row">
        <div class="container">
            <h2>Meus Clientes</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Razão Social</th>
                        <th>CNPJ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysql_fetch_array($RESULT)){
                            $tr = "<tr>";
                            $tr = $tr."<td><a href='client_form.php?rowid=".$row["id"]."'>".$row["client_name"]."</a></td>";
                            $tr = $tr."<td>".$row["company_name"]."</td>";
                            $tr = $tr."<td>".$row["cnpj"]."</td>";
                            $tr = $tr."</tr>";
                            echo $tr;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endblock() ?>