<?php


class GameFactory
{
    /**
     * @var Color[]
     */
    private $colors;

    /**
     * @param array $colorNames
     * @internal param Color[] $colors
     */
    public function __construct(array $colorNames)
    {
        if (count($colorNames) > 6) {
            throw new InvalidArgumentException('Maximum of 6 colors allowed');
        }

        $this->colors = $this->createColors($colorNames); // better way?
    }

    /**
     * @param $colorNames
     * @return Color[]
     */
    private function createColors($colorNames)
    {
        $colors = [];
        foreach ($colorNames as $colorName) {
            $colors[] = new Color($colorName);
        }
        return $colors;
    }

    /**
     * @return Dice
     */
    public function createDice()
    {
        return new Dice($this->colors);
    }

    /**
     * @param string[] $playerNames
     * @return Player[]
     */
    public function createPlayers(array $playerNames)
    {
        if (count($playerNames) < 2) {
            throw new InvalidArgumentException('At least two players required');
        }
        // player name as value object for validation?

        $players = [];
        foreach ($playerNames as $playerName) {
            $players[] = new Player($playerName, $this->createDeck());
        }

        return $players;
    }


    /**
     * @return Deck
     */
    private function createDeck()
    {
        $colorIndexes = array_rand($this->colors, count($this->colors) - 1);
        $cards = [];

        foreach ($colorIndexes as $index) {
            $cards[] = new Card($this->colors[$index]);
        }

        return new Deck($cards);
    }
}