<?php

namespace App\Repositories\User;

use App\Repositories\Repository;

class User extends Repository implements IUser {

    public function paginate (int $paginate) {
        return $this->model->where('role', '!=', 'admin')->paginate ($paginate);
    }
}