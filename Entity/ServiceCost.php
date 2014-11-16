<?php

namespace justasr\HomeServicesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="service_cost")
 * @ORM\Entity
 */
class ServiceCost
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
     * @ORM\Column(type="decimal", scale=2)
     */
    private $cost;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Service", inversedBy="service_cost")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id",onDelete="CASCADE")
     */
    private $service;


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
     * Set cost
     *
     * @param string $cost
     * @return ServiceCost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set service
     *
     * @param \justasr\HomeServicesBundle\Entity\Service $service
     * @return ServiceCost
     */
    public function setService(\justasr\HomeServicesBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \justasr\HomeServicesBundle\Entity\Service 
     */
    public function getService()
    {
        return $this->service;
    }



    /**
     * Set date
     *
     * @param \DateTime $date
     * @return ServiceCost
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
