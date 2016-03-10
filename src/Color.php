<?php


class Color
{
    /**
     * @var string
     */
    private $color;

    /**
     * @param string $color
     */
    public function __construct(string $color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->color;
    }
}