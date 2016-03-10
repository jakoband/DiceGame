<?php


class Deck
{
    /**
     * @var Card[]
     */
    private $cards = [];

    /**
     * @param Card[] $cards
     */
    public function __construct(array $cards)
    {
        $this->cards = $cards;
    }

    /**
     * @return bool
     */
    public function hasUnturned()
    {
        foreach($this->cards as $card) {
            if (!$card->isTurned()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return Card[]
     */
    public function getCards()
    {
        return $this->cards;
    }
}