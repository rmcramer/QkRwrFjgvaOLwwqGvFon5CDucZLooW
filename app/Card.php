<?php
/*
 * The Card Class
 */
class Card {
  /*
   * Chose an array instead of individual Class properties
   * for the card's face, suit and value because it let me
   * more easily create a generic bubble sort algorith for
   * sorting a Hand
   */
  private $props = [];
  private $is_dealt = false;

  function __construct($face,$suit,$value) {
    if (!in_array($suit,Deck::SUITS) ||
        !in_array($face,Deck::FACES) ||
        !is_int($value) ||
        $value < 2) {
      throw new Exception('Incorrect values given for Card.');
    }

    $this->props = [ 'face' => $face,
                     'suit' => $suit,
                     'value' => $value ];
  }

  public function display() {
    echo $this->props['face'] . " of " . $this->props['suit'] . "\n";
  }

  public function setAsDealt() {
    $this->is_dealt = true;
  }

  public function getProps() {
    return $this->props;
  }

  public function isDealt() {
    return $this->is_dealt;
  }
}
