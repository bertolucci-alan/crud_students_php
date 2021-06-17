<?php
include_once 'php_action/db_connection.php';
include_once 'includes/header.php';
?>
<?php
if(isset($_GET['id'])):
	$id = mysqli_escape_string($connection, $_GET['id']);
	$sql = "SELECT * FROM aluno WHERE id = '$id'";
$result = mysqli_query($connection, $sql);
//var_dump($result);
$dados = mysqli_fetch_array($result);
//var_dump($dados);
endif;

?>
<div class="row">
	<div class="col s12 m12 green">
		<h3 class="light"><font color="white"><center>EDITAR ALUNO</center></font></h3>
	</div><br><br><br><br><br><br>

	<form action="php_action/update.php?id=<?php echo $dados['id'];?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $dados['id'];?>">
		<div class="input-field col s7 push-m3">
			<input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
			<label for="nome">Nome</label>
		</div>
		<div class="input-field col s7 push-m3">
			<input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome'];?>">
			<label for="sobrenome">Sobrenome</label>
		</div>
		<div class="input-field col s7 push-m3">
			<input type="text" name="idade" id="idade" value="<?php echo $dados['idade'];?>">
			<label for="idade">Idade</label>
		</div>
		<div class="input-field col s7 push-m3">
			<input type="text" name="email" id="email" value="<?php echo $dados['email'];?>">
			<label for="nome">Email</label>
		</div>
		<div class="input-field col s7 push-m3">
			<input type="text" name="curso" id="curso" value="<?php echo $dados['curso'];?>">
			<label for="nome">Curso</label>
		</div>

</div>
<h5 class="light" style="margin-left: 330px;">Imagem atual do aluno:</h5>

<img 
src="<?php echo "./alunos/".$dados['imagem'];?>"
width="200"
height="200"
style="
margin-left: 330px;
border-radius: 50%
">
<br><br>

<input type="file" name="arquivo" id="arquivo" style="
margin-left: 330px;">


<center style="margin-top: 25px;"><button type="submit" name="save" class="btn green">Salvar alterações</button>
<a href="lista.php" class="btn blue">VOLTAR</a></center>
</form>



<?php
include_once 'includes/footer.php';
?>