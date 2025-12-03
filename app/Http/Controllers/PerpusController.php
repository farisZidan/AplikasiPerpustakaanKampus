<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerpusController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Perpustakaan',
        ];
        return view('perpus.main', $data);
    }

    public function login() {
        $data = [
            'title' => 'Login Perpustakaan',
        ];
        return view('perpus.login', $data);
    }
}
