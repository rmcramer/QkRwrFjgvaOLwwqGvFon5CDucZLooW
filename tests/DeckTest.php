<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require_once 'app/Deck.php';

final class DeckTest extends TestCase
{
    public function testDeckCreation(): void
    {
      $deckObj = new Deck();
      $deckObj->shuffle();
      $deckShuffled = $deckObj->getDeck();
      $this->assertTrue(is_int($deckShuffled[0]->getProps()['value']));
      $this->assertTrue(in_array($deckShuffled[0]->getProps()['face'],DECK::FACES));
      $this->assertTrue(in_array($deckShuffled[0]->getProps()['suit'],DECK::SUITS));
      $this->assertFalse($deckShuffled[0]->isDealt());
      $this->assertTrue(is_int($deckShuffled[25]->getProps()['value']));
      $this->assertTrue(in_array($deckShuffled[25]->getProps()['face'],DECK::FACES));
      $this->assertTrue(in_array($deckShuffled[25]->getProps()['suit'],DECK::SUITS));
      $this->assertFalse($deckShuffled[25]->isDealt());
      $this->assertTrue(is_int($deckShuffled[51]->getProps()['value']));
      $this->assertTrue(in_array($deckShuffled[51]->getProps()['face'],DECK::FACES));
      $this->assertTrue(in_array($deckShuffled[51]->getProps()['suit'],DECK::SUITS));
      $this->assertFalse($deckShuffled[51]->isDealt());
    }

    public function testDeckShuffle(): void
    {
      $deckObj = new Deck();
      $deck = $deckObj->getDeck();
      $deckObj->shuffle();
      $deckShuffled = $deckObj->getDeck();
      $this->assertEquals($deck,$deck);
      $this->assertNotEquals($deck,$deckShuffled);
    }

    public function testDeckDealOne(): void
    {
      $deckObj = new Deck();
      $deckObj->shuffle();
      $dealtCard = $deckObj->dealOne();
      $this->assertTrue(is_int($dealtCard->getProps()['value']));
      $this->assertTrue(in_array($dealtCard->getProps()['face'],DECK::FACES));
      $this->assertTrue(in_array($dealtCard->getProps()['suit'],DECK::SUITS));
      $this->assertTrue($dealtCard->isDealt());
      $this->assertTrue($deckObj->getDeck()[0]->isDealt());
      $this->assertFalse($deckObj->getDeck()[1]->isDealt());
      $this->assertFalse($deckObj->getDeck()[2]->isDealt());
      $dealtCard = $deckObj->dealOne();
      $this->assertTrue($deckObj->getDeck()[0]->isDealt());
      $this->assertTrue($deckObj->getDeck()[1]->isDealt());
      $this->assertFalse($deckObj->getDeck()[2]->isDealt());
    }
}
