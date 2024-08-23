<?php
    include('configPHP.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $CNPJ = $_POST['CNPJ'];
        $produto_fornecido = $_POST['produto_fornecido'];
        $contato = $_POST['contato'];
        

        $sql = $conn -> prepare("INSERT INTO fornecedores (nome, CNPJ, produto_fornecido, contato) VALUES ('$nome','$CNPJ', '$produto_fornecido', '$contato')");
        
        if($sql -> execute()) {
            echo "Fornecedor cadastrado com sucesso!!";
        } else {
            echo "Fornecedor não cadastrado!!";
        } 

        $sql->close();
        $conn->close();

        header('Location: index.php');
    }
?>