<?php
    include('configPHP.php');

    $sql = "SELECT id, nome, quantidade, preco, data_venci, categoria, codigo_produto FROM produto";
    $result = $conn->query($sql); 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gerenciamento de Inventário </title>

    <style>
        *{
            font-family: Tahoma, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        body{
            margin: 0;
            padding: 0;
        }
        .drawer{
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #333;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
        }
        label{
            color: #fff;
        }
        .drawer a {
            padding: 10px 15px;
            text-decoration: none;
            color: #fff;
            display: block;
        }
        .menu {
            cursor:pointer;
            font-size: 30px;
        }
        .fechar-drawer{
            color: #fff;
            width: 30px;
            height: 30px;
            text-align: end;
            font-size: 40px;
            cursor: pointer;
            padding: 10px 10px;
            display:flex;
            flex-direction: row;
            align-items: center;
            justify-content: center; 
        }
        header{
            display:flex;
            flex-direction: row;
            align-items: center;
            background-color: #333;
            height: 50px;
            color: #fff;
            margin-bottom: 40px;
        }
        .conteiner-h1{
            margin: 0 auto;
        }
        a{
            color: white;
            text-decoration: none;
        }
        .table {
            margin: 0 auto;
            width: 750px;
            height: 200px;
            text-align: center;
        }
        .conteiner-Relatório{
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #333;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
            text-align: start;
        }
        .title-relatorio{
            color: black;
        }
        .inform{
            margin: 0 auto;
            width: 600px;
            font-size: 20px;
            word-spacing:5px;
            line-height: 40px;
        }
        .fecha-drawer{
            color: #fff;
            width: 30px;
            height: 30px;
            text-align: end;
            font-size: 40px;
            cursor: pointer;
            padding: 10px 10px;
        }
        .header-relatorio{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 30px;
        }
        footer{
            margin-bottom: 40px;   
        }
    </style>
</head>
<body>

    <div class="drawer" id="myDrawer">
        <div class="fechar-drawer" id="close"> &times; </div>

        <label> Produto: </label>

        <a href="adicionar_produto.php"> Cadastrar Produtos</a>
        <a href="excluir_produto.php"> Excluir Produtos</a>
        <a href="Editar.php"> Editar Produtos</a>
        <a href="frente-de-caixa.php"> Frente de Caixa</a>

        <br>
        <br>

        <label> Fornecedor: </label>
        <a href="cadastro_fornecedor.php"> Cadastrar fornecedor </a>
    </div>

    <header>
        <div class="menu" onclick="drawer()"> &#9776; </div>

        <div class="conteiner-h1">
            <a href="index.php"> <h1 class="title"> Gestão de Inventário </h1> </a>
        </div>
    </header>

    <script>
        function drawer() {
            var drawer = document.getElementById("myDrawer");
            if(drawer.style.left === "-250px") {
                drawer.style.left = "0";
            } else {
                drawer.style.left = "-250px";
            }
        }

            var closedrawer = document.getElementById("close");

            closedrawer.addEventListener('click', function() {
                var drawer = document.getElementById("myDrawer");
                drawer.style.left = "-250px";
            })

    </script>


    <div class="container-tabela">
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th class="coluna" > Nome </th>
                    <th class="coluna" > Quantidade </th>
                    <th class="coluna" > Preço </th>
                    <th class="coluna" > Data de vencimento </th>
                    <th class="coluna" > Categoria </th>
                    <th class="coluna" > Código do produto </th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['nome']."</td>";
                            echo "<td>".$row['quantidade']."</td>";
                            echo "<td>".$row['preco']."</td>";
                            echo "<td>".$row['data_venci']."</td>";
                            echo "<td>".$row['categoria']."</td>";
                            echo "<td>".$row['codigo_produto']."</td>
                            </tr>";
                            }
                    } else {
                            echo "<tr><td> 0 resultados </td></tr>";
                    }

                    $conn->close();

                ?>
            </tbody>
        </table>
    </div>

                    <!--ÁREA DE RELATÓRIO DE ESTOQUE -->

    <div class="header-relatorio">
        <h1 class="title-relatorio"> Relatório de Estoque</h1>
        <div class="menu" onclick="drawer_relatorio()"> &#9776; </div>
    </div>

    <div class="conteiner-Relatório" id="relatorio">
        <span class="fecha-drawer" id="closer"> &times; </span>
            
            <?php
            include('configPHP.php');
        
            $sql = "SELECT nome, quantidade FROM produto WHERE quantidade >= 5";
            
            $result = $conn->query($sql);

            while ($final = mysqli_fetch_array($result)) {
                if($final > 5){
                            echo "<span class='inform' style='color: yellow;'> -> O(a)  " .$final['nome']. "  ainda está com estoque de  " .$final['quantidade']. "  unidades <br><br> </span>";
                        }
                    }
    
                    $conn->close();
            ?>

            <?php
                    include('configPHP.php');
                
                    $sql = "SELECT nome, quantidade FROM produto WHERE quantidade <= 5";
                    
                    $result = $conn->query($sql);

                    while ($final = mysqli_fetch_array($result)) {
                        if($final > 5){
                                    echo "<span class='inform'  style='color: red;'> -> O(a)  " .$final['nome']. "  está quase zerando o estoque.  " .$final['quantidade']. "  unidades <br><br> </span>";
                                }
                            }
            
                    $conn->close();
            ?>

        <script>
            function drawer_relatorio() {
                var drawer = document.getElementById("relatorio");
                if(drawer.style.left === "-250px") {
                    drawer.style.left = "0";
                } else {
                    drawer.style.left = "-250px";
                }
            }

                var closedrawer = document.getElementById("closer");

                closedrawer.addEventListener('click', function() {
                    var drawer = document.getElementById("relatorio");
                    drawer.style.left = "-250px";
                })

        </script>
    </div>


</body>

<footer>

</footer>
</html>
