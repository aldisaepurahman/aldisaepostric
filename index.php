<?php

class Armor{
    private $name;
    private $defence;

    public function __construct($name, $defence)
    {
        $this->name = $name;
        $this->defence = $defence;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDefence()
    {
        return $this->defence;
    }
}

class Weapon{
    private $name;
    private $power;

    public function __construct($name, $power)
    {
        $this->name = $name;
        $this->power = $power;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPower()
    {
        return $this->power;
    }
}

class Robot{
    private $name;
    private $health;
    private $weapon;
    private $armor;

    public function __construct($name, $health, Weapon $weapon, Armor $armor){
        $this->name = $name;
        $this->weapon = $weapon;
        $this->armor = $armor;
        $this->health = $health + $this->armor->getDefence();
    }

    public function getPower()
    {
        return $this->weapon->getPower();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getMaxHealth()
    {
        return $this->health;
    }

    public function attack($health, $power)
    {
        $this->health = $health - $power;
        return $this->health;
    }
}

$armor1 = new Armor("Baja", 1500);
$armor2 = new Armor("Besi", 1000);

$weapon1 = new Weapon("AK47", 400);
$weapon2 = new Weapon("Golok", 100);

$robot1 = new Robot("Bot_kill", 2000, $weapon1, $armor2);
$robot2 = new Robot("Bot_gomis", 2000, $weapon2, $armor1);

echo "<b>Nama</b> : ". $robot1->getName() ." / <b>Max Health</b> : ". $robot1->getMaxHealth().
" vs <b>Nama</b> : ". $robot2->getName() ." / <b>Max Health</b> : ". $robot2->getMaxHealth() . "<br>";
echo "<br>";
$turns = 1;
while (($robot1->getMaxHealth() > 0) && ($robot2->getMaxHealth() > 0)) {
    if ($turns == 1) {
        echo "<b>". $robot1->getName()."</b> menyerang, Health <b>".
        $robot2->getName() . "</b> berkurang menjadi ".
        $robot2->attack($robot2->getMaxHealth(), $robot2->getPower());
        $turns = 2;
    }
    else if ($turns == 2) {
        echo "<b>". $robot2->getName()."</b> menyerang, Health <b>".
        $robot1->getName() . "</b> berkurang menjadi ".
        $robot1->attack($robot1->getMaxHealth(), $robot1->getPower());
        $turns = 1;
    }
    echo "<br>";
}
echo "<br>";

if ($robot1->getMaxHealth() > 0) {
    echo "<b>". $robot1->getName() ." MENANG!</b";
}
else if ($robot2->getMaxHealth() > 0) {
    echo "<b>". $robot2->getName() ." MENANG!</b";
}

?>