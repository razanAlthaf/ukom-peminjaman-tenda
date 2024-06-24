@include('admin.dashboard.header')

@include('laporan.sidebar')

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
                <h3>Data Sewa</h3>
            </div>
            <div class="page-content card py-3">
                <div class="container">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('dataSewa.export') }}" class="btn btn-primary mt-3 me-2">Export Data ke Word</a>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Penyewa</th>
                                <th>No HP</th>
                                <th>Kota/Kabupaten</th>
                                <th>Alamat</th>
                                <th>Tgl Sewa</th>
                                <th>Tgl Kembali</th>
                                <th>Jml Sewa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataSewa as $sewa)
                                <tr>
                                    <td>{{ $sewa->id }}</td>
                                    <td>{{ $sewa->nama_penyewa }}</td>
                                    <td>{{ $sewa->no_hp }}</td>
                                    <td>{{ $sewa->kota_kabupaten }}</td>
                                    <td>{{ $sewa->alamat }}</td>
                                    <td>{{ $sewa->tgl_sewa }}</td>
                                    <td>{{ $sewa->tgl_kembali }}</td>
                                    <td>{{ $sewa->jumlah_sewa }}</td>
                                    <td>
                                        <form action="{{ route('dataSewa.destroy', $sewa->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm pb-2"><i class="bi bi-x"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataSewa->links('vendor.pagination.custom') }}
                </div>
            </div>

            
    @include('admin.dashboard.footer')
