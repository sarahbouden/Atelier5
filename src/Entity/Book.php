<?php

namespace App\Entity;

use App\Repository\BookRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $ref = null;

    #[ORM\Column(length: 20)]
    private ?string $title = null;

    #[ORM\Column(length: 20)]
    private ?string $category = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTimeInterface $public_date = null;

    #[ORM\ManyToOne(inversedBy: 'Books')]
    private ?Author $Author = null;

    #[ORM\Column]
    private ?int $nbrlivre = null;

    public function getRef(): ?int
    {
        return $this->ref;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setRef(int $ref): static
    {
        $this->ref = $ref;

        return $this;
    }
    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getPublicDate(): ?\DateTimeInterface
    {
        return $this->public_date;
    }

    public function setPublicDate(\DateTimeInterface $public_date): static
    {
        $this->public_date = $public_date;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->Author;
    }

    public function setAuthor(?Author $Author): static
    {
        $this->Author = $Author;

        return $this;
    }

    public function getNbrlivre(): ?int
    {
        return $this->nbrlivre;
    }

    public function setNbrlivre(int $nbrlivre): static
    {
        $this->nbrlivre = $nbrlivre;

        return $this;
    }
}
