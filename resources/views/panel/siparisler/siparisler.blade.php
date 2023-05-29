@extends('panel.layout')

@section('content')

<h2 class="text-2xl text-center font-bold text-uppercase mb-5">Siparişlerim</h2>


<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item w-25" role="presentation">
      <button class="nav-link w-full active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Bugün</button>
    </li>
    <li class="nav-item w-25" role="presentation">
      <button class="nav-link w-full" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Dün</button>
    </li>
    <li class="nav-item w-25" role="presentation">
      <button class="nav-link w-full" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Tarih Aralıklı</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">,

        <h2 class="text-center text-2xl font-bold my-5">Bugünkü Siparişlerim</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sipariş Adı</th>
                    <th>Sipariş İçeriği</th>
                    <th>Sipariş Ekstra</th>
                    <th>Sipariş Notu</th>
                    <th>Sipariş Tutar</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

        <h2 class="text-center text-2xl font-bold my-5">Dünkü Siparişlerim</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sipariş Adı</th>
                    <th>Sipariş İçeriği</th>
                    <th>Sipariş Ekstra</th>
                    <th>Sipariş Notu</th>
                    <th>Sipariş Tutar</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>


    </div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

        <h2 class="text-center text-2xl font-bold my-5">Tarih Aralıklı Sipariş</h2>

        <div class="max-w-lg mx-auto my-5">
            <form method="POST" action="/zamanliFormGetir">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="start-date" class="block text-gray-700 font-bold mb-2">Başlangıç Tarihi:</label>
                            <input type="date" id="start-date" name="start-date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="end-date" class="block text-gray-700 font-bold mb-2">Bitiş Tarihi:</label>
                            <input type="date" id="end-date" name="end-date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400">
                          </div>
                    </div>
                </div>
              <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Gönder</button>
            </form>
         </div>
          


        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sipariş Adı</th>
                    <th>Sipariş İçeriği</th>
                    <th>Sipariş Ekstra</th>
                    <th>Sipariş Notu</th>
                    <th>Sipariş Tutar</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>


    </div>
  </div>




@endsection