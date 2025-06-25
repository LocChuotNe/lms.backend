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

    public function getAllUsers()
    {
        return $this->model->all();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function update($id, array $data)
    {
        $user = $this->model->findOrFail($id);
        $user->update($data);
        return $user->fresh();
    }

    public function delete($id)
    {
        $user = $this->model->findOrFail($id);
        return $user->delete();
    }

}
