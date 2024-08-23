<?php
include('configPHP.php');

$sql = "SELECT id, nome, CNPJ, produto_fornecido, contato FROM fornecedores";
$result = $conn->query($sql); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fornecedores</title>

    <style>
        *{
            margin:0;
            padding:0;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
        .conteiner-form {
            margin:0 auto;
            padding: 10px 10px;
            width: 500px;
            height: auto;
            background-color:#333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }
        .title{
            color: #fff;
            margin-bottom: 20px;
        }
        .conteiner-campos{
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 20px;
        }
        label{
            color:#fff;
            margin: 10px 0;
        }
        .campos{
            padding-left: 5px;
            width: 250px;
            height: 30px;
            font-size: 20px;
            outline: none;
            border: none;
            border-radius: 3px;
        }
        .butao-enviar {
            margin: 20px 0;
            width: 90px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color:white;
            cursor: pointer;
        }
        #categoria {
            width: 150px;
            height: 40px;
            outline:none;
        }
        .table{
            width: 600px;
            margin: 0 auto;
            text-align:center;
        }
        .acoes {
            color:#333;
            font-size: 25px;
            text-decoration: none;
        }
        br{
            margin-bottom: 200px;
        }
    </style>
</head>
<body>
    <header>
        <div class="conteiner-h1">
            <a href="index.php"> <h1 class="title"> Gestão de Inventário </h1> </a>
        </div>
    </header>


        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th class="coluna" > Nome </th>
                    <th class="coluna" > CNPJ </th>
                    <th class="coluna" > PRODUTO FORNECIDO </th>
                    <th class="coluna" > CONTATO </th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['nome']."</td>";
                            echo "<td>".$row['CNPJ']."</td>";
                            echo "<td>".$row['produto_fornecido']."</td>";
                            echo "<td>".$row['contato']."</td>";
                            echo "<td>
                                    <a class='acoes' id='Deletar' href='phpDelete_forne.php?id=$row[id]' title='Deletar'> &#128465 </a>
                                </td>";
                            echo "<td>
                                <a class='acoes' id='Editar' href='phpEditar_forne.php?id=$row[id]' title='Editar'> &#10000 </a>
                            </td></tr>";
                            }
                    } else {
                            echo "<tr><td> 0 resultados </td></tr>";
                    }

                    $conn->close();

                ?>
            </tbody>
        </table>
        <br><br><br><br>
  
    <div class="conteiner-form">
        <h1 class="title"> Cadastrar Fornecedor </h1>

        <form action="phpCadastrarForne.php" method="post" class="conteiner-campos">
                <label> Nome: </label>
                <input type="text" name="nome" class="campos" required>
                <label> CNPJ: </label>
                <input type="text" name="CNPJ" class="campos" required>
                <label> Produto fornecido: </label>
                <input type="text" name="produto_fornecido" class="campos" required>
                <label> Contato: </label>
                <input type="number" name="contato" id="preco" class="campos" min="0" maxlength="11" required>
                

                <input type="submit" class="butao-enviar" name="enviar" value="Adicionar">
        </form>   
    </div> 

</body>
</html>