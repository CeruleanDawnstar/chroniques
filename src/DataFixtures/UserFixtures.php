<?php

namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        // $product = new Product();
        // $manager->persist($product);

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'the_new_password'
        ));
        $user->setEmail('test@test.fr');
        $manager->persist($user);

        $manager->flush();


    }

}
