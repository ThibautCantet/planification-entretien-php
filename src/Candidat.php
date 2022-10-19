<?php

namespace Kata;

class Candidat
{
    private string $techno;
    private string $email;
    private int $xp;

    /**
     * @param string $techno
     * @param string $email
     * @param int $xp
     */
    public function __construct(string $techno, string $email, int $xp)
    {
        $this->techno = $techno;
        $this->email = $email;
        $this->xp = $xp;
    }

    public function getTechno(): string
    {
        return $this->techno;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getXp(): int
    {
        return $this->xp;
    }
}