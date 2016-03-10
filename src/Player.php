<?php


class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Card
     */
    private $cards;

    /**
     * @var Player
     */
    private $nextPlayer;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return Player
     * @throws Exception
     */
    public function getNextPlayer(): Player
    {
        if (!$this->nextPlayer) {
            throw new \Exception('Player must have a next player');
        }

        return $this->nextPlayer;
    }
    /**
     * @param Player $player
     */
    public function setNextPlayer(Player $player)
    {
        $this->nextPlayer = $player;
    }

    /**
     * @param Deck $deck
     * @param Dice $dice
     */
    public function play(Deck $deck, Dice $dice)
    {
        if (!$this->hasCards()) {
            $this->takeCards($deck);
        }
        $this->playTurn($deck, $dice);
    }

    private function hasCards ()
    {
        return count($this->cards) > 0;
    }

    /**
     * @param Deck $deck
     * @param Dice $dice
     * @throws Exception
     */
    public function playTurn(Deck $deck, Dice $dice)
    {
        $this->turnFirstCardWithColor($dice->roll());

        if ($this->hasWon()) {
            printf('Player "%s" has won!', $this->name);
            echo PHP_EOL;
        } else {
            $this->getNextPlayer()->play($deck, $dice);
        }
    }

    /**
     * @param Deck $deck
     */
    public function takeCards(Deck $deck)
    {
        $this->cards = $deck->createSetOfCards();
    }

    /**
     * @param Color $color
     */
    private function turnFirstCardWithColor(Color $color)
    {
        foreach ($this->cards as $card) {
            if ($card->getColor()->isSameColorAs($color)) {
                $card->turn();
                return;
            }
        }
    }

    /**
     * @return bool
     */
    private function hasWon()
    {
        foreach($this->cards as $card) {
            if (!$card->isTurned()) {
                return false;
            }
        }

        return true;
    }
}