<?php

require 'autoload.php';

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

$dice = new Dice($colors);
$deck = new Deck($colors);
$game = new Game($deck, $dice, $players);

$game->start();

