<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;


#[AsLiveComponent]
 class RandNr
{
    #[LiveProp]
    public int $max = 10;
    use DefaultActionTrait;
    public function getRandomNr(): int
    {
        return rand(0, max:10);
    }
}
