<?php
include_once 'php_action/db_connection.php';
include_once 'includes/header.php';
?>


<div class="row">
 <div class="col s12 m12 green"><h3 class=""><font color="white"><center>CADASTRE O ALUNO!!!</center></font></h3></div>
<br><br><br><br><br><br>


<form action="php_action/create.php" method="POST" enctype="multipart/form-data">

 <div class="input-field col s7 push-m3">
   <input type="text" name="nome" id="nome">
   <label for="nome">Nome</label>
 </div>

 <div class="input-field col s7 push-m3">
   <input type="text" name="sobrenome" id="sobrenome">
   <label for="sobrenome">Sobrenome</label>
 </div>

 <div class="input-field col s7 push-m3">
   <input type="text" name="idade" id="idade">
   <label for="idade">Idade</label>
 </div>

 <div class="input-field col s7 push-m3">
   <input type="text" name="email">
   <label for="email">Email</label>
 </div>

 <div class="input-field col s7 push-m3">
  <input type="text" name="curso">
   <label for="curso">Curso</label>
 </div>


</div>
<input type="file" name="arquivo" id="arquivo" required style="margin-left: 330px;"><br>
<table>
   <th>
      <td>
<center><br><button type="submit" class="btn green" name="cadastrar" id="cadastrar"><h6>FINALIZAR CADASTRO</h6></button><br><br>
<a href="lista.php" class="btn blue">LISTA DE ALUNOS</a></center>
</td>
</th></table>




<?php
include_once 'includes/footer.php';
?>

