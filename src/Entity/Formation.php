<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\FormationRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
#[ApiResource()]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le libelle de la formation est obligatoire")]
    #[Assert\Length(min: 1, max: 255, minMessage: "Le libelle de la formation doit avoir au moins {{ limit }} caractères", maxMessage: "Le titre ne peut pas avoir plus de {{ limit }} caractères")]
    #[Groups(["formation"])]

    private ?string $libelle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(["formation"])]

    private ?int $duree = null;

    #[ORM\Column]
    #[Groups(["formation"])]

    private ?bool $isClotured = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function isIsClotured(): ?bool
    {
        return $this->isClotured;
    }

    public function setIsClotured(bool $isClotured): static
    {
        $this->isClotured = $isClotured;

        return $this;
    }
}
