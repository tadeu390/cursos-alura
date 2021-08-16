<?php

namespace Alura\Calisthenics\Domain\Student;

class FullName
{
    private string $firstName;
    private string $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return "{$this->firstName} {$this->lastName}";
    }
}
