<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$categoria_id = $_POST['categoria_id'];
	if(array_key_exists('usado',$_POST)){
		$usado = "true";
	}else{
		$usado = "false";//o segredo do checkbox é lembrar que se ele não for selecionado ele não será enviado
	}
	
	
	if(alteraProduto($conexao,$id,$nome,$preco,$descricao,$categoria_id, $usado)){
	//mysqli_close($conexao); não preisa no mysql
?>
<p class="text-success">Produto <?= $nome; ?>,<?= $preco; ?> adicionado com alterado!</p>
<?php 
} else{
	$msg = mysqli_error($conexao);
?>
<p class="text-danger">O produto <?= $nome; ?> não foi alterado:<?= $msg; ?></p>
<?php }?>
<?php include("rodape.php");?>