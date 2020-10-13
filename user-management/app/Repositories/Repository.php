<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository {
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function paginate (int $paginate) {
        return $this->model->paginate ($paginate);
    }
}