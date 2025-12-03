<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class infoController extends Controller
{
    public function infoMhs($kd)
    {
        return view('info', ['progdi' => $kd]);
    }
}
