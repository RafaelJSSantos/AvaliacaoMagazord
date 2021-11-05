<?php

namespace Rafael\Magazord\Controller;
use Rafael\Magazord\Helper\EntityManagerFactory;
use Rafael\Magazord\Entity\Contato;

class InserirContato implements InterfaceControladoraRequisicao
{
    public function processaRequisicao(): void
    {  
        $mensagem = '';
        if (isset($_POST['descricao']) && strlen($_POST['descricao'])==0) {
            $mensagem = ' <div class="alert alert-danger" role="alert">Descrição não pode ser nula!</div>';
        } else if (isset($_POST['tipo']) && strlen($_POST['tipo'])==0) {
            $mensagem = ' <div class="alert alert-danger" role="alert">Selecione um tipo!</div>';
        } else if (isset($_POST['descricao']) && isset($_POST['tipo'])) {
            $contato = new Contato();
            $contato->setDescricao($_POST['descricao']);
            $contato->setTipo($_POST['tipo']);
            $contato->setIdPessoa($_GET['id']);
            $entityManagerFactory = new EntityManagerFactory();
            $entityManager = $entityManagerFactory->getEntityManager();
            $contatoRepository = $entityManager->getRepository(Contato::class);
            $entityManager->persist($contato);
            $entityManager->flush();
            $mensagem = ' <div class="alert alert-success" role="alert">Salvo com sucesso!</div>';
        }
        $titulo = "Inserir Contato";
        require_once __DIR__ . "/../../view/contato/inserir-contato.php";
    }
}