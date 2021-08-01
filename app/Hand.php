<?php
/*
 * The Hand Class
 */
class Hand {
  private $cards = [];
  public const MAX_HAND_SIZE = 52;

  function __construct($cards = []) {
    $this->cards = $cards;
  }

  public function display() {
    if (count($this->cards)) {
      foreach ($this->cards as $card) {
        $card->display();
      }
    } else {
      echo "Hand is empty.\n";
    }
  }

  public function addCard($card) {
    if (!is_object($card) ||
        get_class($card) != 'Card') {
      throw new Exception("Incorrect Card object added to Hand.\n");
    }

    if (count($this->cards) < self::MAX_HAND_SIZE) {
      $this->cards[] = $card;
    } else {
      echo "No more room in the hand.\n";
    }
  }

  private function bubbleSortCards($sortable_array,$obj_primary_key,$obj_secondary_key) {
    $sorted_array = $sortable_array;
    for ($i=0;$i<count($sorted_array);$i++) {
      for ($j=0;$j<count($sorted_array)-$i-1;$j++) {
        if ($sorted_array[$j]->getProps()[$obj_primary_key] > $sorted_array[$j+1]->getProps()[$obj_primary_key] ||
            ($sorted_array[$j]->getProps()[$obj_primary_key] == $sorted_array[$j+1]->getProps()[$obj_primary_key] &&
             $sorted_array[$j]->getProps()[$obj_secondary_key] > $sorted_array[$j+1]->getProps()[$obj_secondary_key])) {
          $temp = $sorted_array[$j+1];
          $sorted_array[$j+1] = $sorted_array[$j];
          $sorted_array[$j] = $temp;
        }
      }
    }
    return $sorted_array;
  }

  private function sortBySuit() {
    return $this->bubbleSortCards($this->cards,'suit','value');
  }

  private function sortByValue() {
    return $this->bubbleSortCards($this->cards,'value','suit');
  }

  public function hasStraight($len,$sameSuit=false) {

    if ($sameSuit) $cards = $this->sortBySuit();
    else $cards = $this->sortByValue();

    $lastValue = $cards[0]->getProps()['value'];
    $lastSuit = $cards[0]->getProps()['suit'];
    $numInARow = 1;
    $cardIdx = 1;

    while ($cardIdx < count($cards)) {
      $thisValue = $cards[$cardIdx]->getProps()['value'];
      $thisSuit = $cards[$cardIdx]->getProps()['suit'];

      if (($lastValue + 1) == $thisValue &&
          (!$sameSuit || ($sameSuit && $lastSuit == $thisSuit))) {
        // found the next card in a straight series, so increment the series length
        $numInARow++;
      } else if ($sameSuit || (!$sameSuit && $lastValue != $thisValue)) {
        // reset the hand's straight series length to 1 card found in a straight
        $numInARow = 1;
      }

      if ($numInARow == $len) return true;

      $lastValue = $thisValue;
      $lastSuit = $thisSuit;
      $cardIdx++;
    }

    return false;
  }

  public function getCards() {
    return $this->cards;
  }
}
