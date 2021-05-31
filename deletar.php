<?php 
include 'conexao.php';

if (isset($_GET['deletar_id'])) {
    # code...
    $id = $_GET['deletar_id'];

    $query = mysqli_query($con, "DELETE FROM estudantes WHERE id = '$id'");

    if ($query) {
        # code...
        header("Location: index.php");
    } else {
        # code...
        echo "<script>alert('Desculpe, a consulta de atualização não funciona!')</script:";
    }
}
?>