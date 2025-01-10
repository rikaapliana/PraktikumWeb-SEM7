<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Menampilkan dashboard
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Menampilkan daftar pengguna
     *
     * @return \Illuminate\View\View
     */
    public function users()
    {
        // Mendapatkan semua data pengguna
        $users = User::all(); // Lebih baik menggunakan all() jika tidak ada kondisi
        return view('users', compact('users'));
    }
}
