<?php
namespace App\Repositories\User;

use App\Repositories\IRepository;

interface IUser  {
    public function paginate (int $paginate);
}