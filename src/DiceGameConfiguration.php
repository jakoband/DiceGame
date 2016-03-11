<?php


class DiceGameConfiguration implements GameConfigurationInterface
{
    /**
     * @var string[]
     */
    private $playerNames;

    /**
     * @var string[]
     */
    private $colorNames;

    /**
     * @param string[] $playerNames
     * @param string[] $colorNames
     */
    public function __construct(array $playerNames, array $colorNames)
    {
        $this->playerNames = $playerNames;
        $this->colorNames = $colorNames;
    }

    /**
     * @return string[]
     */
    public function getColorNames()
    {
        return $this->colorNames;
    }

    /**
     * @return string[]
     */
    public function getPlayerNames()
    {
        return $this->playerNames;
    }
}