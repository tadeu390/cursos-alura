<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Email\Email;
use Alura\Calisthenics\Domain\Video\Video;
use DateTimeInterface;
use Alura\Calisthenics\Domain\Endereco\Endereco;

class Student
{
    private Email $email;
    private DateTimeInterface $birthDate;
    private WatchedVideos $watchedVideos;
    private FullName $fullName;
    private Endereco $endereco;

    public function __construct(Email $email, DateTimeInterface $birthDate, FullName $fullName, Endereco $endereco)
    {
        $this->watchedVideos = new WatchedVideos();
        $this->$email = $email;
        $this->birthDate = $birthDate;
        $this->fullName = $fullName;
        $this->endereco = $endereco;
    }

    public function fullName(): string
    {
        return $this->fullName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
        $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if ($this->watchedVideos->count() > 0) {
            return $this->firstVideoWasWatchedInMoreThan90Days();
        }

        return true;
    }

    public function firstVideoWasWatchedInMoreThan90Days()
    {
        $firstDate = $this->watchedVideos->dateOfFirstVideo();
        $today = new \DateTimeImmutable();

        return $firstDate->diff($today)->days < 90;
    }

    public function age() : int
    {
        $today = new \DateTimeImmutable();
        $dateInterval = $this->birthDate->diff($today);

        return $dateInterval->y;
    }
}
