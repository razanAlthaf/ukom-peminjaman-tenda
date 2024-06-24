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
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            Edit Sewa Tenda
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sewa_tendas.update', $sewaTenda->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="jumlah_sewa" class="form-label">Jumlah Sewa</label>
                                    <input type="number" class="form-control" id="jumlah_sewa" name="jumlah_sewa" min="1" value="{{ $sewaTenda->jumlah_sewa }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
                                    <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" value="{{ $sewaTenda->nama_penyewa }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $sewaTenda->no_hp }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kota_kabupaten" class="form-label">Kota/Kabupaten</label>
                                    <input type="text" class="form-control" id="kota_kabupaten" name="kota_kabupaten" value="{{ $sewaTenda->kota_kabupaten }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $sewaTenda->alamat }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_sewa" class="form-label">Tanggal Sewa</label>
                                    <input type="date" class="form-control" id="tgl_sewa" name="tgl_sewa" value="{{ $sewaTenda->tgl_sewa }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                                    <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="{{ $sewaTenda->tgl_kembali }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


@include('admin.dashboard.footer')