<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="source")
 * @ApiResource(
 *     attributes={
 *          "normalization_context"={"groups"={"read"}},
 *          "denormalization_context"={"groups"={"write"}}
 *     }
 * )
 */
class Source
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $id;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max="255")
     * @Groups({"read", "write"})
     */
    private $title;
    
    /**
     * @var null|string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="255")
     * @Groups({"read", "write"})
     */
    private $collection;
    
    /**
     * @var bool
     * @ORM\Column(type="boolean")
     * @Assert\Type("bool")
     * @Groups({"read"})
     */
    private $isBook;
    
    /**
     * @var bool
     * @ORM\Column(type="boolean")
     * @Assert\Type("bool")
     * @Groups({"read"})
     */
    private $isWebsite;
    
    /**
     * Source constructor.
     */
    function __construct()
    {
        $this->isBook = false;
        $this->isWebsite = false;
    }
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * @param string $title
     * @return \App\Entity\Source
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return null|string
     */
    public function getCollection(): ?string
    {
        return $this->collection;
    }
    
    /**
     * @param null|string $collection
     * @return $this
     */
    public function setCollection(?string $collection)
    {
        $this->collection = $collection;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsBook(): bool
    {
        return $this->isBook;
    }
    
    /**
     * @param $isBook
     * @return \App\Entity\Source
     */
    public function setIsBook($isBook): self
    {
        $this->isBook = $isBook;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsWebsite(): bool
    {
        return $this->isWebsite;
    }
    
    /**
     * @param $isWebsite
     * @return \App\Entity\Source
     */
    public function setIsWebsite($isWebsite): self
    {
        $this->isWebsite = $isWebsite;
        return $this;
    }
    
}