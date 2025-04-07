<?php

namespace App\Entity;

use App\Repository\TopicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TopicRepository::class)]
class Topic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Blog>
     */
    #[ORM\OneToMany(mappedBy: 'topic', targetEntity: Blog::class)]
    private Collection $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Blog>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Blog $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->setTopic($this);
        }

        return $this;
    }

    public function removeArticle(Blog $article): static
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getTopic() === $this) {
                $article->setTopic(null);
            }
        }

        return $this;
    }
}
