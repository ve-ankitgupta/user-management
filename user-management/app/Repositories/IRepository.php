<?php

namespace App\Repositories;

interface IRepository {
    public function paginate (int $paginate);
    public function create(array $data);
    public function delete(int $id):bool;
}