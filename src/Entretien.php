<?php

namespace Kata;

use DateTime;

class Entretien
{

    private string $emailCandidat;
    private string $emailRecruteur;
    private DateTime $horaire;

    public function __construct(string $emailCandidat, string $emailRecruteur, $horaire)
    {
        $this->emailCandidat = $emailCandidat;
        $this->emailRecruteur = $emailRecruteur;
        $this->horaire = $horaire;
    }

    public function getEmailCandidat(): string
    {
        return $this->emailCandidat;
    }

    public function getEmailRecruteur(): string
    {
        return $this->emailRecruteur;
    }

    public function getHoraire(): DateTime
    {
        return $this->horaire;
    }


}