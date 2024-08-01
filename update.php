<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdname = "gestaodeInventario";

    $conn = new mysqli( $servername, $username, $password, $bdname);

    if($conn->connect_error) {
        die("Erro na conexão". $conn->connect_error);
    }

    if(isset($_POST['Editar']))  {
        $id = $_POST['id'];
        $nome_produto = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $preco_produto = $_POST['preco'];
        $data_venci = $_POST['data_venci'];
        $categoria = $_POST['categoria'];

        $sqlUpdate = "UPDATE estoque SET nome = '$nome_produto', quantidade = '$quantidade', preco = '$preco_produto', data_venci = '$data_venci', categoria = '$categoria' WHERE id = '$id' ";

        $result = $conn->query($sqlUpdate);

        $conn->close();
        
    }
    header('Location: index.php');
?>