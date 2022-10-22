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
        if ($disponibiliteCandidat != $disponibiliteRecruteur) {
            return false;
        }
        $this->entretienRepository->save(new Entretien($candidat->getEmail(), $recruteur->getEmail(), $disponibiliteRecruteur));

        $this->emailService->sendToRecruteur($recruteur->getEmail());
        $this->emailService->sendToCandidat($candidat->getEmail());
        return true;
    }
}