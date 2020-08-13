<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
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
    private $numero;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOuverture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rib;

    /**
     * @ORM\Column(type="float")
     */
    private $solde;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $agios;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $remuneration;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fraisOuverture;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="comptes")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="comptes")
     */
    private $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity=Typecompte::class, inversedBy="comptes")
     */
    private $typecompte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(\DateTimeInterface $dateOuverture): self
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(string $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getAgios(): ?float
    {
        return $this->agios;
    }

    public function setAgios(float $agios): self
    {
        $this->agios = $agios;

        return $this;
    }

    public function getRemuneration(): ?float
    {
        return $this->remuneration;
    }

    public function setRemuneration(float $remuneration): self
    {
        $this->remuneration = $remuneration;

        return $this;
    }

    public function getFraisOuverture(): ?float
    {
        return $this->fraisOuverture;
    }

    public function setFraisOuverture(?float $fraisOuverture): self
    {
        $this->fraisOuverture = $fraisOuverture;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getTypecompte(): ?Typecompte
    {
        return $this->typecompte;
    }

    public function setTypecompte(?Typecompte $typecompte): self
    {
        $this->typecompte = $typecompte;

        return $this;
    }
}
