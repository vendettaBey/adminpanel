<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    //
    public function dashboard()
    {
        $user = auth()->user();
        $site = \App\Models\Ayarlar::find(1);
        return view('panel.index', compact('user', 'site'));
    }
}