<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index() {
        $fakultas = Fakultas::with('prodi')->get();
        return view('fakultas', ['fakultas' => $fakultas]);
    }
}
