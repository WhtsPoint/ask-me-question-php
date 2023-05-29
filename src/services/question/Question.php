<?php

namespace Question;

use Email;
use Id;

class Question {
    private Message $message;
    private bool $isAnonymous;
    private ?Name $name;
    private ?Email $mail;
    private int $creationTime;
    private Id $id;

    public function setMessage(Message $value): void {
        $this->message = $value;
    }

    public function setIsAnonymous(?bool $value): void {
        $this->isAnonymous = $value;
    }

    public function setName(?Name $value): void {
        $this->name = $value;
    }

    public function setMail(?Email $value): void {
        $this->mail = $value;
    }

    public function setCreationTime(int $value): void {
        $this->creationTime = $value;
    }

    public function setId(Id $value): void {
        $this->id = $value;
    }

    public function getMessage(): Message {
        return $this->message;
    }

    public function getIsAnonymous(): bool {
        return $this->isAnonymous;
    }

    public function getName(): ?Name {
        return $this->name;
    }

    public function getMail(): ?Email {
        return $this->mail;
    } 

    public function getCreationTime(): int {
        return $this->creationTime;
    }

    public function getId(): Id {
        return $this->id;
    }
}