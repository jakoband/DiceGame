<?php


class DeckFactory
{
    /**
     * @var Color[]
     */
    private $colors;

    /**
     * @param Color[] $colors
     */
    public function __construct(array $colors)
    {
        $this->colors = $colors;
    }

    /**
     * @return Deck
     */
    public function createNewDeck()
    {
        $deck = new Deck();

        $colorIndexes = range(0, count($this->colors) - 1);
        shuffle($colorIndexes);
        array_pop($colorIndexes);

        foreach ($colorIndexes as $index) {
            $deck->addCard(new Card($this->colors[$index]));
        }

        return $deck;
    }
}