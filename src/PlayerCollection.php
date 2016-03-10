<?php


class PlayerCollection
{
    /**
     * @var $currentPlayerIndex
     */
    private $currentPlayerIndex = 0;
    private $players = array();

    /**
     * @param Player $player
     */
    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
        $this->currentPlayerIndex = 0;
    }

    /**
     * @return Player
     * @throws Exception
     */
    public function getNextPlayer()
    {
        if (!isset($this->players[$this->currentPlayerIndex])) {
            throw new \Exception('No Player at index '. $this->currentPlayerIndex);
        }
        $nextPlayer = $this->players[$this->currentPlayerIndex];
        $this->currentPlayerIndex = ($this->currentPlayerIndex + 1) % count($this->players);

        return $nextPlayer;
    }
}