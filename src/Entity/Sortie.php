<?php

namespace App\Entity;

use App\Repository\SortieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortieRepository::class)]
class Sortie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $qteS;

    #[ORM\Column(type: 'integer')]
    private $puS;

    #[ORM\Column(type: 'date')]
    private $dateS;

    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'sortie')]
    #[ORM\JoinColumn(nullable: false)]
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteS(): ?int
    {
        return $this->qteS;
    }

    public function setQteS(int $qteS): self
    {
        $this->qteS = $qteS;

        return $this;
    }

    public function getPuS(): ?int
    {
        return $this->puS;
    }

    public function setPuS(int $puS): self
    {
        $this->puS = $puS;

        return $this;
    }

    public function getDateS(): ?\DateTimeInterface
    {
        return $this->dateS;
    }

    public function setDateS(\DateTimeInterface $dateS): self
    {
        $this->dateS = $dateS;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
