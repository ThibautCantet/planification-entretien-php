<?php

namespace Kata;

class EntretienService
{

    private EntretienRepository $entretienRepository;
    private EmailService $emailService;

    public function __construct(EntretienRepository $entretienRepository, EmailService $emailService)
    {
        $this->entretienRepository = $entretienRepository;
        $this->emailService = $emailService;
    }


    public function planifier(Candidat $candidat, $disponibiliteCandidat, Recruteur $recruteur, $disponibiliteRecruteur)
    {
        return false;
    }
}