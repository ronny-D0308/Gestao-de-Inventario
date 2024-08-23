<?php
    include('configPHP.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_produto = $_POST['nome_produto'];
        $quantidade = $_POST['quantidade'];
        $preco_produto = $_POST['preco'];
        $categoria = $_POST['categoria'];
        $codigo_produto = $_POST['codigo_produto'];

        if(isset($_POST['data_venci'])) {
            $data_venci = $_POST['data_venci'];
        }

        $sql = $conn -> prepare("INSERT INTO produto (nome, quantidade, preco, data_venci, categoria, codigo_produto) VALUES ('$nome_produto', '$quantidade', '$preco_produto', '$data_venci', '$categoria', '$codigo_produto')");
        
        if($sql -> execute()) {
            echo "Produto adicionado com sucesso!!";
        } else {
            echo "Produto não adicionado!!";
        } 

        $sql->close();
        $conn->close();

        header('Location:index.php');
    }
?>
