<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\Urunler;
use Illuminate\Support\Facades\Validator;


class PanelController extends Controller
{
    //
    public function dashboard()
    {
        $user = auth()->user();
        $site = \App\Models\Ayarlar::find(1);
        return view('panel.index', compact('user', 'site'));
    }

    public function kategoriEkle()
    {
        $user = Auth::user();
        $kategoriler = Kategori::all();
        return view('panel.kategori.ekle', compact('user', 'kategoriler'));
    }

    public function kategoriKaydet(Request $request)
    {
        $data = $request->all();
        $kategori = new Kategori();
        $kategori->name = $data['name'];
        $kategori->created_at = now();

        $kategori->save();


        return redirect()->route('kategoriEkle')->with('success', 'Kategori başarıyla eklendi.');

    }

    public function kategoriDuzenle($id)
    {
        $user = Auth::user();
        $kategori = Kategori::where('id', $id)->first();

        return view('panel.kategori.duzenle', compact('user', 'kategori'));
    }


    public function kategoriUpdate(Request $request)
    {
        $data = $request->all();
        $kategori = Kategori::find($data['kategoriId']);
        $kategori->name = $data['name'];
        $kategori->updated_at = now();
        $kategori->save();
        return redirect()->route('kategoriEkle')->with('successUpdate', 'Kategori başarıyla güncellendi.');
    }


    public function kategoriSil(Request $request)
    {
        $data = $request->all();

        $kategori = Kategori::find($data['kategoriId']);
        $kategori->delete();
        return redirect()->route('kategoriEkle')->with('successDelete', 'Kategori başarıyla silindi.');
    }


    //! Ürünler

    public function urunEkle()
    {
        $user = Auth::user();
        $kategoriler = Kategori::all();
        return view('panel.urunler.ekle', compact('user', 'kategoriler'));
    }

    public function urunKaydet(Request $request)
    {
        $data = $request->all();
        $urun = new Urunler();
        $urun->kategori_id = $data['kategori_id'];
        $urun->name = $data['name'];
        $urun->slug = strtolower(trim(str_replace($data['name'], " ", "-")));
        $urun->aciklama = $data['aciklama'];
        $urun->fiyat = $data['fiyat'];
        $urun->created_at = now();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/adminassets/upload/urun');
            $image->move($destinationPath, $name);
            $urun->resim = $name;
        }

        $urun->save();

        return redirect()->route('urunler')->with('successUrun', 'Ürün başarıyla eklendi.');

    }

    public function urunDuzenle($id)
    {
        $user = Auth::user();
        $urun = Urunler::where('id', $id)->first();
        $kategoriler = Kategori::all();
        return view('panel.urunler.duzenle', compact('user', 'urun', 'kategoriler'));
    }

    public function blogDuzenleKaydet(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'aciklama' => 'required',
            'kategori_id' => 'required',
            'fiyat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        $urunInfo = Urunler::where('id', $data['id'])->first();

        $urunInfo->name = $data['name'];
        $urunInfo->slug = strtolower(trim(str_replace($data['name'], " ", "-")));
        $urunInfo->aciklama = $data['aciklama'];
        $urunInfo->kategori_id = $data['kategori_id'];
        $urunInfo->fiyat = $data['fiyat'];
        $urunInfo->updated_at = date('Y-m-d H:i:s');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/adminassets/upload/urun');
            $image->move($destinationPath, $name);
            $urunInfo->resim = $name;
        } else {
            $urunInfo->resim = $data['oldImage'];
        }

        $urunInfo->save();

        return redirect()->route('urunler')->with('successUrunUpdate', 'Ürün başarıyla güncellendi!');
    }


    public function urunSil($id)
    {
        $urun = Urunler::where('id', $id)->first();
        $urun->delete();
        return redirect()->route('urunler')->with('successUrunDelete', 'Ürün başarıyla silindi.');
    }

    public function urunler()
    {
        $user = Auth::user();
        $urunler = Urunler::all();
        return view('panel.urunler.liste', compact('user', 'urunler'));
    }

}