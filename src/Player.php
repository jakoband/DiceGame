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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Deck
     */
    public function getDeck()
    {
        return $this->deck;
    }

    /**
     * @param Color $color
     */
    public function turnCardWithColor(Color $color)
    {
        foreach ($this->deck->getCards() as $card) {
            if ((string) $card->getColor() === (string) $color) {
                $card->turn();

                return;
            }
        }
    }

}