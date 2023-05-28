@extends('panel.layout')

@section('content')
<h2 class="text-6xl font-bold text-center w-full mb-5">Kategoriler</h2>

<div class="row">
    <div class="col-md-6">
        <form class="w-full max-w-lg" action="/kategoriKaydet" method="POST">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Kategori Adı
                </label>
                <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"type="text">
              </div>
            </div>
        
            <button class="btn-save hover:bg-green-600 bg-green-900 text-white font-bold py-2 px-4 rounded">
                Kaydet
            </button>
            
            
          </form>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kategori Adı</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @if($kategoriler!=null)
                @foreach ($kategoriler as $kategori)
                    <tr>
                        <td class="text-2xl font-bold">{{ $kategori->name }}</td>
                        <td>
                            <a href="{{ route('kategoriDuzenle', ['categoryId' => $kategori->id]) }}" 
                                class="btn-block text-center hover:bg-blue-600 bg-blue-900 text-white font-bold py-2 px-4 rounded">
                                Düzenle
                            </a>
                            <form action="/kategoriSil" class="w-full my-2" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="kategoriId" value="{{ $kategori->id }}">
                                <button type="submit" class="w-full hover:bg-red-600 bg-red-900 text-white font-bold py-2 px-4 rounded">
                                    Sil
                                </button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@if(session('success'))
<script>
    swal.fire({
        title: 'Başarılı!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'Tamam',
        timer: 5000
    })
</script>
@php
    session()->forget('success');
@endphp
@endif
@if(session('successDelete'))
<script>
    swal.fire({
        title: 'Başarılı!',
        text: '{{ session('successDelete') }}',
        icon: 'success',
        confirmButtonText: 'Tamam',
        timer: 5000
    })
</script>
@php
    session()->forget('success');
@endphp
@endif
@if(session('successUpdate'))
<script>
    swal.fire({
        title: 'Başarılı!',
        text: '{{ session('successUpdate') }}',
        icon: 'success',
        confirmButtonText: 'Tamam',
        timer: 5000
    })
</script>
@php
    session()->forget('successUpdate');
@endphp
@endif
@endsection