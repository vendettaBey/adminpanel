@extends('panel.layout')

@section('content')

<h2 class="text-2xl text-center font-bold">Ürünler</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>Kategori Adı</td>
            <td>Ürün Adı</td>
            <td>Ürün Açıklaması</td>
            <td>Ürün Resmi</td>
            <td>Ürün Fiyat</td>
            <td>İşlemler</td>
        </tr>
    </thead>
    <tbody>
        @if($urunler!=null)
            @foreach ($urunler as $urun)
                <tr>
                    <td>{{ $urun->kategori_id }}</td>
                    <td>{{ $urun->name }}</td>
                    <td>{{ $urun->aciklama }}</td>
                    <td>
                        <img height="200" width="200" src="{{ asset("adminassets/upload/urun/$urun->resim") }}" alt="{{ $urun->resim }}">
                    </td>
                    <td>{{ $urun->fiyat }}</td>
                    <td>
                        <a
                        class="btn btn-block btn-primary bg-blue-600 hover:bg-blue-400 text-white text-center" 
                        href="{{ route('urunDuzenle',["urunId" => $urun->id ]) }}">Düzenle</a>

                        <form action="{{ route('urunSil',["urunId" => $urun->id ]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn w-full btn-danger bg-red-600 hover:bg-red-400 text-white text-center">Sil</button>
                        </form>


                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>



@if(session('successUrun'))
<script>
    swal.fire({
        title: 'Başarılı!',
        text: '{{ session('successUrun') }}',
        icon: 'success',
        confirmButtonText: 'Tamam',
        timer: 5000
    })
</script>
@php
    session()->forget('successUrun');
@endphp
@endif
@if(session('successUrunUpdate'))
<script>
    swal.fire({
        title: 'Başarılı!',
        text: '{{ session('successUrunUpdate') }}',
        icon: 'success',
        confirmButtonText: 'Tamam',
        timer: 5000
    })
</script>
@php
    session()->forget('successUrunUpdate');
@endphp
@endif
@if(session('successUrunDelete'))
<script>
    swal.fire({
        title: 'Başarılı!',
        text: '{{ session('successUrunDelete') }}',
        icon: 'success',
        confirmButtonText: 'Tamam',
        timer: 5000
    })
</script>
@php
    session()->forget('successUrunDelete');
@endphp
@endif



@endsection