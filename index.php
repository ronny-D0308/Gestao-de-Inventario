<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdname = "gestaodeInventario";

    $conn = new mysqli( $servername, $username, $password, $bdname);

    if($conn->connect_error) {
        die("Erro na conexão". $conn->connect_error);
    }

    $sql = "SELECT id, nome, quantidade, preco, data_venci, categoria FROM estoque";
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
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
        .table {
            margin: 0 auto;
            width: 600px;
            text-align: center;
        }
        .conteiner-pereciveis{
            margin-top: 100px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="drawer" id="myDrawer">
        <div class="fechar-drawer" id="close"> &times; </div>

        <a href="adicionar_produto.php"> Adicionar Produtos</a>
        <a href="excluir_produto.php"> Excluir Produtos</a>
        <a href="Editar.php"> Editar Produtos</a>
        
    </div>

    <header>
        <div class="menu" onclick="drawer()"> &#9776; </div>

        <div class="conteiner-h1">
            <h1 class="title"> Gestão de Inventário</h1>
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
                            echo "<td>".$row['categoria']."</td>
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

    <div class="conteiner-pereciveis">
        <h1> Produtos Validos</h1>

        <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $bdname = "gestaodeInventario";
      
          $conn = new mysqli( $servername, $username, $password, $bdname);
      
          if($conn->connect_error) {
              die("Erro na conexão". $conn->connect_error);
          }
      
          $sql = "SELECT nome, data_venci FROM estoque WHERE categoria LIKE 'perecivel' ";
          $result = $conn->query($sql);
          
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<td>".$row['nome']."</td> ";
                echo "<td>".$row['data_venci']."</td>  <br>";
                }
        } else {
                echo "<tr><td> 0 resultados </td></tr>";
        }

        $conn->close();

        
        ?>
    </div>

</body>
</html>