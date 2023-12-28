<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saldo;

class HomeController extends Controller
{
    public function index()
    {
        $saldo = Saldo::first();
        return view('pages.home.index', [
            'saldo' => $saldo
        ]);
    }
}
