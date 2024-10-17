<?php

class Teacher
{
    private string $prefix;
    private string $suffix;
    private string $firstName;
    private string $lastName;
    private string $shortcut;

    function __construct(string $firstName, string $lastName, string $shortcut, string $prefix = "", string $suffix = "")
    {
        $this->title = $prefix;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->shortcut = $shortcut;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getShortcut(): string
    {
        return $this->shortcut;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getSuffix(): string
    {
        return $this->suffix;
    }

    public function getFullName(): string {
        return $this->prefix . ' ' . $this->firstName . ' ' . $this->lastName . ' ' . $this->suffix;
    }
}