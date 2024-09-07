<?php

namespace Alunos\Aula0409\Controller;

use Alunos\Aula0409\model\User;

class UserController{

    private $users = [];

    public function __construct() {
        $this->users = [
            ['id' => 1, 'nome' => 'eu', 'idade' => 15],
            ['id' => 2, 'nome' => 'tu', 'idade' => 16],
        ];
    }

    public function getUsers() {
        return $this->users;
    }

    public function insertUsers($data){
        $user = new User();
        $idade = $data['idade'];
        $idade += 5;
        $user->setNome($data['nome']);
        $user->setIdade($idade);
        return ['nome'=> $user->getNome(), 'idade'=> $user->getIdade()];
        
    }
    public function updateUsers($id){
        foreach ($this->users as &$user) {
            if ($user['id'] == $id) {
                $user['nome'] = $data['nome'] ?? $user['nome'];
                $user['idade'] = $data['idade'] ?? $user['idade'];

                return $user;
            }
        }

        return null;
    }
    public function deleteUsers($id){
         foreach ($this->users as $index => $user) {
            if ($user['id'] == $id) {
                unset($this->users[$index]);  
                $this->users = array_values($this->users);

                return true;
            }
        }

        return false;
    }
}
