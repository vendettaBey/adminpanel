    <h2 class="text-2xl text-center font-bold mb-2">Yeni Sipariş</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="siparisAdi">Sipariş Adı</label>
                <input type="text" class="form-control" id="siparisAdi[]" placeholder="Sipariş Adı">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="siparisAdi">Ürün</label>
                <select name="urunler[]" id="urunler" class="form-control">
                    <option value="goralı">1</option>
                    <option value="sosisli">2</option>
                    <option value="zıkkım">3</option>
                    @foreach ($urunler as $urun)
                        <option value="{{ $urun->id }}">{{ $urun->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <label for="icecekler">Menü İçecek</label>
            <select name="icecekler[]" id="icecekler" class="form-control">
                <option value="kola">1</option>
                <option value="ayran">2</option>
                <option value="fanta">3</option>
            </select>
        </div>
        <div class="col-md-12">
            <label class="w-full" for="icecekler">Sipariş Notu</label>
            <textarea class="w-full" name="not[]" id="not" cols="30" placeholder="Sipariş notu giriniz..."
                rows="10"></textarea>
        </div>
