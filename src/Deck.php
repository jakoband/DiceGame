<?php


class Deck
{
    /**
     * @var Card[]
     */
    private $cards = [];

    /**
     * @param $cards
     */
    public function __construct($cards)
    {
        $this->cards = $cards;
    }

    /**
     * @param Color $color
     * @return Card|null
     */
    public function getCardThatMatches(Color $color)
    {
        foreach ($this->cards as $card) {
            if ((string) $card->getColor() === (string) $color) {
                return $card;
            }
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isCardUnturned()
    {
        foreach($this->cards as $card) {
            if (!$card->isTurned()) {
                return true;
            }
        }

        return false;
    }
}