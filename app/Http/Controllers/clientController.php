<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;

class clientController extends Controller
{
    //

    public function index(){
        $pemesanan = pemesanan::all();
        return view('resepsionis.client', compact ('pemesanan'));
    }
}
