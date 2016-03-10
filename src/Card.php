<?php


class Card
{
    /**
     * @var Color
     */
    private $color;

    /**
     * @var bool
     */
    private $isTurned = false;

    /**
     * @param Color $color
     */
    public function __construct($color)
    {
        $this->color = $color;
    }

    /**
     * @return Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return bool
     */
    public function isTurned()
    {
        return $this->isTurned;
    }

    public function turn(){
        $this->isTurned = true;
    }
}