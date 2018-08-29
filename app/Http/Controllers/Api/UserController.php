<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function index() {
        $users = $this->usersRepository->getUsers();

        return response()->json($users);
    }
}
