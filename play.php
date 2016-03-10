<?php

require __DIR__ . '/src/autoload.php';

$players = [
    new Player('Alice'),
    new Player('Bob'),
    new Player('Carol'),
];

$colors = [
    new Color('red'),
    new Color('blue'),
    new Color('yellow'),
    new Color('green'),
    new Color('pink'),
    new Color('brown'),
];

$deckFactory = new DeckFactory($colors);
$dice = new Dice($colors);
$game = new Game($dice, $players);

$game->dealCards($deckFactory);

echo $game->getWinner();
echo PHP_EOL;

