<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
// use App\Entity\User;
// use App\Entity\Sucursal;


class UserController extends AbstractController
{
    public function index(): JsonResponse
    {

        // $user_repo = $this->getDoctrine()->getRepository(User::class);
        // $sucursal_repo = $this->getDoctrine()->getRepository(Sucursal::class);

        // $users = $user_repo->findAll();

        // foreach($users as $user){
        //     echo "<h1>{$user->getName()} {$user->getSurname()}</h1>";

        //     foreach($user->getSucursales() as $sucursal){
        //         echo "<p>{$sucursal->getTitle()} - {$sucursal->getUser()->getEmail()}</p>";
        //     }
        // }
        // die();
        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
}
