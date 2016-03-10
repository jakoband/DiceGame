<?php


class Dice
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
     * @return Color
     */
    public function roll()
    {
        return $this->colors[array_rand($this->colors, 1)];
    }
}