<?php

namespace App\Service;

use App\Entity\Usuario;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class PasswordService
{

    public function __construct (
        private  PasswordHasherFactoryInterface $passwordHasherFactory
    ){
    }

    public function encrypt(string $password):string{
        $encrypter = $this -> passwordHasherFactory -> getPasswordHasher(Usuario::class);
        $password .= (new \DateTime())->format('Y');

        return  $encrypter->hash($password);
    }
}