<?php
if(!empty($_GET['id'])) {
    include('configPHP.php');

    $id = $_GET['id'];

    $consul = "SELECT * FROM fornecedores WHERE id = $id";

    $result = $conn->query($consul);

    if($result->num_rows > 0) {
        $consulDelete = "DELETE FROM fornecedores WHERE id = $id";
        $resultDelete = $conn->query($consulDelete);
    }
    header('Location: cadastro_fornecedor.php');
}
?>