<?php

namespace App\Repositories\User;

use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

class User extends Repository implements IUser {

    public function paginate (int $limit):LengthAwarePaginator {
        return $this->model->where('role', '!=', 'admin')->orWhereNull('role')->paginate($limit);
    }

    public function toggleStatus(int $id):bool {
        $user = $this->model->find($id);
        return $user->update(['status' => !$user->status]);
    }
}