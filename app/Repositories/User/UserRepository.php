<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{

    // Write something awesome :)
    public function getAllUsers();
    public function findUserById($id);
    public function createUser(array $data);
}
