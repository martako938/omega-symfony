<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Area;
use App\Entity\Puesto;

class AreaController extends AbstractController
{

    public function index(): JsonResponse
    {

        $area_repo = $this->getDoctrine()->getRepository(Area::class);
        $puesto_repo = $this->getDoctrine()->getRepository(Puesto::class);

        $areas = $area_repo->findAll();

        foreach($areas as $area){
            echo "<h2> {$area->getId()}.- Área {$area->getNombre()}</h2>";
            //Buscar puestos de las areas. Hacemos redundacia en la busqueda
            foreach($area->getPuestos() as $puesto){
                echo " <h3>{$puesto->getNombre()}</h3> "; 
                echo " <p>Desc: {$puesto->getArea()->getDescripcion()}</p> ";
            }
        }
        die();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AreaController.php',
        ]);
    }
}
