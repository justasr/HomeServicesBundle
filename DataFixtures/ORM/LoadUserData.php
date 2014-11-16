<?php

namespace justasr\HomeServicesBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use justasr\HomeServicesBundle\Entity\User;



class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $user = new User();
        $user->setUsername('user');
        $user->setIsActive(true);
        $user->setEmail("example@example.com");

        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);

        $password = $encoder->encodePassword('password', $user->getSalt());
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
        $this->addReference('user', $user);

        $user = null;
        $user = new User();
        $user->setUsername('username1');
        $user->setIsActive(true);
        $user->setEmail("example1@example.com");

        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);

        $password = $encoder->encodePassword('password', $user->getSalt());
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
        $this->addReference('user1', $user);

        $user = null;
        $user = new User();
        $user->setUsername('username2');
        $user->setIsActive(true);
        $user->setEmail("example2@example.com");

        $factory = $this->container->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);

        $password = $encoder->encodePassword('password', $user->getSalt());
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
        $this->addReference('user2', $user);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}