<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Email;
use Doctrine\Persistence\ManagerRegistry;

use App\Entity\User;
use App\Services\JwtAuth;
// use App\Entity\Empleado;


class UserController extends AbstractController{

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

    public function index( ManagerRegistry $doctrine ): JsonResponse{
        //A partir de Symfony 5
        $entityManager = $doctrine->getManager();

        $user_repo = $entityManager->getRepository(User::class);
        

        //Haciendo las busqueda
        $users = $user_repo->findAll();
        $user = $user_repo->find(1);

        return $this->resjson($users);
    }

    // Para crear un usuario POST
    public function create(Request $request, ManagerRegistry $doctrine){
        //Recoger los datos por post
        $json = $request->get('json', null);

        // Decodificar el json
        $params = json_decode($json);
        //Antes se necesitab agregar true si no tivieramos jresponse ne la cabecera
        //$params = json_decode($json, true);

        // Respuesta por defecto
        $data = [
            'status' => 'error',
            'code ' => 500,
            'msg' => 'El usuario no se ha creado. ',
            'json' => $params
        ];

        // Comprobar y validar datos
        if ( $json != null ) {
            $nombre = (!empty($params->nombre)) ? $params->nombre : null;
            $email = (!empty($params->email)) ? $params->email : null;
            $password = (!empty($params->password)) ? $params->password : null;

            //clase validator importada de symfony
            $validator = Validation::createValidator();
            $validate_email = $validator->validate($email, [
                new Email()
            ]);

            if( !empty($email) && count($validate_email)==0 && !empty($password) && !empty($nombre) ){
                // Si la validacion es correcta, crear el objeto usuario

                $user = new User();
                $user->setNombre($nombre);
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setRol('ROLE_USER');
                //$user->setCreatedAt(new \DateTime('now'));
                // Cifrar la contraseña
                $pwd = hash( 'sha256', $password );
                $user->setPassword($pwd);

                $data = $user;

                // Comprobar si el usuario existe (duplicados)
                $entityManager = $doctrine->getManager();

                $user_repo = $entityManager->getRepository(User::class);
                $isset_user = $user_repo->findBy(array(
                    'email' => $email
                ));
                 // Si no existe, guardarlo en la BD
                 if ( count($isset_user) == 0 ) {
                    //Guardo el usuario en la base
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $data = [
                        'status' => 'sucess',
                        'code ' => 200,
                        'msg' => 'Usuario creado correctamente',
                        'user' => $user
                    ];
                 }else {
                    $data = [
                        'status' => 'error',
                        'code ' => 404,
                        'msg' => 'El usuario ya existe.'
                    ];
                 }
            }

        }
        // Hacer respuesta en json 
        return $this->resjson($data);
    }

    // Para hacer Login. Se enyecta el servicio ya importado JwtAuth $jwt_auth
    public function login(Request $request, JwtAuth $jwt_auth){

        // Recibir los datos en post
        $json = $request->get('json', null);

        // Decodificar el json
        $params = json_decode($json);

        // Array respuesta por defecto
        
        $data = [
            'status' => 'error',
            'code' => 200,
            'msg' => 'El usuario no se ha podido identificar',
        ];

        // Comprobar y validar los datos
        if ($json != null) {
            
            $email = (!empty($params->email)) ? $params->email : null;
            $password = (!empty($params->password)) ? $params->password : null;
            $gettoken = (!empty($params->gettoken)) ? $params->gettoken : null;

            //clase validator importada de symfony
            $validator = Validation::createValidator();
            $validate_email = $validator->validate($email, [
                new Email()
            ]);

            if ( !empty($email) && !empty($password) && count($validate_email) == 0 ) {
                
                // Cifrar contraseña
                $pwd = hash('sha256', $password);

                // Si es valido llamar un servicio para identificar al usuaria  (jwt, token o un objeto)
                  if ($gettoken) {
                    $signup = $jwt_auth->signup($email, $pwd, $gettoken);
                  }else {
                    $signup = $jwt_auth->signup($email, $pwd);
                  } 
                  return new JsonResponse($signup);
            }
        } 
        // Si devuelve bien los datos, respuesta
        return $this->resjson($data);
    }

    public function edit(Request $request,JwtAuth $jwt_auth){

        // Recoger la cabecera de autenticacion
        $token = $request->headers->get('Authorization');

        // Crear un metodo para comprobar si el token es correcto
        $authCheck = $jwt_auth->checkToken($token);

        //Si es correcto, hacer la actualizacion del usuario
        if ($authCheck) {
            // Actualizar al usuario

            // Conseguir entity manager

            // Conseguir los datos del usuario identificado

            // Conseguir el usuario actualizar completo

            // Recoger datos por post

            // Comprobar y validar los datos

            // Asignar los nuevos datos del objeto al usuario

            // Comprobar duplicados

            // Guardar cambios en la base de datos
        }
        // Array respuesta por defecto
        $data = [
            'status' => 'error',
            'msg' => 'Metodo update del controlador usuarios',
            'token' => $token,
            'authCheck' => $authCheck
        ];

        return $this->resjson($data);
    }

}
