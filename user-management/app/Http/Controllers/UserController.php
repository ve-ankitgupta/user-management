<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\Factory;
use App\Services\UserService as Service;
use App\Http\Requests\User\Post as PostRequest;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
    protected $service;

    public function __construct(Service $service) {
        $this->service = $service;
    }

    public function list(Request $request, Factory $view) {
        return $view->make('user.list', ['list' => $this->service->list($request)]);
    }

    public function create(Factory $view) {
        return $view->make('user.create');
    }

    public function store(PostRequest $request, Redirector $redirector) {
        $this->service->store($request);
        return $redirector->route('userlist');
    }

    public function delete(Request $request, Redirector $redirector) {
        $this->service->delete($request);
        return $redirector->route('userlist');
    }
}
