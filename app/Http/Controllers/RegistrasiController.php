<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function registrasi(Request $request)
    {
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));

        Registrasi::create([
            'username' => $username,
            'password' => $password,
        ]);
        return $this->responseHasil(200, true, "Registrasi Berhasil");
    }
}