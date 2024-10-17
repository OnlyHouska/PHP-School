w<?php

class Day
{
    private string $name;
    private string $date;
    private array $lessons = [];

    public function __construct(string $name, string $date)
    {
        $this->name = $name;
        $this->date = $date;
    }

    public function addLesson(Lesson $lesson): void
    {
        $this->lessons[] = $lesson;
    }

    public function addLessons(array $lesson): void {
        $this->lessons = array_merge($this->lessons, $lesson);
    }

    public function getLessons(): array
    {
        return $this->lessons;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
