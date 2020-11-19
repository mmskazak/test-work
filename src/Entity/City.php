<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity=Address::class, mappedBy="city")
     */
    private $addresess;

    public function __construct()
    {
        $this->addresess = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getRegion(): ?int
    {
        return $this->region;
    }

    public function setRegion(int $region): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddresess(): Collection
    {
        return $this->addresess;
    }

    public function addAddresess(Address $addresess): self
    {
        if (!$this->addresess->contains($addresess)) {
            $this->addresess[] = $addresess;
            $addresess->setCity($this);
        }

        return $this;
    }

    public function removeAddresess(Address $addresess): self
    {
        if ($this->addresess->removeElement($addresess)) {
            // set the owning side to null (unless already changed)
            if ($addresess->getCity() === $this) {
                $addresess->setCity(null);
            }
        }

        return $this;
    }
}
