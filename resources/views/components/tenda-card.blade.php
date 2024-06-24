<div class="col-xl-4 col-md-6 col-sm-12">
    <div class="card">
        <div class="card-body">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($images as $image)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset('assets/images/' . $image) }}" class="d-block w-100" alt="{{ $title }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer">
            <h4>{{ $title }}</h4>
            <p>{{ $description }}</p>
            <p>{{ $price }} - {{ $qty }}</p>
        </div>
    </div>
</div>