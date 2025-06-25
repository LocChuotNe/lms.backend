<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Repository;
use App\Models\User;


interface UserRepository extends Repository{

    // Write something awesome :)
    public function getAllUsers();
    public function create($data);
    public function findById(int $id);
    public function findByEmail(string $email);
    public function update($id, array $data);
    public function delete($id);
}
