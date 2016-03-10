<?php


class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Deck $deck
     */
    private $deck;

    /**
     * @param string $name
     * @param Deck $deck
     */
    public function __construct(string $name, Deck $deck)
    {
        $this->name = $name;
        $this->deck = $deck;
    }

    /**
     * @param Dice $dice
     */
    public function roll(Dice $dice)
    {
        $matchingCard = $this->deck->getCardThatMatches($dice->roll());

        if($matchingCard) {
            $matchingCard->turn();
        }
    }

    /**
     * @return bool
     */
    public function isWinner()
    {
        return !$this->deck->isCardUnturned();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}