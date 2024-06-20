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
                <h3>Data Tenda</h3>
            </div>
            <div class="page-content card">
                <div class="table-responsive">
                <div class="container">
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-primary mt-3 me-2" data-toggle="modal" data-target="#createAlatBahanModal">Tambah Barang</button>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Merk</th>
                            <th>Spesifikasi Barang</th>
                            <th>Kondisi</th>
                            <th>Jumlah Barang</th>
                            <th>Harga/malam</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($alatBahans as $alatBahan)
                            <tr>
                                <td>{{ $alatBahan->id }}</td>
                                <td>{{ $alatBahan->nama_barang }}</td>
                                <td>{{ $alatBahan->merk }}</td>
                                <td>{{ $alatBahan->spek }}</td>
                                <td>{{ $alatBahan->kondisi }}</td>
                                <td>{{ $alatBahan->jumlah_barang }}</td>
                                <td>{{ $alatBahan->harga }}</td>
                                <td>
                                    <a href="{{ route('alatBahans.edit', $alatBahan->id) }}" class="btn btn-warning btn-sm pb-2"><i data-feather="edit" class="bi bi-pencil"></i></a>
                                    <form action="{{ route('alatBahans.destroy', $alatBahan->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm pb-2"><i class="bi bi-x"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $alatBahans->links() }}
                </div>
            </div>
                
                <!-- Modal -->
                <div class="modal fade" id="createAlatBahanModal" tabindex="-1" role="dialog" aria-labelledby="createAlatBahanModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createAlatBahanModalLabel">Tambah Alat Bahan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('alatBahans.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" name="nama_barang" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="merk">Merk</label>
                                        <input type="text" name="merk" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="spek">Spesifikasi</label>
                                        <textarea name="spek" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="kondisi">Kondisi</label>
                                        <input type="text" name="kondisi" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_barang">Jumlah Barang</label>
                                        <input type="number" name="jumlah_barang" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" name="harga" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    @include('admin.dashboard.footer')
