<?php


class Deck
{
    /**
     * @var Card[]
     */
    private $cards = [];

    /**
     * @param Card $card
     */
    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    /**
     * @param Color $color
     */
    public function turnCardsForColor(Color $color)
    {
        foreach ($this->cards as $card) {
            if ((string) $card->getColor() === (string) $color) {
                $card->turn();
                return;
            }
        }
    }

    /**
     * @return bool
     */
    public function areAllCardsTurned()
    {
        foreach($this->cards as $card) {
            if (!$card->isTurned()) {
                return false;
            }
        }

        return true;
    }
}