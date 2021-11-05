<?php

namespace Rafael\Magazord\Controller;
use Rafael\Magazord\Helper\EntityManagerFactory;
use Rafael\Magazord\Entity\Pessoa;

class ListarPessoa implements InterfaceControladoraRequisicao
{
    public function processaRequisicao(): void
    {
        $entityManagerFactory = new EntityManagerFactory();
        $entityManager = $entityManagerFactory->getEntityManager();
        $pessoaRepository = $entityManager->getRepository(Pessoa::class);
        $pessoaList = $pessoaRepository->findAll();
        $titulo = "Listando Pessoas";
        require_once __DIR__ . "/../../view/pessoa/listar-pessoa.php";
    }
}