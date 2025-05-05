<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Показывает список всех пользователей (только для администратора).
     */
    public function index()
    {
        // Авторизация: доступ только для is_admin = true
        $this->authorize('viewAny', User::class);

        $users = User::all();
        return response()->json($users); // или return view('users.index', compact('users'));
    }
}
