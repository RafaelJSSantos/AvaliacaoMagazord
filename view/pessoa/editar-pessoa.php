<!doctype html>
	<html lang="pt-br">
	<head>
		<title><?= $titulo ?></title>
		<meta charset="UTF-8">
		<link rel="icon" href="https://www.magazord.com.br/wp-content/uploads/2019/08/cropped-favicon-32x32.png" sizes="32x32" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body class="">
		<div class="container">
			<div class="my-4">
				<h3><?= $titulo ?></h3>
				<a href='listar-pessoa' class="btn btn-warning">Voltar</a>
			</div>
			<form action="editar-pessoa?id=<?= $pessoa->getId() ?>" method="POST">
				<div class="mb-3">
					<label for="nome" class="form-label">Nome</label>
					<input type="text" class="form-control"  id="nome" name="nome" value="<?= $pessoa->getNome() ?>"> 
				</div>
				<div class="mb-3">
					<label for="cpf" class="form-label">CPF</label>
					<input type="text" class="form-control" id="cpf" name="cpf" value="<?= $pessoa->getCpf() ?>">
				</div>
				<div class="mb-3">
					<button type="submit" class="btn btn-success" id="btnSalvar">Salvar</button>
				</div>
			</form>
			<?php echo $mensagem ?>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>