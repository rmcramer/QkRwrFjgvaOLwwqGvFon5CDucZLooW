<?php
/*
 * The Deck Class
 */
class Deck {
  public const SUITS = ['Clubs','Diamonds','Hearts','Spades'];
  public const FACES = [ '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace' ];
  private $deck = [];
  private $last_dealt_idx = -1;
  private $is_shuffled = false;

  function __construct() {
    $this->populateDeck();
  }

  private function populateDeck() {
    foreach (self::SUITS as $suit) {
      $value = 2;
      foreach (self::FACES as $face) {
        $this->deck[] = new Card($face,$suit,$value);
        $value++;
      }
    }
  }

  public function dealOne() {
    if ($this->last_dealt_idx < count($this->deck) - 1) {
      $next_card = $this->deck[$this->last_dealt_idx + 1];
      $next_card->setAsDealt();
      $this->last_dealt_idx++;
      return $next_card;
    } else {
      echo "No more cards left to deal.\n";
    }
  }

  public function getDeck() {
    return $this->deck;
  }

  public function display() {
    if (count($this->deck)) {
      foreach ($this->deck as $card) {
        $card->display();
      }
    } else {
      echo "Deck is empty.\n";
    }
  }

  public function shuffle() {
    if (!$this->is_shuffled) {
      for($i=0;$i<(count($this->deck)-2);$i++) {
          $rand_num = rand($i,count($this->deck)-1);
          $tmp = $this->deck[$i];
          $this->deck[$i] = $this->deck[$rand_num];
          $this->deck[$rand_num] = $tmp;
      }
      $this->is_shuffled = true;
    } else {
      echo "Deck is already shuffled.\n";
    }
  }
}
