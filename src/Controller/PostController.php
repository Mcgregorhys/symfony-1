<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/', requirements: ['_locale' => 'en|pl'])]

class PostController extends AbstractController
{
    #[Route('/{_locale}', methods: ['GET'], name: 'posts.index')]
    public function index(string $_locale = 'en'): Response
    {
       
       
        return $this->render('post/index.html.twig');
    }

    #[Route('/{_locale}/post/new/', methods: ['GET', 'POST'], name: 'posts.new')]
    public function new(): Response
    {
        
        return $this->render('post/new.html.twig');
    }

    #[Route('/{_locale}/post/{id}/', methods: ['GET'], name: 'posts.show')]
    public function show($id): Response
    {
        return $this->render('post/show.html.twig');
    }

    #[Route('/{_locale}/post/{id}/edit', methods: ['GET', 'POST'], name: 'posts.edit')]
    public function edit($id): Response
    {
        // return $this->redirectToRoute('posts.index');
        return $this->render('post/edit.html.twig');
    }

    #[Route('/{_locale}/post/{id}/delete', methods: ['POST'], name: 'posts.delete')]
    public function delete($id): Response
    {
        return new Response('delete post from the database');
    }

    #[Route('/{_locale}/posts/user/{id}', methods: ['GET'], name: 'posts.user')]
    public function user($id): Response
    {
        // return new Response($id);
        return $this->render('post/index.html.twig');
    }

    #[Route('/{_locale}/toggleFollow/{user}', methods: ['GET'], name: 'toggleFollow')]
    public function toggleFollow($user): Response
    {
        // return new Response($user);
        return new Response('logic for toggling like/dislike functionality');
    }
}

