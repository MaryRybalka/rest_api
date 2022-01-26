<?php

use App\Entity\User;
use PHPUnit\Framework\TestCase;

 class UserTest extends TestCase{
    public function testWithNegInd(): void
    {
        $this->expectOutputString('');
        print((new App\Entity\User)->testMeAll(-1));
    }

    public function testWithValidData(): void
    {
        $this->expectOutputString('W');
        print ((new App\Entity\User)->testMeAll(0));
    }
}
