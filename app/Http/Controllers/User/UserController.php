<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getUsers()
    {
        try{

            $users = User::all();
            return response()->json(["status" => true, "users" => $users],200);

        }catch(\Exception $e){

            return response()->json(["status" => false, "message" => $e->getMessage()],500);

        }

    }
}
