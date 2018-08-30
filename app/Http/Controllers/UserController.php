<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use App\Repositories\RolesRepository;

class UserController extends Controller
{
    private $usersRepository;

    private $rolesRepository;

    /**
     * UserController constructor.
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository, RolesRepository $rolesRepository)
    {
        $this->middleware('auth');

        $this->usersRepository = $usersRepository;

        $this->rolesRepository = $rolesRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = $this->usersRepository->getUsers();

        return view('users.index')->with('users', $users);
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(UserRequest $request)
    {
        $this->usersRepository->createUser($request);

        return redirect('/users_blade')->with('success', 'User added successfully');
    }

    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    public function create()
    {
        $roles = $this->rolesRepository->getRoles();

        return view('users.create')->with('roles', $roles);
    }

    public function edit(User $user)
    {
        $roles = $this->rolesRepository->getRoles();

        return view('users.edit')->with(['user' => $user, 'roles' => $roles]);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->usersRepository->updateUser($request, $user);

        return redirect('/users_blade')->with('success', 'User updated successfully');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $this->usersRepository->deleteUser($user);

        return redirect('/users_blade')->with('success', 'User deleted successfully');
    }
}
