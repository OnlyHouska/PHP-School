<?php
include 'TimetableReader.php';

spl_autoload_register(function ($className) {
    require_once("$className.class.php");
});

$teachers = [
    'Št' => new Teacher('Karolína', 'Štěpánková', 'Št', 'Mgr.'),
    'Na' => new Teacher('Petra', 'Nádvorníková', 'Na', 'Mgr.'),
    'Dr' => new Teacher('Zdeněk', 'Drvota', 'Dr', 'Ing.'),
    'Po' => new Teacher('Blanka', 'Podracká', 'Po', 'Mgr.'),
    'Ps' => new Teacher('Tomáš', 'Pešek', 'Ps', 'Ing.'),
    'Bn' => new Teacher('Olga', 'Binarová', 'Bn', 'Mgr.'),
    'Kl' => new Teacher('Jan', 'Koupil', 'Kl', 'RNDr.', 'Ph.D.'),
    'Vo' => new Teacher('Gabriela', 'Votavová', 'Vo', 'Ing.'),
    'Bj' => new Teacher('Libor', 'Bajer', 'Bj', 'Ing.'),
    'Br' => new Teacher('Richard', 'Brun', 'Br', 'Mgr.'),
    'Hk' => new Teacher('Josef', 'Horálek', 'Hk', 'doc, Mgr.', 'Ph.D.'),
    'Va' => new Teacher("Daniel", "Václavík", "Va", "ak.mal."),
    'Ma' => new Teacher("Martin", "Malý", "Ma", "Ing."),
    'Pa' => new Teacher("Petra", "Pačesná", "Pa", "Mgr."),
  ];

$monday = new Day("Monday", "2024-14-10");
$tuesday = new Day("Tuesday", "2024-15-10");
$wednesday = new Day("Wednesday", "2024-16-10");
$thursday = new Day("Thursday", "2024-17-10");
$friday = new Day("Friday", "2024-18-10");

$monday->addLessons([
    new EmptyLesson(0),
    new Lesson("Matematika", "M", $teachers['Št'], 202, 1, "ALL", specialState::NONE),
    new Lesson("Anglický jazyk", "AJ", $teachers['Na'], 202, 2, "AJ2", specialState::NONE, [
//        new Lesson("Internetový marketing", "IM", $teachers['Bn'], 207, 2, "IM", specialState::NONE),
    ]),
    new Lesson("Počítačové systémy a sítě", "PS", $teachers['Dr'], 110, 3, "PS2", specialState::NONE, [
//        new Lesson("Internetový marketing", "IM", $teachers['Bn'], 207, 2, "IM", specialState::NONE),
    ]),
    new Lesson("Počítačové systémy a sítě", "PS", $teachers['Dr'], 110, 4, "PS2", specialState::NONE, [
//        new Lesson("Internetový marketing", "IM", $teachers['Bn'], 207, 2, "IM", specialState::NONE),
    ]),
    new Lesson("Matematika", "M", $teachers['Št'], 210, 5, "ALL", specialState::NONE),
    new Lesson("Český jazyk a literatura", "ČJ", $teachers['Po'], 210, 6, "ALL", specialState::NONE),
    new EmptyLesson(7),
    new Lesson("Digitální foto", "FOT", $teachers['Br'], 320, 8, "FOT2", specialState::NONE),
    new Lesson("Digitální foto", "FOT", $teachers['Br'], 320, 9, "FOT2", specialState::NONE),

]);
$tuesday->addLessons([
    new EmptyLesson(0),
    new Lesson("Cvičení z programování", "CPR", $teachers['Ps'], 208, 1, "CPR1", specialState::NONE, [
//        new Lesson("Cvičení z počítačové grafiky", "CPF", $teachers['Va'], 110, 1, "CPF", specialState::NONE),
//        new Lesson("Cvičení z programování", "CPR", $teachers['Ma'], 207, 1, "CPR2", specialState::NONE),
    ]),
    new Lesson("Cvičení z programování", "CPR", $teachers['Ps'], 208, 2, "CPR1", specialState::NONE, [
//        new Lesson("Cvičení z počítačové grafiky", "CPF", $teachers['Va'], 110, 2, "CPF", specialState::NONE),
//        new Lesson("Cvičení z programování", "CPR", $teachers['Ma'], 207, 2, "CPR2", specialState::NONE),
    ]),
    new Lesson("Cvičení z programování", "CPR", $teachers['Ps'], 208, 3, "CPR1", specialState::NONE, [
//        new Lesson("Cvičení z počítačové grafiky", "CPF", $teachers['Va'], 110, 3, "CPF", specialState::NONE),
//        new Lesson("Cvičení z programování", "CPR", $teachers['Ma'], 207, 3, "CPR2", specialState::NONE),
    ]),
    new Lesson("Ekonomika", "EK", $teachers['Bn'], 202, 4, "ALL", specialState::NONE),
    new Lesson("Anglický jazyk", "AJ", $teachers['Na'], 106, 5, "AJ2", specialState::NONE, [
//        new Lesson("Anglický jazyk", "AJ", $teachers['Pa'], 207, 5, "AJ1", specialState::NONE),
    ]),
    new Lesson("Český jazyk a literatura", "ČJ", $teachers['Po'], 210, 6, "ALL", specialState::NONE),
    new EmptyLesson(7),
    new EmptyLesson(8),
    new EmptyLesson(9),
]);
$wednesday->addLessons([
    new EmptyLesson(0),
    new Lesson("Fyzika", "FY", $teachers['Kl'], 210, 1, "ALL", specialState::NONE),
    new Lesson("Ekonomika", "EK", $teachers['Bn'], 202, 2, "ALL", specialState::NONE),
    new Lesson("Anglický jazyk", "AJ", $teachers['Na'], 208, 3, "AJ2", specialState::NONE, [
//        new Lesson("Anglický jazyk", "AJ", $teachers['Pa'], 207, 5, "AJ1", specialState::NONE),
    ]),
    new Lesson("Český jazyk a literatura", "ČJ", $teachers['Po'], 206, 4, "ALL", specialState::NONE),
    new EmptyLesson(5),
    new Lesson("Tělesná výchova", "TV", $teachers['Bn'], 0, 6, "ALL", specialState::NONE),
    new Lesson("Tělesná výchova", "TV", $teachers['Bn'], 0, 7, "ALL", specialState::NONE),
    new EmptyLesson(8),
    new EmptyLesson(9),
]);
$thursday->addLessons([
    new EmptyLesson(0),
    new Lesson("Matematika", "M", $teachers['Št'], 210, 1, "ALL", specialState::NONE),
    new Lesson("Výpočetní technika", "VT", $teachers['Vo'], 210, 2, "VT2", specialState::NONE, [
//        new Lesson("Počítačové systémy a sítě", "PS", $teachers['Dr'], 319, 2, "PS1", specialState::NONE),
    ]),
    new Lesson("Výpočetní technika", "VT", $teachers['Vo'], 210, 3, "VT2", specialState::NONE, [
//        new Lesson("Počítačové systémy a sítě", "PS", $teachers['Dr'], 319, 3, "PS1", specialState::NONE),
    ]),
    new Lesson("Počítačové systémy a sítě", "PS", $teachers['Dr'], 319, 4, "PS2", specialState::NONE, [
//        new Lesson("Anglický jazyk", "AJ", $teachers['Pa'], 207, 4, "AJ1", specialState::NONE),
    ]),
    new Lesson("WWW", "WWW3", $teachers['Bj'], 110, 5, "WWW", specialState::NONE, [
//        new Lesson("Výpočetní technika", "VT", $teachers['Vo'], 206, 5, "VT1", specialState::NONE),
    ]),
    new Lesson("WWW", "WWW3", $teachers['Bj'], 110, 6, "WWW", specialState::NONE, [
//        new Lesson("Výpočetní technika", "VT", $teachers['Vo'], 206, 6, "VT1", specialState::NONE),
    ]),
    new EmptyLesson(7),
    new Lesson("Digitální foto", "FOT", $teachers['Br'], 320, 8, "FOT1", specialState::NONE),
    new Lesson("Digitální foto", "FOT", $teachers['Br'], 320, 9, "FOT1", specialState::NONE),
]);
$friday->addLessons([
    new EmptyLesson(0),
    new Lesson("Algoritmizace a modelování", "ALM", $teachers['Hk'], 110, 1, "ALL", specialState::NONE, [
//        new Lesson("Anglický jazyk", "AJ", $teachers['Pa'], 206, 1, "AJ1", specialState::NONE),
    ]),
    new Lesson("Algoritmizace a modelování", "ALM", $teachers['Hk'], 110, 2, "ALL", specialState::NONE, [
//        new Lesson("Počítačové systémy a sítě", "PS", $teachers['Dr'], 319, 2, "PS1", specialState::NONE),
    ]),
    new Lesson("Fyzika", "FY", $teachers['Kl'], 210, 3, "AJ2", specialState::NONE),
    new Lesson("Matematika", "M", $teachers['Št'], 210, 4, "ALL", specialState::NONE),
    new Lesson("Anglický jazyk", "AJ", $teachers['Na'], 210, 5, "ALL", specialState::NONE, [
//        new Lesson("Digitální video", "VID", $teachers['Br'], 320, 5, "VID", specialState::NONE),
    ]),
    new Lesson("Základy internetového marketingu", "ZIM", $teachers['Bn'], 210, 6, "ALL", specialState::NONE, [
//        new Lesson("Digitální video", "VID", $teachers['Br'], 320, 6, "VID", specialState::NONE),
    ]),
    new EmptyLesson(7),
    new EmptyLesson(8),
    new EmptyLesson(9),
]);


$timetable = new Timetable([
    $monday,
    $tuesday,
    $wednesday,
    $thursday,
    $friday
]);

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style/app.css"/>
  <title>Rozvrh</title>
</head>
<body>
<form method="post" class="upload upload__wrapper">
  <div class="upload__wrapper-disable">
    <p class="upload__wrapper-disable-text">Not supported yet</p>
    <small>(and never will be)</small>
  </div>
  <label class="upload__heading" for="insertTimetableFile">Insert a file with timetable</label>
  <input disabled class="upload__input" type="file" accept="application/json" name="insertTimetableFile" id="insertTimetableFile">

  <input disabled class="upload__submit" type="submit" name="submitTimetableFile" value="Show"/>
</form>

<!--<form method="post" class="multigroup__form">-->
<!--  <label class="multigroup__label" for="showMultigroup">Show multi-group view</label>-->
<!--  <input class="multigroup__checkbox"  type="checkbox" name="showMultigroup" id="showMultigroup">-->
<!--</form>-->

<div class="timetable">
  <div class="timetable__schedule">
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">0</p>
      <p class="timetable__schedule-lesson-time">7:10 - 7:55</p>
    </div>
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">1</p>
      <p class="timetable__schedule-lesson-time">8:00 - 8:45</p>
    </div>
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">2</p>
      <p class="timetable__schedule-lesson-time">8:50 - 9:35</p>
    </div>
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">3</p>
      <p class="timetable__schedule-lesson-time">9:50 - 10:35</p>
    </div>
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">4</p>
      <p class="timetable__schedule-lesson-time">10:40 - 11:25</p>
    </div>
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">5</p>
      <p class="timetable__schedule-lesson-time">11:30 - 12:15</p>
    </div>
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">6</p>
      <p class="timetable__schedule-lesson-time">12:25 - 13:10</p>
    </div>
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">7</p>
      <p class="timetable__schedule-lesson-time">13:15 - 14:00</p>
    </div>
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">8</p>
      <p class="timetable__schedule-lesson-time">14:05 - 14:50</p>
    </div>
    <div class="timetable__schedule-lesson">
      <p class="timetable__schedule-lesson-index">9</p>
      <p class="timetable__schedule-lesson-time">14:55 - 15:40</p>
    </div>
  </div>
  <div class="timetable__week">
      <?php $colorCounterDay = 0 ?>
      <?php foreach ($timetable->getDays() as $day): ?>
          <?php if ($colorCounterDay === 2) $colorCounterDay = 0; ?>
        <div class="timetable__day day-color-<?= $colorCounterDay ?>">
            <?php $colorCounter = 0 ?>
            <?php foreach ($day->getLessons() as $lesson): ?>
                <?php if ($colorCounter > 1) $colorCounter = 0 ?>
                <?php if ($lesson instanceof EmptyLesson): ?>
                  <div
                      class="timetable__lesson empty-lesson lesson-<?= $lesson->getIndex() ?> lesson-color-<?= $colorCounter ?>">
                  </div>
                <?php else: ?>
                <?php
                    $groups = $lesson->getGroups();
                    $isMultiGroupView = isset($groups) ? 'multi-group-view' : '';
                    $groups[] = $lesson;?>


<!--                    --><?php //if ($isMultiGroupView): ?><!-- style="height: calc(100px + (50px * --><?php //= count($groups) - 1 ?><!--)) !important" --><?php //endif; ?>
                  <div class=" <?=$isMultiGroupView?>">
                  <?php foreach ($groups as $lesson): ?>
                    <div title="<?= $lesson->hasSpecialState() !== 'NONE' ? $lesson->hasSpecialState() : '' ?>"
                         class="timetable__lesson lesson-state-<?= strtolower($lesson->hasSpecialState(true)) ?> lesson-<?= $lesson->getIndex() ?> lesson-color-<?= $colorCounter ?>">
                      <div class="timetable__lesson-top">
                          <?php if ($lesson->getGroup() !== 'ALL'): ?>
                            <p class="timetable__lesson-group"><?= $lesson->getGroup() ?></p>
                          <?php else: ?>
                            <p class="timetable__lesson-group"></p>
                          <?php endif; ?>
                        <p class="timetable__lesson-room"><?= $lesson->getRoom() === 0 ? 'TV' : $lesson->getRoom() ?></p>
                      </div>
                      <div class="timetable__lesson-middle">
                        <h2 class="timetable__lesson-subject"><?= strtoupper($lesson->getShortcut()) ?></h2>
                        <p class="timetable__lesson-teacher"><?= ucfirst($lesson->getTeacher()->getShortcut()) ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  </div>
                <?php endif; ?>
                <?php $colorCounter += 1; ?>
            <?php endforeach; ?>
        </div>
          <?php $colorCounterDay += 1; ?>
      <?php endforeach; ?>
  </div>
</div>
</body>
