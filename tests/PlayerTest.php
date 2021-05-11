<?php

use BasicPHPUnitTest\game\Player;

final class PlayerTest extends PHPUnit\Framework\TestCase
{
    /**
     * vytvoří hráče p a nastaví mu třikrát životy a armor uvedený v poli ve foreach 
     */
    public function testCreation(): void
    {
        $p = new Player(100, 50);
        foreach ([
            [100, 40],
            [8764, 785],
            [20, 40],
        ] as $pos) {
            $this->assertSame(
                strval($p->setHP($pos[0])),
                strval($p->setARMOR($pos[1])),
                "[" . $pos[0] . "," . $pos[1] . "]"
            );
        }
    }

    /**
     * vytvoří hráče p a otestuje get a set, následně hp a armor změní a otestuje znovu
     */
    public function testSettersAndGetters(): void
    {
        $p = new Player(100, 30);
        $this->assertSame($p->getHP(), 100);
        $this->assertSame($p->getARMOR(), 30);
        $p->setHP(80);
        $p->setARMOR(20);
        $this->assertSame($p->getHP(), 80);
        $this->assertSame($p->getARMOR(), 20);
    }

    /**
     * vytvoří hráče p a otestuje několik různých hitů uvedený v poli ve foreach
     * po každém hitu nastaví HP hráče opět na původních 120
     */
    public function testHit(): void
    {
        $p = new Player(120, 40);
        foreach ([ 5, 30, 80, 500, 1, 999999] as $demage) {
            $p->setHP(120);
            $p->hit($demage);
            $this->assertSame(
                $p->getHP(), 120 - round($demage * 1 / (1 + $p->getARMOR() / 100)));
        }
    }
}