<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once 'app/Card.php';

final class CardTest extends TestCase
{
    public function testCardCreation(): void
    {
      $card = new Card('Jack','Clubs',11);
      $this->assertEquals($card->getProps()['value'],11);
      $this->assertEquals($card->getProps()['face'],'Jack');
      $this->assertEquals($card->getProps()['suit'],'Clubs');
      $this->assertFalse($card->isDealt());
    }

    public function testCardSetAsDealt(): void
    {
      $card = new Card('Jack','Clubs',11);
      $card->setAsDealt();
      $this->assertTrue($card->isDealt());
    }
}
