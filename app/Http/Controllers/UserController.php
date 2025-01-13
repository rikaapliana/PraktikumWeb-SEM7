<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Barryvdh\DomPDF\Facade\pdf;

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

    public function printPdf()
{
    $users = User::get();
    $data = [
        'title' => 'Welcome To fti.uniska-bjm.ac.id',
        'date' => date('m/d/Y'),
        'users' => $users
    ];
    $pdf = PDF::loadview('mypdf', $data);
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream('Data User.pdf', ["attachment" => false]);
}

public function userExcel()
{
    $users = User::get(); // Ubah variabel $user menjadi $users
    $data = [
        'title' => 'Welcome To fti.uniska-bjm.ac.id',
        'date' => date('m/d/Y'),
        'users' => $users // Pastikan ini konsisten dengan $users
    ];
    return view('userexcel', $data);
}

}
