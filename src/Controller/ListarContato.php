<?php

namespace Rafael\Magazord\Controller;
use Rafael\Magazord\Helper\EntityManagerFactory;
use Rafael\Magazord\Entity\Pessoa;
use Rafael\Magazord\Entity\Contato;

class ListarContato implements InterfaceControladoraRequisicao
{
    public function processaRequisicao(): void
    {
        $entityManagerFactory = new EntityManagerFactory();
        $entityManager = $entityManagerFactory->getEntityManager();
        $pessoaRepository = $entityManager->getRepository(Pessoa::class);
        $pessoa = $pessoaRepository->find($_GET['id']);
        $titulo = "Listando contatos de ".$pessoa->getNome();

        $contatoRepository = $entityManager->getRepository(Contato::class);
        $contatoList = $contatoRepository->findBy([
            'idPessoa' => $_GET['id']
        ]);
        require_once __DIR__ . "/../../view/contato/listar-contato.php";
    }
}