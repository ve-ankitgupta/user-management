<?php

namespace App\Repositories;

interface IRepository {
    public function paginate (int $paginate);
}