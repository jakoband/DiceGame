<?php


class Game
{
    /**
     * @var Dice
     */
    private $dice;

    /**
     * @var Player[]
     */
    private $players;

    /**
     * @param Dice $dice
     * @param Player[] $players
     */
    public function __construct(Dice $dice, array $players)
    {
        $this->dice = $dice;
        $this->players = $players;
    }

    public function play()
    {
        $nobodyWon = true;
        while($nobodyWon) {
            foreach ($this->players as $player) {
                $player->roll($this->dice);

                if ($player->isWinner()) {
                    $nobodyWon = false;
                    echo $player->getName();
                    break;
                }
            }
        }
    }
}