@include('admin.dashboard.header')

@include('dataSewa.sidebar')

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
                <div class="container">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('sewa_tendas.create') }}" class="btn btn-primary mt-3 me-2">Tambah Sewa Tenda</a>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Sewa</th>
                                <th>Nama Penyewa</th>
                                <th>No. HP</th>
                                <th>Kota/Kabupaten</th>
                                <th>Alamat</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sewaTendas as $sewaTenda)
                            <tr>
                                <td>{{ $sewaTenda->id }}</td>
                                <td>{{ $sewaTenda->alatBahan->nama_barang }}</td>
                                <td>{{ $sewaTenda->jumlah_sewa }}</td>
                                <td>{{ $sewaTenda->nama_penyewa }}</td>
                                <td>{{ $sewaTenda->no_hp }}</td>
                                <td>{{ $sewaTenda->kota_kabupaten }}</td>
                                <td>{{ $sewaTenda->alamat }}</td>
                                <td>{{ $sewaTenda->tgl_sewa }}</td>
                                <td>{{ $sewaTenda->tgl_kembali }}</td>
                                <td>
                                    <a href="{{ route('sewa_tendas.edit', $sewaTenda->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('sewa_tendas.destroy', $sewaTenda->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sewaTendas->links('vendor.pagination.custom') }}
                </div>
            </div>

            
    @include('admin.dashboard.footer')
