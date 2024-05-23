<?php


class Element
{
    private $name;
    private $beats;

    public function __construct($name, $beats)
    {
        $this->name = $name;
        $this->beats = $beats;
    }

    public function getName()
    {
        return $this->name;
    }

    public function beats(Element $element)
    {
        return in_array($element->getName(), $this->beats);
    }
}

$elements = [
    'rock' => new Element('Rock', ['Scissors', 'Lizard']),
    'paper' => new Element('Paper', ['Rock', 'Spock']),
    'scissors' => new Element('Scissors', ['Paper', 'Lizard']),
    'lizard' => new Element('Lizard', ['Paper', 'Spock']),
    'spock' => new Element('Spock', ['Rock', 'Scissors'])
];

$guess = strtolower(readline("Rock, Paper, Scissors, Lizard or Spock?"));

if (!array_key_exists($guess, $elements)) {
    echo "Invalid choice! Please choose Rock, Paper, Scissors, Lizard, or Spock.";
    exit;
}

$userElement = $elements[$guess];
$opponentElement = $elements[array_rand($elements)];

if ($userElement->getName() === $opponentElement->getName()) {
    echo "It's a draw!";
} elseif ($userElement->beats($opponentElement)) {
    echo "You win! " . $userElement->getName() . " beats " . $opponentElement->getName() . ".";
} else {
    echo "You lose! " . $opponentElement->getName() . " beats " . $userElement->getName() . ".";
}