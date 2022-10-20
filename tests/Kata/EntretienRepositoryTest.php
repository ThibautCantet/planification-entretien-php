<?php

namespace Kata;

use DateTime;
use PHPUnit\Framework\TestCase;

class EntretienRepositoryTest extends TestCase
{
    public function test_save_should_add_entretien()
    {
        $entretienRepository = new TestEntretienRepository();
        $entretien = new Entretien("candidat@email.com", "recruteur@soat.fr", new DateTime("2022/10/25 15:00"));

        $entretienRepository->save($entretien);

        $this->assertContains($entretien, $entretienRepository->getRepo());
    }

    public function test_findAll_should_return_all_entretiens()
    {
        $array = array();
        $entretien1 = new Entretien("candidat1@email.com", "recruteur@soat.fr", new DateTime("2022/10/25 15:00"));
        $entretien2 = new Entretien("candidat2@email.com", "recruteur@soat.fr", new DateTime("2022/10/25 15:00"));
        array_push($array, $entretien1);
        array_push($array, $entretien2);

        $entretienRepository = new TestEntretienRepository();
        $entretienRepository->setRepo($array);

        $all = $entretienRepository->findAll();

        $this->assertContains($entretien1, $all);
        $this->assertContains($entretien2, $all);
    }

}

class TestEntretienRepository extends EntretienRepository
{
    public function getRepo(): array
    {
        return $this->repo;
    }

    public function setRepo($array): void
    {
        $this->repo = $array;
    }
}