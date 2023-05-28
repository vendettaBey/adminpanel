@extends('panel.layout')

@section('content')
<h2 class="text-3xl font-bold text-dark text-center w-full mb-5">{{ strtoupper($urun->name) }} ürününü Düzenle</h2>

<div class="row">
    <div class="col-md-6">
        <form class="w-full max-w-lg" enctype="multipart/form-data" action="/blogDuzenleKaydet" method="POST">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-3">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Kategori Seçiniz
                </label>
                <select name="kategori_id" id="kategori_id" 
                class="select2 bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($kategoriler as $kategori)
                <option @if($kategori->id==$urun->kategori_id) {{ __("selected") }} @endif value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                @endforeach
            
                </select>
              </div>
            </div>
            <input type="hidden" name="id" value="{{ $urun->id }}">
            <input type="hidden" name="oldImage" value="{{ $urun->resim }}">
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Ürün Adı
                  </label>
                  <input name="name" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  type="text" value="{{ $urun->name }}" >
                </div>
              </div>    
              <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Ürün Açıklaması
                  </label>
                  <input name="aciklama" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  type="text" value="{{ $urun->aciklama }}">
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Ürün Resmi
                  </label>
                  <input name="image" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  type="file" value="{{ $urun->resim }}">
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Fiyat
                  </label>
                  <input name="fiyat" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  type="text" value="{{ $urun->fiyat }}">
                </div>
              </div>
            <button class="btn-save hover:bg-green-600 bg-green-900 text-white font-bold py-2 px-4 rounded">
                Kaydet
            </button>
            
            
          </form>
    </div>
    <div class="col-md-6">
        <h3 class="text-xl text-dark font-bold">Ürünün Fotosu</h3>
        <img style="width:100%;" src="{{ asset("adminassets/upload/urun/$urun->resim") }}" alt="{{ $urun->name }}">
    </div>
</div>

<script>
    
    $('.select2').select2();

</script>



@endsection