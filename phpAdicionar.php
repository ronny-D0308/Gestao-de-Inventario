<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdname = "gestaodeInventario";

    $conn = new mysqli( $servername, $username, $password, $bdname);

    if($conn->connect_error) {
        die("Erro na conexão". $conn->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_produto = $_POST['nome_produto'];
        $quantidade = $_POST['quantidade'];
        $preco_produto = $_POST['preco'];
        $categoria = $_POST['categoria'];

        if(isset($_POST['data_venci'])) {
            $data_venci = $_POST['data_venci'];
        }

        $sql = $conn -> prepare("INSERT INTO estoque (nome, quantidade, preco, data_venci, categoria) VALUES ('$nome_produto', '$quantidade', '$preco_produto', '$data_venci', '$categoria')");
        
        if($sql -> execute()) {
            echo "Produto adicionado com sucesso!!";
        } else {
            echo "Produto não adicionado!!";
        } 

        $sql->close();
        $conn->close();

        header('Location: index.php');
    }
?>