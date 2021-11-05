<?php

namespace Rafael\Magazord\Controller;
use Rafael\Magazord\Helper\EntityManagerFactory;
use Rafael\Magazord\Entity\Pessoa;
use Rafael\Magazord\Controller\ValidarCpf;

class InserirPessoa implements InterfaceControladoraRequisicao
{
    public function processaRequisicao(): void
    {
        $mensagem = '';
        if (isset($_POST['nome']) && strlen($_POST['nome'])==0) {
            $mensagem = ' <div class="alert alert-danger" role="alert">Nome não pode ser nulo!</div>';
        } else if (isset($_POST['cpf']) && strlen($_POST['cpf'])==0) {
            $mensagem = ' <div class="alert alert-danger" role="alert">CPF não pode ser nulo!</div>';
        } else if (isset($_POST['nome']) && isset($_POST['cpf'])) {
            $validaCpf = new ValidarCpf();
            if(!$validaCpf->validaCpf($_POST['cpf'])) {
                $mensagem = ' <div class="alert alert-danger" role="alert">CPF inválido!</div>';
            }else{
                $pessoa = new Pessoa();
                $pessoa->setNome($_POST['nome']);
                $pessoa->setCpf($_POST['cpf']);
                $entityManagerFactory = new EntityManagerFactory();
                $entityManager = $entityManagerFactory->getEntityManager();
                $pessoaRepository = $entityManager->getRepository(Pessoa::class);
                $entityManager->persist($pessoa);
                $entityManager->flush();
                $mensagem = ' <div class="alert alert-success" role="alert">Salvo com sucesso!</div>';
            }
        }
        $titulo = "Inserir Pessoa";
        require_once __DIR__ . "/../../view/pessoa/inserir-pessoa.php";
    }
}