<?php

namespace App\Entity;

use App\Repository\EntreeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntreeRepository::class)]
class Entree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $qteE;

    #[ORM\Column(type: 'integer')]
    private $puE;

    #[ORM\Column(type: 'date')]
    private $dateE;

    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'entree')]
    #[ORM\JoinColumn(nullable: false)]
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteE(): ?int
    {
        return $this->qteE;
    }

    public function setQteE(int $qteE): self
    {
        $this->qteE = $qteE;

        return $this;
    }

    public function getPuE(): ?int
    {
        return $this->puE;
    }

    public function setPuE(int $puE): self
    {
        $this->puE = $puE;

        return $this;
    }

    public function getDateE(): ?\DateTimeInterface
    {
        return $this->dateE;
    }

    public function setDateE(\DateTimeInterface $dateE): self
    {
        $this->dateE = $dateE;

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
