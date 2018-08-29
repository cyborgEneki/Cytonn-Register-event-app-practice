<?php

namespace App\Http\Controllers\Api;

use App\Repositories\RolesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //
    private $rolesRepository;

    public function __construct(RolesRepository $rolesRepository)
    {
        $this->rolesRepository = $rolesRepository;
    }

    public function index()
    {
        $roles = $this->rolesRepository->getRoles();

        return response()->json($roles);
    }
}
