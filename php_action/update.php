<?php
include_once 'db_connection.php';
session_start();

if (isset($_POST['save'])):
$file = $_FILES['arquivo']['name'];

	if($file !=""):

 	$formatosPermitidos = array("jpg", "png", "jpeg");
 	$extensao = pathinfo($file, PATHINFO_EXTENSION);

 	if(in_array($extensao, $formatosPermitidos)):
 		$pasta = "../alunos/";
 		$temponame = $_FILES['arquivo']['tmp_name'];
 		$newname = uniqid().".$extensao";

 		$nome = mysqli_escape_string($connection, $_POST['nome']);
		$sobrenome = mysqli_escape_string($connection, $_POST['sobrenome']);
		$idade = mysqli_escape_string($connection, $_POST['idade']);
		$email = mysqli_escape_string($connection, $_POST['email']);
		$curso = mysqli_escape_string($connection, $_POST['curso']);
		$id = mysqli_escape_string($connection, $_POST['id']);

		$sql = "UPDATE aluno SET imagem='$newname', nome= '$nome', sobrenome = '$sobrenome', idade='$idade', email='$email', curso='$curso' WHERE id ='$id'";

		if($result = mysqli_query($connection, $sql)):
			move_uploaded_file($temponame, $pasta.$newname);
			header('Location:../lista.php');
		endif;
	else:
		header('Location:../lista.php');
	
	
	endif;


	else:
		$_GET['id'];
		var_dump($_GET['id']); echo "<br>";
		$id = mysqli_escape_string($connection, $_GET['id']);
		echo "$id<br>";
		$sql = "SELECT imagem FROM aluno WHERE id = '$id'";
	$result = mysqli_query($connection, $sql);
	var_dump($result); echo "<br>";
	$dados = mysqli_fetch_array($result);
	var_dump($dados);echo "<br>";
	echo $dados['imagem'];
	$nomeimg = $dados['imagem'];



		$nome = mysqli_escape_string($connection, $_POST['nome']);
		$sobrenome = mysqli_escape_string($connection, $_POST['sobrenome']);
		$idade = mysqli_escape_string($connection, $_POST['idade']);
		$email = mysqli_escape_string($connection, $_POST['email']);
		$curso = mysqli_escape_string($connection, $_POST['curso']);
		




	$sql = "UPDATE aluno SET imagem='$nomeimg', nome= '$nome', sobrenome = '$sobrenome', idade='$idade', email='$email', curso='$curso' WHERE id ='$id'";
	$result = mysqli_query($connection, $sql);
	header('Location:../lista.php');
	?>
<img src="<?php echo "../alunos/".$dados['imagem'];?>" >

<?php


	
		
endif;
endif;






?> 