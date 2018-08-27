<?php
/**
 * Created by PhpStorm.
 * User: jeneki
 * Date: 15/08/2018
 * Time: 5:50 PM
 */

namespace App\Repositories;

use App\Mail\PasswordCreated;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class UsersRepository
{
    public function __construct()
    {
    }

    public function getUsers()
    {
        $users = User::with('roles')
            ->orderBy('name', 'asc')
            ->paginate(15);

        return $users;
    }

    public function getUser($id)
    {
        $user = User::find($id);

        return $user;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function createUser(Request $request)
    {
        $userDetails=$request->all();

        $userDetails["password"]=base64_encode(random_bytes(10));

//        $userDetails["password"] = Hash::make(str_random(8));

        $user = User::create($userDetails);

        $user->roles()->sync($request["role_id"]);

        Mail::to($user)->queue( new PasswordCreated($user,$userDetails["password"]));

        return $user;
    }

//    public function postNewUserToRoleUser(Request $request)
//    {
//        $user = User::create($request->except("role_id"));
//
//        $user->roles()->sync($request["role_id"]);
//
//        return $user;
//    }

    public function updateUser(Request $request, User $user)
    {
        $user->update($request->except('role_id'));

        $user->roles()->sync($request["role_id"]);

        return $user;
    }

    /**
     * @param User $user
     * @return User
     * @throws \Exception
     */
    public function deleteUser(User $user)
    {
        $user->roles()->detach();

        $user->delete();

        return $user;
    }
}