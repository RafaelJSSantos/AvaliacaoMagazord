<?php

namespace Rafael\Magazord\Controller;
use Rafael\Magazord\Helper\EntityManagerFactory;
use Rafael\Magazord\Entity\Contato;

class EditarContato implements InterfaceControladoraRequisicao
{
    public function processaRequisicao(): void
    {
        $mensagem = '';
        $entityManagerFactory = new EntityManagerFactory();
        $entityManager = $entityManagerFactory->getEntityManager();
        $contatoRepository = $entityManager->getRepository(Contato::class);
        $contato = $contatoRepository->find($_GET['id']);
        $titulo = "Listando Contatos";
        if (isset($_POST['descricao']) && strlen($_POST['descricao'])==0) {
            $mensagem = '<div class="alert alert-danger" role="alert">Descrição não pode ser nula!</div>';
        } else if (isset($_POST['tipo']) && strlen($_POST['tipo'])==0) {
            $mensagem = '<div class="alert alert-danger" role="alert">Selecione um tipo!</div>';
        }else if (isset($_POST['descricao']) && isset($_POST['tipo'])) {
            $contato->setDescricao($_POST['descricao']);
            $contato->setTipo($_POST['tipo']);
            $entityManager->flush($contato);
            $mensagem = '<div class="alert alert-success" role="alert">Salvo com sucesso!</div>';
        }
        $titulo = "Editar Contato";
        require_once __DIR__ . "/../../view/contato/editar-contato.php";
    }
}