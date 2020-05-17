<?php

namespace App\Entity;

use App\Repository\SalesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalesRepository::class)
 */
class Sales
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="sale_id")
     */
    private $id;

    /**
     * @ORM\Column(type="date", name="sale_date")
     */
    private $saleDate;

    /**
     * @ORM\Column(type="decimal", precision=17, scale=2, name="eur_value")
     */
    private $eurValue;

    /**
     * @ORM\Column(type="integer", name="product_id")
     */
    private $productId;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $junk;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaleDate(): ?\DateTimeInterface
    {
        return $this->saleDate;
    }

    public function setSaleDate(\DateTimeInterface $saleDate): self
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    public function getEurValue(): ?string
    {
        return $this->eurValue;
    }

    public function setEurValue(string $eurValue): self
    {
        $this->eurValue = $eurValue;

        return $this;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getJunk(): ?string
    {
        return $this->junk;
    }

    public function setJunk(string $junk): self
    {
        $this->junk = $junk;

        return $this;
    }
}
