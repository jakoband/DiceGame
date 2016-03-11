<?php

require __DIR__ . '/src/autoload.php';

$colorNames = ['red', 'blue', 'yellow', 'green', 'pink', 'brown'];
$playerNames = ['Alice', 'Carol', 'Bob'];

$diceGameConfiguration = new DiceGameConfiguration($playerNames, $colorNames);

$gameFactory = new GameFactory($diceGameConfiguration);

$playerCollection = $gameFactory->createPlayerCollection();
$dice = $gameFactory->createDice();

$game = new Game($dice, $playerCollection);
$game->play();

