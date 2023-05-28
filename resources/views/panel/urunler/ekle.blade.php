@extends('panel.layout')

@section('content')
<h2 class="text-6xl font-bold text-center w-full mb-5">Ürün Ekle</h2>

<div class="row">
    <div class="col-md-12">
        <form class="w-full max-w-lg" enctype="multipart/form-data" action="/urunKaydet" method="POST">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-3">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Kategori Seçiniz
                </label>
                <select name="kategori_id" id="kategori_id" 
                class="select2 bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($kategoriler as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                @endforeach
            
                </select>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Ürün Adı
                  </label>
                  <input name="name" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  type="text">
                </div>
              </div>    
              <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Ürün Açıklaması
                  </label>
                  <input name="aciklama" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  type="text">
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Ürün Resmi
                  </label>
                  <input name="image" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  type="file">
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Fiyat
                  </label>
                  <input name="fiyat" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  type="text">
                </div>
              </div>
            <button class="btn-save hover:bg-green-600 bg-green-900 text-white font-bold py-2 px-4 rounded">
                Kaydet
            </button>
            
            
          </form>
    </div>
</div>

<script>
    
    $('.select2').select2();

</script>



@endsection