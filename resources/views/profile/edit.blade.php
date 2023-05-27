@extends('panel.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs tabs-primary">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#main" data-bs-toggle="tab">Genel Bilgiler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#other" data-bs-toggle="tab">Diğer Bilgiler</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="main" class="tab-pane active">
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <div class="max-w-xl">
                                        @include('profile.partials.update-profile-information-form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="other" class="tab-pane">
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <div class="max-w-xl">
                                        <h2 class="text-lg font-medium text-gray-900">
                                            Diğer Bilgilerim
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600 mb-6">
                                            Diğer bilgilerinizi düzenleyin.
                                        </p>
                                        <form role="info" action="/userInfo" class="needs-validation">
                                            @csrf
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">
                                                    Ad Soyad
                                                </label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="text" name="name"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->name }} @endif"
                                                        placeholder="Ad Soyad" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Email</label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="email" name="email"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->email }} @endif"
                                                        placeholder="Email Adresi" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Telefon</label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="text" name="phone"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->phone }} @endif"
                                                        placeholder="Telefon Numarası" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Firma
                                                    Adı</label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="text" name="company" placeholder="Firma Adı"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->company }} @endif">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Vergi
                                                    / TC No</label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="text" name="kimlik"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->kimlik }} @endif"
                                                        placeholder="TC Kimlik No / Vergi No">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Vergi
                                                    Dairesi</label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="text" name="vdaire"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->vdaire }} @endif"
                                                        placeholder="Vergi Dairesi">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Ülke
                                                </label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="text" name="country"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->country }} @endif"
                                                        placeholder="Türkiye">
                                                </div>

                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Şehir
                                                </label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="text" name="city"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->city }} @endif"
                                                        placeholder="İstanbul">
                                                </div>

                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">İlçe
                                                </label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="text" name="district"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->district }} @endif"
                                                        placeholder="Avcılar">
                                                </div>
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Posta
                                                    Kodu
                                                </label>
                                                <div class="col-lg-9">
                                                    <input
                                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                                        type="text" name="zipCode"
                                                        value="@if (isset(Auth::user()->info)) {{ Auth::user()->info->zip }} @endif"
                                                        placeholder="Posta Kodu">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Adres</label>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control h-auto py-2" name="address" rows="5" placeholder="Açık adresinizi giriniz">
                                                        @if (isset(Auth::user()->info))
{{ Auth::user()->info->address }}
@endif
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="form-group col-lg-3">
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                        Kaydet
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(e) {
            e.preventDefault();
            $('#info').submit(function() {
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: (data) => {
                        this.reset();
                        alert('Başarılı');
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        })
    </script>

    @if (session('successUserInfo'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Başarılı',
                text: 'Bilgileriniz başarıyla güncellendi.',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        @php
            Session::forget('successUserInfo');
        @endphp
    @endif

    <script>
        //! Tab Hatırlayıcı

        // Tarayıcı depolama nesnesine erişmek için kullanılan fonksiyon
        function getStorage() {
            if (typeof localStorage !== 'undefined') {
                return localStorage; // Local Storage
            } else {
                return sessionStorage; // Session Storage
            }
        }

        // Bulunduğu tabı saklamak için kullanılan anahtar
        const tabKey = 'currentTab';

        // Tabları dinle ve kaydet
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.nav-link[data-bs-toggle="tab"]');

            tabs.forEach(function(tab) {
                tab.addEventListener('click', function() {
                    const currentTab = getStorage();
                    currentTab.setItem(tabKey, this.getAttribute('href'));
                });
            });
        });

        // Sayfa yüklendiğinde çalışacak işlev
        window.addEventListener('load', function() {
            // Depolamadaki bulunduğu tabı al
            const currentTab = getStorage().getItem(tabKey);

            if (currentTab) {
                // Bulunduğu tabı seçili hale getir
                document.querySelector(`.nav-link[href="${currentTab}"]`).click();
            }
        });

        // Sayfa yenilendiğinde çalışacak işlev
        window.addEventListener('beforeunload', function() {
            // Bulunduğu tabı depolamaya kaydet
            const currentTab = getStorage();
            const activeTab = document.querySelector('.nav-link.active');
            currentTab.setItem(tabKey, activeTab.getAttribute('href'));
        });
    </script>
@endsection
