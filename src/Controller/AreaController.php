<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

use Doctrine\Persistence\ManagerRegistry;
//Antes se usaban en la version 4 estas cabeceras ahora se usa JsonResponse
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Area;
use App\Entity\Puesto;

class AreaController extends AbstractController{


    //Para regresar los objetos de la BD en formato json
    private function resjson($data): JsonResponse{
        //Serializar datos con servicio serializer
        $json = $this->get('serializer')->serialize($data, 'json');

        //Response con httpfoundation
        $response = new JsonResponse();

        //Asignar contenido a la respuesta
        $response->setContent($json);

        //Indicar formato de respuesta
        $response->headers->set('Content-Type', 'application/json');

        //Devolver la respuesta
        return $response;
    }

    public function index( ManagerRegistry $doctrine ): JsonResponse
    {
        //A partir de Symfony 5
        $entityManager = $doctrine->getManager();

        $area_repo = $entityManager->getRepository(Area::class);
        $puesto_repo = $entityManager->getRepository(Puesto::class);

        //getDoctrine en Symfony 4 y 3
        // $area_repo = $this->getDoctrine()->getRepository(Area::class);
        // $puesto_repo = $this->getDoctrine()->getRepository(Puesto::class);

        //Haciendo las busquedas
        $areas = $area_repo->findAll();
        $area = $area_repo->find(1);

        $puestos = $puesto_repo->findAll();

        $data = [
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AreaController.php'
        ];


        //Busqueda redundante

        // foreach($areas as $area){
        //     echo "<h2> {$area->getId()}.- Área {$area->getNombre()}</h2>";
        //     //Buscar puestos de las areas. Hacemos redundacia en la busqueda
        //     foreach($area->getPuestos() as $puesto){
        //         echo " <h3>{$puesto->getNombre()}</h3> "; 
        //         echo " <p>Desc: {$puesto->getArea()->getDescripcion()}</p> ";
        //     }
        // }

        // var_dump($area);
        // die();

        return $this->resjson($areas);

    }
}
