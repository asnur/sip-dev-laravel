<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RequireDataChatController extends Controller
{
    public function save($kel, Request $request)
    {
        $user_admin = User::where('name', 'ADMIN-' . $kel)->first();
        return $user_admin->id;
    }
}
