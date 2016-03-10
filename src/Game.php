<?php


class Game
{
    /**
     * @var Dice
     */
    private $dice;

    /**
     * @var Player[]
     */
    private $players;

    /**
     * @param Dice $dice
     * @param Player[] $players
     *
     * @throws InvalidArgumentException
     */
    public function __construct(Dice $dice, array $players)
    {
        if (count($players) < 2) {
            throw new InvalidArgumentException('At least two players required');
        }

        $this->dice = $dice;
        $this->players = $players;
    }

    /**
     * @param DeckFactory $deckFactory
     */
    public function dealCards(DeckFactory $deckFactory)
    {
        foreach($this->players as $player)
        {
            $player->setDeck($deckFactory->createNewDeck());
        }
    }

    /**
     * @return string
     */
    public function getWinner()
    {
        $numberOfPlayers = count($this->players);
        $index = 0;

        while (true) {
            $currentPlayer = $this->players[$index % $numberOfPlayers];
            $currentPlayer->roll($this->dice);

            if ($currentPlayer->getDeck()->areAllCardsTurned()) {
                return $currentPlayer->getName();
            }
            $index++;
        }
    }
}