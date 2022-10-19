<?php

use Behat\Behat\Context\Context;
use Kata\Candidat;
use Kata\EmailService;
use Kata\Entretien;
use Kata\EntretienRepository;
use Kata\EntretienService;
use Kata\Recruteur;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private Candidat $candidat;
    private $disponibiliteCandidat;
    private Recruteur $recruteur;
    private $disponibiliteRecruteur;
    private bool $resultatPlanification;


    private EntretienRepository $entretienRepository;
    private EmailService $emailService;

    private EntretienService $entretienService;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->entretienRepository = \Mockery::spy(new EntretienRepository());
        $this->emailService = \Mockery::spy(new EmailService());
        $this->entretienService = new EntretienService($this->entretienRepository, $this->emailService);
    }

    /**
     * @When /^un candidat "([^"]*)" \("([^"]*)"\) avec (\d+) ans d’expériences qui est disponible "([^"]*)" à "([^"]*)"$/
     */
    public function unCandidatAvecAnsDExpériencesQuiEstDisponibleÀ($techno, $email, $xp, $date, $time)
    {
        $datetime = $date . " " . $time;
        $this->disponibiliteCandidat = DateTime::createFromFormat("d/m/Y H:i", $datetime);
        $this->candidat = new Candidat($techno, $email, $xp);
    }

    /**
     * @When /^un recruteur "([^"]*)" \("([^"]*)"\) qui a (\d+) ans d’XP qui est disponible "([^"]*)" à "([^"]*)"$/
     */
    public function unRecruteurQuiAAnsDXP($techno, $email, $xp, $date, $time)
    {
        $datetime = $date . " " . $time;
        $this->disponibiliteRecruteur = DateTime::createFromFormat("d/m/Y H:i", $datetime);
        $this->recruteur = new Recruteur($techno, $email, $xp);
    }

    /**
     * @When /^on tente une planification d’entretien$/
     */
    public function onTenteUnePlanificationDEntretien()
    {
        $this->resultatPlanification = $this->entretienService->planifier($this->candidat, $this->disponibiliteCandidat, $this->recruteur, $this->disponibiliteRecruteur);
    }

    /**
     * @When /^L’entretien est planifié$/
     */
    public function lEntretienEstPlanifié()
    {
        $this->entretienRepository->shouldHaveReceived('save');
            //->with(new Entretien( $this->candidat->getEmail(), $this->recruteur->getEmail(), $this->disponibiliteCandidat));
            //->once();
        $all = $this->entretienRepository->findAll();
        assertEquals(1, count($all));
        assertEquals($all[0]->getEmailCandidat(), "candidat@email.com");
        assertEquals($all[0]->getEmailRecruteur(), "recruteur@soat.fr");
        assertEquals($all[0]->getHoraire(), $this->disponibiliteCandidat);

        assertTrue($this->resultatPlanification);
    }

    /**
     * @When /^un mail de confirmation est envoyé au candidat et au recruteur$/
     */
    public function unMailDeConfirmationEstEnvoyéAuCandidatEtAuRecruteur()
    {
        $this->emailService->shouldhaveReceived('sendToCandidat')
            ->with("candidat@email.com")->once();
        $this->emailService->shouldhaveReceived('sendToRecruteur')
            ->with("recruteur@soat.fr")->once();
    }

}
