<?php

namespace Rafael\Magazord\Controller;
use Rafael\Magazord\Helper\EntityManagerFactory;
use Rafael\Magazord\Entity\Contato;

class ExcluirContato implements InterfaceControladoraRequisicao
{
    public function processaRequisicao(): void
    {
        $mensagem = '';
        $idPessoa = '';
        $entityManagerFactory = new EntityManagerFactory();
        $entityManager = $entityManagerFactory->getEntityManager();
        $contatoRepository = $entityManager->getRepository(Contato::class);
        $id = $_GET['id'];
        $contato = $entityManager->getReference(Contato::class, $id);
        if (is_null($contato)) {
            $mensagem = ' <div class="alert alert-danger" role="alert">Contato não encontrado...</div>';
        } else {
            $idPessoa = '?id='.$contato->getIdPessoa();
            $entityManager->remove($contato);
            $entityManager->flush($contato); 
            $mensagem = ' <div class="alert alert-success" role="alert">Contato removido com sucesso!...</div>';
        }
        $titulo = "Excluir Contato";
        require_once __DIR__ . "/../../view/contato/excluir-contato.php";
    }
}