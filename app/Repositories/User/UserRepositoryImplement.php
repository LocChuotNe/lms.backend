<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
//test
     public function getAllUsers()
    {
        return $this->model->all();
    }

    public function findUserById($id)
    {
        return $this->model->find($id);
    }

    public function createUser(array $data)
    {
        return $this->model->create($data);
    }


    // Write something awesome :)
}
