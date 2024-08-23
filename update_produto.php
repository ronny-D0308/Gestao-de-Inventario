<?php
    include('configPHP.php');

    if(isset($_POST['Editar']))  {
        $id = $_POST['id'];
        $nome_produto = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $preco_produto = $_POST['preco'];
        $data_venci = $_POST['data_venci'];
        $categoria = $_POST['categoria'];
        $codigo = $_POST['codigo_produto'];

        $sqlUpdate = "UPDATE produto SET nome = '$nome_produto', quantidade = '$quantidade', preco = '$preco_produto', data_venci = '$data_venci', categoria = '$categoria', codigo_produto = '$codigo' WHERE id = '$id' ";

        $result = $conn->query($sqlUpdate);

        $conn->close();
        
    }
    header('Location: index.php');
?>
