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
				<a href='..' class="btn btn-warning">Voltar</a>
				<a href='inserir-pessoa' class="btn btn-success">Inserir pessoa</a>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col" width="40%">Nome</th>
						<th scope="col" width="30%">CPF</th>
						<th scope="col" width="30%">Opção</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pessoaList as $pessoa) { ?>
						<tr>
							<td><?= $pessoa->getNome() ?></td>
							<td><?= $pessoa->getCpf() ?></td>
							<td>
								<a href='listar-contato?id=<?= $pessoa->getId() ?>'><span class="badge bg-info">Listar Contatos</span></a>
								<a href='editar-pessoa?id=<?= $pessoa->getId() ?>'><span class="badge mr-4 bg-primary">Editar Pessoa</span></a>
								<a href='excluir-pessoa?id=<?= $pessoa->getId() ?>'><span class="badge bg-danger">Excluir Pessoa</span></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>