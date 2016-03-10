<?php


class GameFactory
{
    /**
     * @var Color[]
     */
    private $colors = array();

    /**
     * @param GameConfigurationInterface $gameConfiguration
     */
    public function __construct(GameConfigurationInterface $gameConfiguration)
    {
        if (count($gameConfiguration->getPlayerNames()) < 2) {
            throw new InvalidArgumentException('At least two players required');
        }

        if (count($gameConfiguration->getColorNames()) > 6) {
            throw new InvalidArgumentException('Maximum of 6 colors allowed');
        }

        $this->gameConfiguration = $gameConfiguration;
    }

    /**
     * @return Color[]
     */
    private function createColors()
    {
        if (count($this->colors) === 0) {
            foreach ($this->gameConfiguration->getColorNames() as $colorName) {
                $this->colors[] = new Color($colorName);
            }
        }

        return $this->colors;
    }


    /**
     * @return Dice
     */
    public function createDice()
    {
        return new Dice($this->createColors());
    }

    /**
     * @return PlayerCollection
     */
    public function createPlayerCollection()
    {
        $playerCollection = new PlayerCollection();
        foreach ($this->gameConfiguration->getPlayerNames() as $playerName) {
            $playerCollection->addPlayer(new Player($playerName, $this->createDeck()));
        }
        return $playerCollection;
    }

    /**
     * @return Deck
     */
    private function createDeck()
    {
        $colorIndexes = array_rand($this->createColors(), count($this->colors) - 1);
        $cards = [];

        foreach ($colorIndexes as $index) {
            $cards[] = new Card($this->colors[$index]);
        }

        return new Deck($cards);
    }
}