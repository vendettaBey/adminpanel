@extends('panel.layout')

@section('content')
<h2>Kategori Ekle</h2>

<div class="row">
    <div class="col-md-6">
        <form class="w-full max-w-lg" action="/kategoriUpdate" method="POST">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Kategori Adı
                </label>
                <input type="hidden" name="kategoriId" value="{{ $kategori->id }}">
                <input name="name" value="{{ $kategori->name }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"type="text">
              </div>
            </div>
        
            <button class="btn-save hover:bg-green-600 bg-green-900 text-white font-bold py-2 px-4 rounded">
                Kaydet
            </button>
            
            
          </form>
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
@endsection