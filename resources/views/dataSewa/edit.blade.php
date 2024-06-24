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
                    <h3>Data Sewa Tenda</h3>
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
                    <h2>Edit Data Sewa</h2>
                    <form action="{{ route('dataSewa.update', $sewaTenda->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="alat_bahan_id">ID Alat Bahan</label>
                            <input type="text" name="alat_bahan_id" class="form-control" value="{{ $sewaTenda->alat_bahan_id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_sewa">Jml Sewa</label>
                            <input type="text" name="jumlah_sewa" class="form-control" value="{{ $sewaTenda->jumlah_sewa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_penyewa">Nama Penyewa</label>
                            <input type="text" name="nama_penyewa" class="form-control" value="{{ $sewaTenda->nama_penyewa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ $sewaTenda->no_hp }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kota_kabupaten">Kota/Kabupaten</label>
                            <input type="text" name="kota_kabupaten" class="form-control" value="{{ $sewaTenda->kota_kabupaten }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{ $sewaTenda->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tgl_sewa">Tgl Sewa</label>
                            <input type="date" name="tgl_sewa" class="form-control" value="{{ $sewaTenda->tgl_sewa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_kembali">Tgl Kembali</label>
                            <input type="date" name="tgl_kembali" class="form-control" value="{{ $sewaTenda->tgl_kembali }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>


@include('admin.dashboard.footer')