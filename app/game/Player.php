<?php

namespace BasicPHPUnitTest\game;

class Player
{
    private $hp;

    private $armor;

    public function __construct($hp, $armor)
    {
        $this->setHP($hp);
        $this->setARMOR($armor);
    }

    public function setHP($hp)
    {
        $this->hp = $hp;
    }

    public function getHP()
    {
        return $this->hp;
    }

    public function setARMOR($armor)
    {
        $this->armor = $armor;
    }

    public function getARMOR()
    {
        return $this->armor;
    }

    /**
     * redukuje životy (HP) hráče podle toho kolik má armor
     * pokud má hráč 0 a míň životů už se nedá hitnout
     */

    public function hit($demage)
    {
        if($this->hp > 0){
            $this->hp -= round($demage * 1 / (1 + $this->armor / 100));
        }
    }
}
