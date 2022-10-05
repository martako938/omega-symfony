<?php
namespace App\Services;

use Firebase\JWT\JWT;
use App\Entity\User;

//Servicio para comunicarse con la BD

class JwtAuth{

    public $manager;
    public $key;

    public function __construct($manager){
        $this->manager = $manager;
        $this->key = 'Omega_Version@2022';
    }

    public function signup($email, $password, $gettoken = null ){

        // Comprobar si el usuario existe buscando con email y password
        $user = $this->manager->getRepository(User::class)->findOneBy([
            'email' => $email,
            'password' => $password
        ]);

        $signup = false;
        //Si existe user hacer true la variable signup
        if (is_object($user)) {
            $signup = true;
        }

        // var_dump($user);
        // die();

        // Si existe, generar el token jwt
        if ($signup) {
            //Los ulimos dos paramatreo regresan el tiempo en q inicio y el q expira el token
            $token = [
                'sub'=> $user->getId(),
                'nombre'=> $user->getNombre(),
                'email'=> $user->getEmail(),
                'iat'=> time(),
                'exp'=> time() + (7 * 24 * 60 * 60)
            ];
            //Codificando el token  
            $jwt = JWT::encode($token, $this->key, 'HS256');
            //Comprobar flag y condicion
            if (!empty($gettoken)) {
                $data = $jwt;
            }else {
                $decoded = JWT::decode($jwt, $this->key, ['HS256']);
                $data = $decoded;
            }

        }else {
            $data = [
                'status' => 'error',
                'msg' => 'Login incorrecto'
            ];
            
        }
        // Devolver los datos
        return $data;
    }

    public function checkToken($jwt){
        $auth = false;

        try {
            //Para decodificar el token
            $decoded = JWT::decode($jwt, $this->key, ['HS256']);
            
        } catch (\UnexpectedValueException $e) {
            $auth = false;
        } catch (\DomainException $e ){
            $auth = false;
        }

        if ( isset($decoded) && !empty($decoded) && is_object($decoded) && isset($decoded->sub) ) {
            $auth = true;
        }else {
            $auth = false;
        }
        return  $auth;
    }

}

