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
                            <div class="avatar avatar-l">
                                <img src="{{ asset('dist/assets/compiled/jpg/1.jpg') }}" alt="Face 1">
                            </div>
                            <div class="mt-2 ms-2 name">
                                <h6 class="font-bold">{{ Auth::user()->name }}</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="page-content">
                
            </div>
        </div>
    </div>


    @include('admin.dashboard.footer')
