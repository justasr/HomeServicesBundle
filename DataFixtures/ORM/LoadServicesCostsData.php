<?php

namespace justasr\HomeServicesBundle\DataFixtures\ORM;

use justasr\HomeServicesBundle\Entity\ServiceCost;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use justasr\HomeServicesBundle\Entity\User;



class LoadServicesCostsData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for( $i=1; $i < 12; $i++ ) {
            $d = new \DateTime($i . '/01/2013');

            for( $j=0; $j < 3; $j++ ) {
                $ServiceCost = new ServiceCost();
                $ServiceCost->setService( $this->getReference("UserService".$j) );
                $ServiceCost->setDate( $d );
                $cost = rand(10,100);
                $ServiceCost->setCost($cost);

                $manager->persist($ServiceCost);
                $manager->flush();
            }

        }

        for( $i=1; $i < 12; $i++ ) {
            $d = new \DateTime($i . '/01/2013');

            for( $j=0; $j < 3; $j++ ) {
                $ServiceCost = new ServiceCost();
                $ServiceCost->setService( $this->getReference("User1Service".$j) );
                $ServiceCost->setDate( $d );
                $cost = rand(10,100);
                $ServiceCost->setCost($cost);

                $manager->persist($ServiceCost);
                $manager->flush();
            }
        }

        for( $i=1; $i < 12; $i++ ) {
            $d = new \DateTime($i . '/01/2013');

            for( $j=0; $j < 3; $j++ ) {
                $ServiceCost = new ServiceCost();
                $ServiceCost->setService( $this->getReference("User2Service".$j) );
                $ServiceCost->setDate( $d );
                $cost = rand(10,100);
                $ServiceCost->setCost($cost);

                $manager->persist($ServiceCost);
                $manager->flush();
            }
        }

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}