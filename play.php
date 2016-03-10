<?php

require __DIR__ . '/src/autoload.php';



$colorNames = ['red', 'blue', 'yellow', 'green', 'pink', 'brown'];
$playerNames = ['Alice', 'Carol', 'Bob'];

$gameFactory = new GameFactory($colorNames);

$players = $gameFactory->createPlayers($playerNames);
$dice = $gameFactory->createDice();

$game = new Game($dice, $players);
$game->play();

