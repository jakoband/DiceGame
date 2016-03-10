<?php

/**
 * @covers Card
 */
class CardTest extends PHPUnit_Framework_TestCase
{
    public function testCardCanBeCreatedWithValidConstructorArgumentAndReturnsExpectedColor()
    {
        $color = 'blue';

        $stub = $this->getMockBuilder('Color', array('getColor'))->disableOriginalConstructor()->getMock();
        $stub->method('getColor')->willReturn($color);


        var_dump($stub);

        //$stub->getColor();


        // eigentlich muss man für value objects keinen Mock machen, aber dann wird der Test "risky"
        //$colorValueObject = new Color($color);

        //$card = new Card($stub);


        //var_dump($card);

        //$this->assertSame($color, (string) $card->getColor());
    }

//    public function testCreatedCardIsNotTurnedByDefault()
//    {
//        $color = 'blue';
//        $card = new Card(new Color($color));
//        assertSame(false, $card->isTurned());
//    }

    /**
     * @param Color[]
     *
     * @dataProvider inValidConstructorArguments
     * @expectedException TypeError
     */
    public function testCardCannotBeCreatedWithInvalidConstructorArgument($color)
    {
        new Card($color);
    }

    public function inValidConstructorArguments()
    {
        return [
            ['string'],
            [123]
        ];
    }



}
