<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Al Hafidz Leuwiliang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/assets/images/logo.jpg" alt="Logo" height="74" class="d-inline-block align-text-top me-3">
                <div class="profile">
                    <h4 class="my-0">SMK AL HAFIDZ LEUWILIANG</h4>
                    <p class="my-0">Maju seiring perkembangan digital</p>
                </div>
            </a>
        </div>
    </nav>

    {{-- Slider --}}
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            @foreach ($sliders as $slider)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" @if ($loop->iteration == 1) class="active" @endif aria-current="true" aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @forelse($sliders as $slider)
                <div class="carousel-item @if ($loop->iteration == 1) active @endif">
                    <img src="/images/{{ $slider->file }}" class="d-block w-100" alt="{{ $slider->title }}" style="height: 40rem; object-fit:cover;">
                    <div class="carousel-caption d-none d-md-block" style="background-color: #00000088; border-radius: 5px;">
                        <h5>{{ $slider->title }}</h5>
                    </div>
                </div>
            @empty
                <h4>Tidak ada gambar di gallery slider.</h4>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Galeri kegiatan --}}
    <div class="container">
        <h2 class="text-center mb-4"><span class="text-light">Galeri Sekolah</span></h2>

        @forelse ($posts as $post)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/images/{{ $post->galleries[0]->images[0]->file ?? '' }}" class="img-fluid rounded-start" alt="{{ $post->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">{{ $post->content }}</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h4>Tidak ada galeri kegiatan yang ditampilkan.</h4>
        @endforelse
    </div>

    <div class="my-4 bg-secondary py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6" style="border-right: 1px solid #ccc;">
                    <h2 class="text-center text-light mb-4"><span class="text-light">Agenda </span>Sekolah</h2>

                    <ul class="list-group">
                        @forelse ($agendas as $agenda)
                            <li class="list-group-item">{{ $agenda->title }}</li>
                        @empty
                            <h4>Tidak ada agenda sekolah yang ditampilkan.</h4>
                        @endforelse
                    </ul>
                </div>

                <div class="col-12 col-md-6">
                    <h2 class="text-center text-light mb-4"><span class="text-light">Informasi</span> Terkini</h2>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $information->title }}</h5>
                            <img src="/images/{{ $information->galleries[0]->images[0]->file ?? '' }}" alt="{{ $information->title }}">
                            <p class="card-text">{{ $information->content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 bg-secondary py-5">
        <hr>
        <h2 class="text-center mb-4"><span class="text-light">Peta Sekolah</span></h2>

        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $map->title }}</h5>
                        <p class="card-text">{{ $map->content }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <img src="/images/{{ $map->galleries[0]->images[0]->file }}" alt="{{ $map->title }}" style="max-width: 55rem">
            </div>
        </div>
    </div>

    <footer class="bg-light mt-4">
        <div class="container text-center py-4">
            <p>&copy; 2024 SMK Al Hafidz Leuwiliang</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
