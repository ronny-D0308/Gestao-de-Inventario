<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['nome_produto'];

    include('configPHP.php');

    $consul = "SELECT * FROM produto WHERE nome LIKE '%$produto%' ";

    $result = $conn->query($consul);

    if($result->num_rows > 0) {
        $consulDelete = "DELETE FROM produto WHERE nome LIKE '%$produto%'";
        $resultDelete = $conn->query($consulDelete);
    }
    header('Location: index.php');
}

    $conn->close();
?>
