<?php

namespace App\Services;

use App\Repositories\User\IUser as Repository;

class UserService {

    protected $repository;

    public function __construct(Repository $repository) {
        $this->$repository = $repository;
    }
    
    public function list(Request $request) {
        return $this->repository->paginate($request->input('page', 1));
    }
}