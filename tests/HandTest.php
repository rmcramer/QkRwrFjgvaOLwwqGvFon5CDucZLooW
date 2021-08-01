<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once 'app/Hand.php';
require_once 'app/Card.php';

final class HandTest extends TestCase
{
    public function testHandCreation(): void
    {
      $cards[] = new Card('Jack','Clubs',11);
      $cards[] = new Card('6','Clubs',6);
      $cards[] = new Card('7','Hearts',7);
      $cards[] = new Card('9','Clubs',9);
      $cards[] = new Card('10','Clubs',10);
      $cards[] = new Card('7','Clubs',7);
      $handObj = new Hand($cards);
      // No straights in the hand above, not flush or regular
      $this->assertFalse($handObj->hasStraight(5,true));
      $this->assertFalse($handObj->hasStraight(5));

      $handObj->addCard(new Card('8','Spades',8));
      // After adding an 8 of Spades, only a regular straight exists
      $this->assertTrue($handObj->hasStraight(5));
      $this->assertFalse($handObj->hasStraight(5,true));

      $this->assertEquals(count($handObj->getCards()),7);
      $handObj->addCard(new Card('8','Clubs',8));
      // After adding an 8 of Clubs, both a flush and regular straight exist
      $this->assertTrue($handObj->hasStraight(5,true));
      $this->assertTrue($handObj->hasStraight(5));

      $this->assertEquals(count($handObj->getCards()),8);
      $this->assertNotEquals(count($handObj->getCards()),7);

      $handObj = new Hand();
      $this->assertEquals(count($handObj->getCards()),0);
      $handObj->addCard(new Card('King','Spades',13));
      $this->assertNotEquals(count($handObj->getCards()),0);
      $this->assertEquals(count($handObj->getCards()),1);
    }
}
