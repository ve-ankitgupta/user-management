<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\User\IUser as Repository;

class UserService {

    protected $repository;

    public function __construct(Repository $repository) {
        $this->repository = $repository;
    }
    
    public function list(Request $request) {
        return $this->repository->paginate($request->input('limit', 10));
    }

    public function store(Request $request) {
        $data = $request->only([
            'name', 'email', 'password', 'role'
        ]);

        $data['status'] = $request->input('status') === 'on' ? true : false;
        

        return $this->repository->create($data);
    }

    public function delete(Request $request):bool {
        return $this->repository->delete((int) $request->route('id'));
    }

    public function toggleStatus(Request $request):bool {
        return $this->repository->toggleStatus((int) $request->route('id'));
    }
}