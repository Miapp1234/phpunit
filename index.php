<?php

use BasicPHPUnitTest\game;

require "vendor/autoload.php";

$p = new game\Player(100, 35);
echo $p->getARMOR() . "\n";
echo $p->getHP() . "\n";
//hitne hráče za 60, ale jelikož hráč má armor 35 provede se výpočet podle vzorce a hráče to hitne jen za 44 životů
$p->hit(60);
echo $p->getHP();