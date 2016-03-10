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
     * @param Color $color
     * @return bool
     */
    public function isSameColorAs(Color $color)
    {
        return $this->color === $color->color;
    }
}