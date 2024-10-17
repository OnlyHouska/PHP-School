<?php

class Timetable
{
    private array $days = [];

    function __construct(array $days)
    {
        $this->days = $days;
    }

    public function addDay(Day $day): void
    {
        $this->days[] = $day;
    }

    public function getDay(int $index): Day
    {
        return $this->days[$index];
    }

    public function getDays(): array
    {
        return $this->days;
    }
}