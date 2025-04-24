<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;

#[AsLiveComponent('LikeComponent')]
final class LikeComponent
{

    use DefaultActionTrait;

    public $post;
    public $isLiked;
    public $isDisliked;

    #[LiveProp(writable: true)]
    public int $likes = 0;

    #[LiveProp(writable: true)]
    public int $dislikes = 0;

    #[LiveAction]
    public function like(): void
    {
        $this->likes++;
    }

    #[LiveAction]
    public function undoLike(): void
    {
        $this->likes--;
    }

    #[LiveAction]
    public function dislike(): void
    {
        $this->dislikes++;
    }

    #[LiveAction]
    public function undoDislike(): void
    {
        $this->dislikes--;
    }
}

