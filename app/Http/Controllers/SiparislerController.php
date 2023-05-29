<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siparisler;
use App\Models\Urunler;
use Illuminate\Support\Facades\Auth;

class SiparislerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('panel.siparisler.siparisler', compact('user'));
    }

    public function yeniSiparis()
    {
        $user = Auth::user();
        return view('panel.siparisler.siparisEkle', compact('user'));
    }

    public function siparisEkranTemizle()
    {
        session()->forget('siparisler');
        return redirect()->route('yeniSiparis')->with('successEkranTemizle', 'Sipariş ekranı başarıyla temizlendi.');
    }


    public function ekranaYeniSiparis(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();

        if ($data['islem'] == "yeniSiparis") {
            $siparisler[] = [];
            session()->put('siparisler', $siparisler);
        }

        $urunler = Urunler::all();

        return view('panel.siparisler.siparisEkraniForm', compact('user', 'urunler'));
    }


    public function siparisFinalKaydet(Request $request)
    {
        $data = $request->all();
        $donus = count($data['urunler']);

        for ($i = 0; $i < $donus; $i++) {
            $veriler[] = [
                "urunler" => $data['urunler'][$i],
                "icecekler" => $data['icecekler'][$i],
                "not" => $data['not'][$i],
            ];
        }

        echo "<pre>";
        print_r($veriler);
    }



}