<?php

namespace justasr\HomeServicesBundle\DataFixtures\ORM;

use justasr\HomeServicesBundle\Entity\Service;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use justasr\HomeServicesBundle\Entity\User;



class LoadServicesData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        for( $i=0; $i < 3; $i++ ) {
            $Service = new Service();
            $Service->setUser($this->getReference('user'));
            $Service->setName( "Service".$i );
            $manager->persist( $Service );
            $manager->flush();

            $this->addReference( 'UserService'.$i, $Service);
        }

        for( $i=0; $i < 3; $i++ ) {
            $Service = new Service();
            $Service->setUser($this->getReference('user1'));
            $Service->setName( "Service".$i );
            $manager->persist( $Service );
            $manager->flush();
            $this->addReference( 'User1Service'.$i, $Service);
        }

        for( $i=0; $i < 3; $i++ ) {
            $Service = new Service();
            $Service->setUser($this->getReference('user2'));
            $Service->setName( "Service".$i );
            $manager->persist( $Service );
            $manager->flush();
            $this->addReference( 'User2Service'.$i, $Service);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}