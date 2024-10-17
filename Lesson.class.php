<?php
enum specialState {
    case NONE;
    case SUBSTITUTE;
    case CANCELED;
    case MOVED;
}

class Lesson
{

    private string $subject;
    private string $shortcut;
    private Teacher $teacher;
    private int $room;
    private int $lessonIndex;
    private string $group;
    private specialState $specialState;
    private array $groups;


    public function __construct(string $subject, string $shortcut, Teacher $teacher, int $room, int $lessonIndex, string $group, specialState $specialState, array $groups = null)
    {
        $this->subject = $subject;
        $this->shortcut = $shortcut;
        $this->teacher = $teacher;
        $this->room = $room;
        $this->lessonIndex = $lessonIndex;
        $this->group = $group;
        $this->specialState = $specialState;
        if (isset($groups)) {
            $this->groups = $groups;
        }
    }

    public function changeState($specialState): void
    {
        $this->specialState = $specialState;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }

    public function getRoom(): int
    {
        return $this->room;
    }

    public function getIndex(): int
    {
        return $this->lessonIndex;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function getShortcut(): string {
        return $this->shortcut;
    }

    public function getGroups(): array|null {
        if (!isset($this->groups)) {
            return null;
        }

        return $this->groups;
    }

    public function getOtherGroup(int $index): Lesson|null {
        if (!isset($this->groups)) {
            return null;
        }

        return $this->groups[$index];
    }

    public function hasSpecialState(bool $class = false): string|bool {
        switch ($this->specialState) {
            case SpecialState::NONE:
                return 'NONE';
            case SpecialState::SUBSTITUTE:
                return 'SUBSTITUTE' . ($class ? ' lesson-special-state' : '');
            case SpecialState::CANCELED:
                return 'CANCELED' . ($class ? ' lesson-special-state' : '');
            case SpecialState::MOVED:
                return 'MOVED' . ($class ? ' lesson-special-state' : '');
            default:
                return false;
        }
    }
}