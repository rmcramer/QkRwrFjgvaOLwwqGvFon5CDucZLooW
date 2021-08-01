<?php

require_once 'app/Deck.php';
require_once 'app/Hand.php';
require_once 'app/Card.php';

$deck = new Deck();
$deck->shuffle();

echo "\nHand #1:\n";
echo "------------------\n";
$hand1 = new Hand();
$hand1->addCard($deck->dealOne());
$hand1->addCard($deck->dealOne());
$hand1->addCard($deck->dealOne());
$hand1->addCard($deck->dealOne());
$hand1->addCard($deck->dealOne());
$hand1->display();
echo "------------------\n\n";

echo "Hand #2:\n";
echo "------------------\n";
$hand2 = new Hand();
$hand2->addCard($deck->dealOne());
$hand2->addCard($deck->dealOne());
$hand2->addCard($deck->dealOne());
$hand2->addCard($deck->dealOne());
$hand2->addCard($deck->dealOne());
$hand2->display();
echo "------------------\n\n";

echo "Hand #3:\n";
echo "------------------\n";
$hand3 = new Hand();
$hand3->addCard($deck->dealOne());
$hand3->addCard($deck->dealOne());
$hand3->addCard($deck->dealOne());
$hand3->addCard($deck->dealOne());
$hand3->addCard($deck->dealOne());
$hand3->display();
echo "------------------\n\n";
