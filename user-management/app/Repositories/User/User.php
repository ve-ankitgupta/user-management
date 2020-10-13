<?php

namespace App\Repositories\User;

use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

class User extends Repository implements IUser {

    public function paginate (int $limit):LengthAwarePaginator {
        return $this->model->where('role', '!=', 'admin')->orWhereNull('role')->paginate($limit);
    }
}