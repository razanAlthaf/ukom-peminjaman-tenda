@include('admin.dashboard.header')

@include('sewa_tendas.sidebar')


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
            <div class="page-heading">
                <h3>Sewa tenda</h3>
            </div>
            <div class="page-content">
                <div class="container">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row mt-4">
                        @foreach ($alatBahans as $alatBahan)
                            <div class="col-12 col-lg-4 mb-4">
                                <div class="card">
                                    <img src="{{ asset('assets/images/' . $alatBahan->images) }}" class="card-img-top"
                                        alt="{{ $alatBahan->nama_barang }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $alatBahan->nama_barang }}</h5>
                                        <p class="card-text">{{ $alatBahan->spek }}</p>
                                        <p class="card-text">Kondisi: {{ $alatBahan->kondisi }}</p>
                                        <p class="card-text">Jumlah Barang: {{ $alatBahan->jumlah_barang }}</p>
                                        <p class="card-text">Harga: Rp.
                                            {{ number_format($alatBahan->harga, 0, ',', '.') }}.000</p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#sewaModal-{{ $alatBahan->id }}">Sewa</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="sewaModal-{{ $alatBahan->id }}" tabindex="-1"
                                aria-labelledby="sewaModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('sewa_tendas.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="sewaModalLabel">Sewa
                                                    {{ $alatBahan->nama_barang }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="alat_bahan_id"
                                                    value="{{ $alatBahan->id }}">
                                                <div class="mb-3">
                                                    <label for="jumlah_sewa" class="form-label">Jumlah Sewa</label>
                                                    <input type="number" class="form-control" id="jumlah_sewa"
                                                        name="jumlah_sewa" min="1" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
                                                    <input type="text" class="form-control" id="nama_penyewa"
                                                        name="nama_penyewa" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_hp" class="form-label">No. HP</label>
                                                    <input type="text" class="form-control" id="no_hp"
                                                        name="no_hp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kota_kabupaten"
                                                        class="form-label">Kota/Kabupaten</label>
                                                    <input type="text" class="form-control" id="kota_kabupaten"
                                                        name="kota_kabupaten" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tgl_sewa" class="form-label">Tanggal Sewa</label>
                                                    <input type="date" class="form-control" id="tgl_sewa"
                                                        name="tgl_sewa" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tgl_kembali" class="form-label">Tanggal
                                                        Kembali</label>
                                                    <input type="date" class="form-control" id="tgl_kembali"
                                                        name="tgl_kembali" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Sewa</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</script>


@include('admin.dashboard.footer')
