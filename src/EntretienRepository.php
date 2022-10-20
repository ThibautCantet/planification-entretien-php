<?php

namespace Kata;

class EntretienRepository
{
    protected array $repo = array();

    function save(Entretien $entretien): void
    {
        array_push($this->repo, $entretien);
    }

    function findAll(): array
    {
        return $this->repo;
    }
}