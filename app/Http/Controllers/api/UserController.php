<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

}
