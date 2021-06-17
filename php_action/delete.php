<?php
include_once 'db_connection.php';


if (isset($_POST['delete'])) {
    $id = mysqli_escape_string($connection, $_POST['id']);
    $sql = "DELETE FROM aluno WHERE id = '$id'";
    if (mysqli_query($connection,$sql)) {
        $_SESSION['mensagem'] = "Registros deletados com sucesso!";
        header('Location:../lista.php');
    }
    else{
        $_SESSION['mensagem'] = "Erro ao deletar";
        
    }
}
?>