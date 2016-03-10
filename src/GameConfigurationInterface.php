<?php


interface GameConfigurationInterface
{
    /**
     * @return string[]
     */
    public function getColorNames();

    /**
     * @return string[]
     */
    public function getPlayerNames();
}