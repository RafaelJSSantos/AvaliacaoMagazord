<?php

namespace Rafael\Magazord\Controller;
use Rafael\Magazord\Helper\EntityManagerFactory;
use Rafael\Magazord\Entity\Pessoa;
use Rafael\Magazord\Entity\Contato;

class ExcluirPessoa implements InterfaceControladoraRequisicao
{
    public function processaRequisicao(): void
    {
        $mensagem = '';
        $entityManagerFactory = new EntityManagerFactory();
        $entityManager = $entityManagerFactory->getEntityManager();
        $pessoaRepository = $entityManager->getRepository(Pessoa::class);
        $id = $_GET['id'];
        $pessoa = $entityManager->getReference(Pessoa::class, $id);
        if (is_null($pessoa)) {
            $mensagem = ' <div class="alert alert-danger" role="alert">Pessoa não encontrada...</div>';
        } else {
            $contatoRepository = $entityManager->getRepository(Contato::class);
            $contatoList = $contatoRepository->findBy([
                'idPessoa' => $id
            ]);
            if (!is_null($contatoList)) {
                foreach($contatoList as $contato){
                    $entityManager->flush($contato); 
                    $entityManager->remove($contato);
                }
            }
            $entityManager->remove($pessoa);
            $entityManager->flush($pessoa); 
             $mensagem = ' <div class="alert alert-success" role="alert">Pessoa removida com sucesso!...</div>';
        }
        $titulo = "Excluir Pessoa";
        require_once __DIR__ . "/../../view/pessoa/excluir-pessoa.php";
    }
}