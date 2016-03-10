<?php


class Game
{
    /**
     * @var Dice
     */
    private $dice;

    /**
     * @var PlayerCollection
     */
    private $playerCollection;

    /**
     * @param Dice $dice
     * @param PlayerCollection $playerCollection
     */
    public function __construct(Dice $dice, PlayerCollection $playerCollection)
    {
        $this->dice = $dice;
        $this->playerCollection = $playerCollection;
    }

    /**
     * @throws Exception
     */
    public function play()
    {
        while(true) {
            $currentPlayer = $this->playerCollection->getNextPlayer();
            $colorRolledDice = $this->dice->roll();

            if ($this->hasPlayerCardWithColor($currentPlayer, $colorRolledDice)) {
                $currentPlayer->turnCardWithColor($colorRolledDice);

                if ($this->isPlayerWinner($currentPlayer)) {
                    echo $currentPlayer->getName();
                    break;
                }
            }
        }
    }

    /**
     * @param Player $player
     * @param Color $color
     * @return bool
     */
    private function hasPlayerCardWithColor(Player $player, Color $color)
    {
        foreach ($player->getDeck()->getCards() as $card) {
            if ((string) $card->getColor() === (string) $color) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isPlayerWinner(Player $player)
    {
        return !$player->getDeck()->hasUnturned();
    }
}