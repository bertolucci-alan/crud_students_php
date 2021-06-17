<?php
include_once 'php_action/db_connection.php';
include_once 'includes/header.php';
?>
<link rel="stylesheet" href="novo.css">


<div class="row">
	<div class="col s12 m12 green ">
		<h3 class="light" id="h3"><font color="white"><center>ALUNOS CADASTRADOS</center></font></h3>
	</div><br><br><br><br><br><br>
</div>
<?php

$sql = "SELECT * FROM aluno";
$result = mysqli_query($connection, $sql);
if(mysqli_num_rows($result) > 0):
while ($dados = mysqli_fetch_array($result)): 

//var_dump($result);

?>
<div id="tab">
	<hr color="green" width="70%"></hr>
	<div class="row">
		<div class="col s12 m8 push-m2">
<table style="margin-top: 40px;">
	<tr>
		<td rowspan="3">
            <img 
                src="<?php echo "./alunos/".$dados['imagem'];?>" 
                id="imagem"
                width="200" 
                height="200" 
            >
        </td>
		<td><strong>Nome: </strong>&nbsp; <?php echo strlen($dados['nome']) >= 10 ? substr($dados['nome'], 0, 9) : $dados['nome'];?></td>
		<td><strong>Email:</strong>&nbsp; <?php echo strlen($dados['email']) >= 10 ? substr($dados['email'], 0, 9) : $dados['email'];?></td>
	</tr>
	<tr>
		<td><strong>Sobrenome:</strong>&nbsp; <?php echo strlen($dados['sobrenome']) >= 10 ? substr($dados['sobrenome'], 0, 9) : $dados['sobrenome'];?></td>
		<td><strong>Curso:</strong>&nbsp; <?php echo strlen($dados['curso']) >= 10 ? substr($dados['curso'], 0, 9) : $dados['curso'];?></td>
	</tr>
	<tr>
		<td><strong>Idade:</strong>&nbsp; <?php echo $dados['idade'];?></td>
		
		<td><a href="editaraluno.php?id=<?php echo $dados['id'];?>" class="btn-floating orange" id="editar"><i class="material-icons">edit</i></a>
		<a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a>

		<!-- Modal Structure -->
		<div id="modal<?php echo $dados['id'];?>" class="modal">
    <div class="modal-content">
      <h4>Atenção!</h4>
      <p>Tem certeza que deseja excluir esse aluno(a)?</p>
    </div>
    <div class="modal-footer">
    

<table>
<th>
<td><a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a></td>
<td>
      <form action="php_action/delete.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
          
        <button type="submit" name="delete" class="btn red">Deletar</button>
</form></td>

</th>
</table>

    </div>
  </div>

	</tr>
</table>
</div>
</div>
</div>


<?php
endwhile;
?>

<?php
else:
?>
<center><h4 class="light">Não há alunos cadastrados!</h4></center>

<?php
endif;
include_once 'includes/footer.php';
?>

<a href="tela.php" class="btn blue" id="voltar" style="margin-left: 600px; width: 8%; margin-top: 10px;">VOLTAR</a>
