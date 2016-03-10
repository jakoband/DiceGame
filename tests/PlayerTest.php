<?php


class PlayerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider providePlayerNames
     */
    public function testCreatePlayersAndSuccessfullyRetrieveName($name)
    {
        $player = new Player($name);
        $this->assertEquals($name, $player->getName());
    }

    public function providePlayerNames()
    {
        return [
            ['Test1'],
            ['max']
        ];
    }
}
