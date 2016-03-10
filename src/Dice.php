<?php


class Dice
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
        if (count($colors) !== 6) {
            throw new InvalidArgumentException('Exactly six colors expected');
        }

        $this->colors = $colors;
    }

    /**
     * @return Color
     */
    public function roll()
    {
        return $this->colors[array_rand($this->colors, 1)];
    }
}