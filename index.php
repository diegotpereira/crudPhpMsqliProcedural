<!DOCTYPE html>
<html>
   <head>
      <title>PHP Cadastro Mysqli</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
   </head>
<body>
   <div class="container" style="margin-top: 70px;">
       <div class="row justify-content-center">
           <div class="col-md-10 text-center">
               <?php 

               include "conexao.php";

               if (isset($_POST['submit'])) {
                   # code...
                   $nome    = $_POST['nome'];
                   $notas  = $_POST['notas'];
                   $curso = $_POST['curso'];
                   $resultado = $_POST['resultado'];

                   $Query = mysqli_query($con, "INSERT INTO estudantes (nome, notas, curso, resultado) VALUES ('$nome', '$notas', '$curso', '$resultado')");

                   if ($Query) {
                       # code...
                       echo "<script>alert('Registro do aluno foi inserido com sucesso!')</script>";
                   } else {
                       # code...
                       echo "<script>alert('Desculpe, ocorreu um erro!')</script>";
                   }
               }
               ?>

               <!-- Botão Gatilho da Modal -->
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Adicionar registro</button>

               <!-- Modal --> 
               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                               </button>
                           </div>

                           <div class="modal-body">
                               <form method="POST" action="">
                                   <div class="form-group">
                                      <input type="text" name="nome" class="form-control" placeholder="Digite um nome..." required="">
                                   </div>

                                   <div class="form-group">
                                      <input type="text" name="notas" class="form-control" placeholder="Digite uma nota..." required="">
                                   </div>

                                   <div class="form-group">
                                      <input type="text" name="curso" class="form-control" placeholder="Digite seu curso..." required="">
                                   </div>

                                   <div class="form-group">
                                      <input type="text" name="resultado" class="form-control" placeholder="Digite um resultado..." required="">
                                   </div>

                                   <div class="form-group">
                                      <input type="submit" name="submit" class="btn btn-info" value="Salvar">
                                   </div>
                               </form>
                           </div>

                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                           </div>
                       </div>
                   </div>
               </div>

               <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                         <th>Nome</th>
                         <th>Notas</th>
                         <th>Curso</th>
                         <th>Resultado</th>
                         <th>Alterar</th>
                         <th>Deletar</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php 
                        $Show = mysqli_query($con, "SELECT * FROM estudantes");
                        while ($r = mysqli_fetch_array($Show)): ?>
                             <tr>
                                <td><?php echo $r ['nome']; ?></td>
                                <td><?php echo $r['notas'];?></td>
                                <td><?php echo $r['curso'];?></td>
                                <td><?php echo $r['resultado'];?></td>

                                <td><a href="atualizar.php?alterar_id=<?php echo $r['id']; ?>" class="btn btn-warning">Atualizar</a></td>
                                <td><a href="deletar.php?deletar_id=<?php echo $r['id']; ?>" class="btn btn-danger">Deletar</a></td>
                             </tr>

                             <?php endwhile; ?>  
                  </tbody>
               </table>
           </div>
       </div>
   </div>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

   <script type="text/javascript">
      $(document).ready(function(){
          $('#example').DataTable();
      });
   </script>
</body>   
</html>