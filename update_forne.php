<?php
    include('configPHP.php');

    if(isset($_POST['Editar']))  {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $CNPJ = $_POST['CNPJ'];
        $produto_fornecido = $_POST['produto_fornecido'];
        $contato = $_POST['contato'];

        $sqlUpdate = "UPDATE fornecedores SET nome = '$nome', CNPJ = '$CNPJ', produto_fornecido = '$produto_fornecido', contato = '$contato' WHERE id = '$id' ";

        $result = $conn->query($sqlUpdate);

        $conn->close();
        
    }
    header('Location: index.php');
?>