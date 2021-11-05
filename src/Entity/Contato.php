<?php

namespace Rafael\Magazord\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Contato
 *
 * @ORM\Entity
 * @ORM\Table(name="Contato")
 *
 */
class Contato
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
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $idPessoa;
    /**
     * @ORM\Column(type="string", length=50)
     *
     * @var string
     */
    private $tipo;
   /**
     * @ORM\Column(type="string", length=200)
     *
     * @var string
     */
    private $descricao;

    public function getId()
    {
        return $this->id;
    }

    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setIdPessoa(string $idPessoa)
    {
        $this->idPessoa = $idPessoa;
    }

    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }
}
