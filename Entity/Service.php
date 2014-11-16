<?php

namespace justasr\HomeServicesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="service")
 * @ORM\Entity
 */
class Service
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="service")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $name;

    /**
     * @ORM\oneToMany(targetEntity="ServiceCost", mappedBy="service")
     */
    private $servicesCosts;

    public function __construct() {
        $this->servicesCosts = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \justasr\HomeServicesBundle\Entity\User $user
     * @return Services
     */
    public function setUser(\justasr\HomeServicesBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \justasr\HomeServicesBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Add servicesCosts
     *
     * @param \justasr\HomeServicesBundle\Entity\ServiceCost $servicesCosts
     * @return Service
     */
    public function addServicesCost(\justasr\HomeServicesBundle\Entity\ServiceCost $servicesCosts)
    {
        $this->servicesCosts[] = $servicesCosts;

        return $this;
    }

    /**
     * Remove servicesCosts
     *
     * @param \justasr\HomeServicesBundle\Entity\ServiceCost $servicesCosts
     */
    public function removeServicesCost(\justasr\HomeServicesBundle\Entity\ServiceCost $servicesCosts)
    {
        $this->servicesCosts->removeElement($servicesCosts);
    }

    /**
     * Get servicesCosts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServicesCosts()
    {
        return $this->servicesCosts;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Service
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
