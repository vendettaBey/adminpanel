@extends('panel.layout')

@section('content')
    <h2 class="text-2xl text-center font-bold mt-2 mb-5">Yeni Sipariş Ekranı</h2>


    <div class="row">
        <div class="col-md-12 d-flex justify-end">
            <a href="/siparisEkranTemizle"
                class="px-4 py-2 bg-green-800 text-white font-semibold rounded-md hover:bg-green-400">Ekranı
                Temizle</a>
            <form method="POST" action="/siparisEkrani" id="siparisEkleForm">
                @csrf
                <button type="submit" id="siparisEkleBtn"
                    class="px-4 w-full py-2 bg-red-800 text-white font-semibold rounded-md hover:bg-red-400">Yeni Sipariş
                    Ekle</button>
            </form>
        </div>
    </div>
    <form action="" id="finalSiparis">
        @csrf
        <div id="siparisEkrani" class="container"></div>

        <div class="row d-none" id="btnArea">
            <div class="col-md-12 text-center">
                <button type="submit" id="siparisEkleBtn"
                    class="px-4 w-25 py-2 bg-red-800 text-white font-semibold rounded-md hover:bg-red-400">Yeni
                    Sipariş
                    Kaydet</button>
            </div>
        </div>


    </form>

    <script>
        $(document).ready(function(e) {
            $("#siparisEkleForm").submit(function(e) {
                e.preventDefault();

                if ($("#siparisEkrani").html() != "") {
                    $.ajax({
                        url: "/ekranaYeniSiparis",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "islem": "yeniSiparis"
                        },
                        success: function(response) {
                            $("#siparisEkrani").html(function(i, existingContent) {
                                return existingContent + "<hr>" + response;
                            });

                        }
                    });

                } else {
                    $.ajax({
                        url: "/ekranaYeniSiparis",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "islem": "yeniSiparis"
                        },
                        success: function(response) {
                            $("#siparisEkrani").html(response);
                            $("#btnArea").removeClass("d-none");
                            $("#btnArea").removeClass("d-block");
                        }
                    });
                }


            })

            $("#finalSiparis").submit(function(e) {
                e.preventDefault();
                var data = $(this).serializeArray();
                $.ajax({
                    url: "/siparisFinalKaydet",
                    type: "POST",
                    data: data,
                    success: function(response) {
                        console.log(response);
                    }
                })
            });



        })
    </script>


    @if (session('successEkranTemizle'))
        <script>
            swal.fire({
                title: 'Başarılı!',
                text: '{{ session('successEkranTemizle') }}',
                icon: 'success',
                confirmButtonText: 'Tamam',
                timer: 5000
            })
        </script>
    @endif
@endsection
