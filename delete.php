<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['nome_produto'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdname = "gestaodeInventario";

    $conn = new mysqli( $servername, $username, $password, $bdname);

    if($conn->connect_error) {
        die("Erro na conexão". $conn->connect_error);
    }

    $consul = "SELECT * FROM estoque WHERE nome LIKE '%$produto%' ";

    $result = $conn->query($consul);

    if($result->num_rows > 0) {
        $consulDelete = "DELETE FROM estoque WHERE nome LIKE '%$produto%'";
        $resultDelete = $conn->query($consulDelete);
    }
    header('Location: index.php');
}

    $conn->close();
?>