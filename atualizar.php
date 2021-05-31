<?php

include "conexao.php";

if (isset($_POST['alterar'])) {
    # code...
    $nome   = $_POST['nome'];
    $notas = $_POST['notas'];
    $curso = $_POST['curso'];
    $resultado = $_POST['rersultado'];
    $id = $_POST ['editar_id'];
    $query = mysqli_query($con, "UPDATE estudantes SET nome = '$nome', notas = '$notas', curso = '$curso', resultado = '$resultado' WHERE id = '$id'");

    if ($query) {
        # code...
        header("Location: index.php");
    } else {
        # code...
        echo "<script>alert('Desculpe, a consulta de atualização não funciona')</script>";
    }    
}
?>
<!DOCTYPE html>
<html>
   <head>
     <title>PHp Cadastro usando Mysqli</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
   </head>


   <body>
      <div class="container" style="margin-top: 70px;">
         <div class="row justify-content-center">
            <div class="col-md-10 text-center">

                <?php if(isset($_GET['alterar_id'])); ?>

                <?php $id = $_GET['alterar_id'];  ?>

                <?php $query = mysqli_query($con, "SELECT * FROM estudantes WHERE id = '$id'");

                $r = mysqli_fetch_array($query);
                $nome = $r['nome'];
                $notas = $r['notas'];
                $curso = $r['curso'];
                $resultado = $r['resultado'];

                ?>

                <form method="POST" action="atualizar.php">
                   <div class="form-group">
                     <input type="text" name="nome" class="form-control" placeholder="Digite seu nome..." required = "" value="<?php echo $nome; ?>">
                   </div>

                   <div class="form-group">
                      <input type="text" name="notas" class="form-control" placeholder="Digite sua nota..." required = "" value="<?php echo $notas; ?>">
                   </div>

                   <div class="form-group">
                      <input type="text" name="curso" class="form-control" placeholder="Digite seu curso" required = "" value="<?php echo $curso; ?>">
                   </div>

                   <div class="form-group">
                      <input type="text" name="resultado" class="form-control" placeholder="Digite o resultado..." required = "" value="<?php echo $resultado; ?>">
                   </div>

                   <input type="hidden" name="editar_id" value="<?php echo $id; ?>">

                   <div class="form-group">
                     <input type="submit" name="alterar" class="btn btn-info" value="Atualizar Estudante">
                   </div>
                </form>
                
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   </body>
</html>
