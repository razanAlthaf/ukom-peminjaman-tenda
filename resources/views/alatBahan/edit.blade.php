@include('admin.dashboard.header')
@include('alatBahan.sidebar')

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="d-flex">
                <div class="page-heading">
                    <h3>Data Tenda</h3>
                </div>
                <a href="/profile" class="card ms-auto justify-center">
                    <div class="card-body py-2 px-2">
                        <div class="d-flex align-items-center">
                            <div class="mt-2 me-2 name">
                                <h6 class="font-bold">{{ Auth::user()->name }}</h6>
                            </div>
                            <div class="avatar avatar-l">
                                <img src="{{ asset('dist/assets/compiled/jpg/2.jpg') }}" alt="Face 1">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="page-content">
                <div class="container mt-5">
                    <h2>Edit Alat Bahan</h2>
                    <form action="{{ route('alatBahans.update', $alatBahan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="{{ $alatBahan->nama_barang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" name="merk" class="form-control" value="{{ $alatBahan->merk }}" required>
                        </div>
                        <div class="form-group">
                            <label for="spek">Spesifikasi</label>
                            <textarea name="spek" class="form-control" required>{{ $alatBahan->spek }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <input type="text" name="kondisi" class="form-control" value="{{ $alatBahan->kondisi }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang" class="form-control" value="{{ $alatBahan->jumlah_barang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" value="{{ $alatBahan->harga }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>


@include('admin.dashboard.footer')