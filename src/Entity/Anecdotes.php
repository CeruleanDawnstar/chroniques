<?php

namespace App\Entity;

use App\Repository\AnecdotesRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass=AnecdotesRepository::class)
 */
class Anecdotes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $anecdote;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgUrl;

    /**
     * @ORM\ManyToOne(targetEntity=Evenement::class, inversedBy="anecdotes")
     * @JoinColumn(name="relation_id", referencedColumnName="id")
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAnecdote(): ?string
    {
        return $this->anecdote;
    }

    public function setAnecdote(string $anecdote): self
    {
        $this->anecdote = $anecdote;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    public function getRelation(): ?Evenement
    {
        return $this->relation;
    }

    public function setRelation(?Evenement $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
