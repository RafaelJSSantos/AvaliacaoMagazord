<?php

namespace Rafael\Magazord\Controller;
use Rafael\Magazord\Helper\EntityManagerFactory;
use Rafael\Magazord\Entity\Pessoa;
use Rafael\Magazord\Controller\ValidarCpf;

class EditarPessoa implements InterfaceControladoraRequisicao
{
    public function processaRequisicao(): void
    {  
        $mensagem = '';
        $entityManagerFactory = new EntityManagerFactory();
        $entityManager = $entityManagerFactory->getEntityManager();
        $pessoaRepository = $entityManager->getRepository(Pessoa::class);
        $pessoa = $pessoaRepository->find($_GET['id']);
        $titulo = "Listando Pessoas";
        if (isset($_POST['nome']) && strlen($_POST['nome'])==0) {
            $mensagem = ' <div class="alert alert-danger" role="alert">Nome não pode ser nulo!</div>';
        } else if (isset($_POST['cpf']) && strlen($_POST['cpf'])==0) {
            $mensagem = '<div class="alert alert-danger" role="alert">CPF não pode ser nulo!</div>';
        } else if (isset($_POST['cpf'])) {
            $validaCpf = new ValidarCpf();
            if(!$validaCpf->validaCpf($_POST['cpf'])) {
                $mensagem = '<div class="alert alert-danger" role="alert">CPF inválido!</div>';
            }else{
                $pessoa->setNome($_POST['nome']);
                $pessoa->setCpf($_POST['cpf']);
                $entityManager->flush($pessoa);
                $mensagem = '<div class="alert alert-success" role="alert">Salvo com sucesso!</div>';
            }
        }
        $titulo = "Editar Pessoa";
        require_once __DIR__ . "/../../view/pessoa/editar-pessoa.php";
    }
}