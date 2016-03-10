<?php


class Deck
{
    /**
     * @var array
     */
    private $colors;

    /**
     * @param array $colors
     */
    public function __construct(array $colors)
    {
        $this->colors = $colors;
    }

    /**
     * @return array
     */
    public function createSetOfCards(){

        $colorIndexes = range(0, count($this->colors) - 1);
        shuffle($colorIndexes);
        array_pop($colorIndexes);

        $set = [];
        foreach ($colorIndexes as $index) {
            $set[] = new Card($this->colors[$index]);
        }

        return $set;
    }
}