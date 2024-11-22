<?php

namespace App\DataFixtures;

use App\Entity\Students;
use App\Entity\Teachers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $level = ['M1', 'L3'];
        $sexe = ['M', 'F'];
        $grade = ['Docteur', 'Professeur', 'Docteur HDR'];

        $faker = Factory::create('fr_FR');

        // Generate 25 students
        for ($i = 0; $i < 25; $i++) {
            $student = new Students();

            $student->setRegisterNumber($faker->numberBetween(200,300));
            $student->setFirstname($faker->firstName());
            $student->setLastname($faker->lastName());
            $student->setLevel($level[array_rand($level)]);
            $student->setSexe($sexe[array_rand($sexe)]);

            $manager->persist($student);
        }

        // Generate 25 teachers
        for ($i = 0; $i < 25; $i++) {
            $teacher = new Teachers();

            $teacher->setFirstname($faker->firstName());
            $teacher->setLastname($faker->lastName());
            $teacher->setSexe($sexe[array_rand($sexe)]);
            $teacher->setGrade($grade[array_rand($grade)]);

            $manager->persist($teacher);
        }

        $manager->flush();
    }
}
