<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Kata\Candidat;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When /^un candidat "([^"]*)" \("([^"]*)"\) avec (\d+) ans d’expériences qui est disponible "([^"]*)" à "([^"]*)"$/
     */
    public function unCandidatAvecAnsDExpériencesQuiEstDisponibleÀ($techno, $email, $xp, $date, $time)
    {
        throw new PendingException();
    }

    /**
     * @When /^un recruteur "([^"]*)" \("([^"]*)"\) qui a (\d+) ans d’XP qui est disponible "([^"]*)" à "([^"]*)"$/
     */
    public function unRecruteurQuiAAnsDXP($techno, $email, $xp, $date, $time)
    {
        throw new PendingException();
    }

    /**
     * @When /^on tente une planification d’entretien$/
     */
    public function onTenteUnePlanificationDEntretien()
    {
        throw new PendingException();
    }

    /**
     * @When /^L’entretien est planifié$/
     */
    public function lEntretienEstPlanifié()
    {
        throw new PendingException();
    }

    /**
     * @When /^un mail de confirmation est envoyé au candidat et au recruteur$/
     */
    public function unMailDeConfirmationEstEnvoyéAuCandidatEtAuRecruteur()
    {
        throw new PendingException();
    }

}
