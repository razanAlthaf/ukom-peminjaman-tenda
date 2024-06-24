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
                    <h3>Dashboard</h3>
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
                <h2 class="mb-2">Halo, {{ Auth::user()->name }}👋</h2>
                <div class="col-10">
                    <div class="card">
                        <div class="card-body py-4 px-4">
                            <h3>Kesini Karena Mau Nanjak❓</h3>
                            <h5 class=" my-3">Pas banget {{ Auth::user()->name }} masuk ke sini. Kita disini
                                menyediakan sewa tenda kalo kamu belum punya tenda loo😊</h5>
                            <h4>Aku kasih kamu tenda-tenda yang tersedia di kami yaa😉</h4>
                        </div>
                    </div>
                </div>
                @include('admin.dashboard.card')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; zanda</p>
                    </div>
                    <div class="float-end">
                        <p>Develop by <a href="https://github.com/razanAlthaf">Razan</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
