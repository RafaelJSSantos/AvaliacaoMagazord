<?php

namespace Rafael\Magazord\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Pessoa
 *
 * @ORM\Entity
 * @ORM\Table(name="Pessoa")
 *
 */
class Pessoa
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=200)
     *
     * @var string
     */
    private $nome;
   /**
     * @ORM\Column(type="string", length=200)
     *
     * @var string
     */
    private $cpf;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }
}
