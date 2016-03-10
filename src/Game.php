<?php


class Game
{
    /**
     * @var Deck
     */
    private $deck;

    /**
     * @var Dice
     */
    private $dice;

    /**
     * @var array
     */
    private $players;

    /**
     * @param Deck $deck
     * @param Dice $dice
     * @param array $players
     *
     * @throws InvalidArgumentException
     */
    public function __construct(Deck $deck, Dice $dice, array $players)
    {
        if (count($players) < 2) {
            throw new InvalidArgumentException('At least two players required');
        }

        $this->deck = $deck;
        $this->dice = $dice;
        $this->players = $players;
    }

    public function start()
    {
        $this->concatenatePlayerCircle();
        $this->players[0]->play($this->deck, $this->dice);
    }

    private function concatenatePlayerCircle()
    {
        foreach ($this->players as $index => $player) {
            $player->setNextPlayer($this->players[($index + 1) % count($this->players)]);
        }
    }
}