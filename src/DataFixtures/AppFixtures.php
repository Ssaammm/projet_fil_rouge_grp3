<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Status;
use App\Entity\Task;
use App\Entity\User;

use Doctrine\Persistence\ObjectManager;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * Blab bla bla
     * 
     * @var UserPasswordEncoreInterface
     */
    private $encoder;
    // appel de la methode UserPasswordEncoderInterface

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');

        
            for ($i = 0; $i < 10; $i++) {
                $user = new User();

                $hash=$this->encoder->encodePassword($user, "password");

                $user
                ->setPrenom($faker->lastName)
                   ->setNom($faker->firstName)
                   ->setEmail($faker->email)
                   ->setPassword($hash)
                   ->setRoles($faker->randomElement([["ROLE_APPRENTI"],["ROLE_EXPERT"],["ROLE_SENIOR"]]));
     
                    $manager->persist($user);
                }

        $manager->flush();

        $status1 = new Status();

            $status1
            ->setEtat("NON ALLOUER");

            $status2 = new Status();

            $status2
            ->setEtat("ALLOUER");

            $status3 = new Status();

            $status3
            ->setEtat("TERMINEE");


        for ($i = 0; $i < 15; $i++) {
            $client = new Client();
            $task = new Task();

            $task
            ->setType($faker->randomElement(['GROSSE','PETITE','MOYENNE']))
            ->setDescription($faker->text())
            ->setClient($client)
            ->setStatus($status1);

            $task2 = new Task();
            $task2
            ->setType($faker->randomElement(['GROSSE','PETITE','MOYENNE']))
            ->setDescription($faker->text())
            ->setClient($client)
            ->setStatus($status1);
            
            $client
            ->setPrenom($faker->lastName)
               ->setNom($faker->firstName)
               ->addTask($task,$task2)
               ->setAdresse("4 rue du test");

            $manager->persist($client);
            $manager->persist($task);
            $manager->persist($task2);
            $manager->persist($status1);
            $manager->persist($status2);
            $manager->persist($status3);
            }

    $manager->flush();

   
    }
}
