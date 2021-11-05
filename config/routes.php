<?php

use Rafael\Magazord\Controller\{
    ListarPessoa,
    InserirPessoa,
    EditarPessoa,
    ExcluirPessoa,
    ListarContato,
    InserirContato,
    EditarContato,
    ExcluirContato,
    };

return [
    '' => new ListarPessoa(),
    'index' => new ListarPessoa(),
    'listar-pessoa' => new ListarPessoa(),
    'inserir-pessoa' => new InserirPessoa(),
    'editar-pessoa' => new EditarPessoa(),
    'excluir-pessoa' => new ExcluirPessoa(),
    'inserir-contato' => new InserirContato(),
    'editar-contato' => new EditarContato(),
    'excluir-contato' => new ExcluirContato(),
    'listar-contato' => new ListarContato(),
];
