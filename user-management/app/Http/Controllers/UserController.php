<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService as Service;

class UserController extends Controller
{
    protected $service;

    public function __construct(Service $service) {
        $this->service = $service;
    }

    public function list(Request $request) {
        return $this->service->list($request);
    }
}
