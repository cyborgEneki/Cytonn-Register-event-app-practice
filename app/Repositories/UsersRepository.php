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

class UsersRepository
{
    public function __construct()
    {
    }

    public function getUsers()
    {
        $users = User::all();

        return $users;
    }

    public function getUser($id)
    {
        $user = User::find($id);

        return $user;
    }

    public function postNewUser(Request $request)
    {


        $userDetails=$request->all();
        $userDetails["password"]=base64_encode(random_bytes(10));


        $user = User::create($userDetails);
        Mail::to($user)->queue( new PasswordCreated($user,$userDetails["password"]));
        return $user;
    }

    public function updateUser($request, $id)
    {
        $user = $this->getUser($id);

        $user->name = $request->get('name');

        $user->email = $request->get('email');

        $user->password = $request->get('password');

        $user->role = $request->get('role');

        return $user->save();
    }

    public function deleteUser($id)
    {
        $user = $this->getUser($id);

        $user->delete();

        return $user;
    }
}