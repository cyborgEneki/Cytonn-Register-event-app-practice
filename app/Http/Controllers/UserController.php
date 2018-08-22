<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use \App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;

class UserController extends Controller
{
    protected $usersRepository;

    /**
     * UserController constructor.
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->middleware('auth');

        $this->usersRepository = $usersRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = $this->usersRepository->getUsers();

        return response()->json($users);

    }

    public function store(UserRequest $request)
    {

        $this->usersRepository->postNewUser($request);

        return redirect('/users_blade')->with('success', 'User added successfully');
    }

    public function show($id)
    {
        $user = $this->usersRepository->getUser($id);

        return view('users.show')->with('user', $user);

    }

    public function create(Request $request)
    {
        return view ('users.create');
    }

    public function edit($id)
    {
        $user = $this->usersRepository->getUser($id);

        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $this->usersRepository->updateUser($request, $id);

        return redirect('/users_blade')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $this->usersRepository->deleteUser($id);

        return redirect('/users_blade')->with('success', 'User deleted successfully');
    }
}
