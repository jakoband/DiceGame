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
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param Deck $deck
     */
    public function setDeck(Deck $deck)
    {
        $this->deck = $deck;
    }

    public function getDeck()
    {
        return $this->deck;
    }

    public function roll(Dice $dice)
    {
        $this->deck->turnCardsForColor($dice->roll());
    }

    public function getName()
    {
        return $this->name;
    }
}