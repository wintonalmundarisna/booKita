<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Vite buat hot reload --}}
    @vite([])

    {{-- link trix --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    {{-- link trix --}}

    {{-- css --}}
    <link rel="stylesheet" href="/css/style.css" />

    <title>Form Edit Buku</title>
    <link rel="shortcut icon" href="{{ $gambar }}" />

    <style>
        html {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        @media (min-width: 320px) {
            .logout {
                margin-top: 15px;
            }

            .input-group {
                width: 100%;
            }

            .navbar-image {
                width: 50px;
            }

            .jadikan {
                font-size: 3.5vw;
            }

            .address {
                font-size: 2.5vw;
            }

            .bab {
                font-size: 2.5vw;
            }

        }

        @media (min-width: 992px) {
            .logout {
                margin-top: 0px;
                margin-left: 10px;
            }

            .input-group {
                width: 70%;
            }

            .navbar-brand {
                width: fit-content;
            }

            .navbar-image {
                width: 80px;
            }

            .jadikan {
                font-size: 2.5vw;
            }

            .address {
                font-size: 1vw;
            }

            .bab {
                font-size: 1vw;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg py-4">
        <div class="container-md">
            <a class="navbar-brand" href="#">
                <p class="h2 fw-bold mb-0" style="color: #F1592B;">booKita</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ $active === 'Kategori' ? 'active text-danger' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item {{ request()->is('kategori/cerpen') ? 'text-danger' : '' }}"
                                    type="submit" href="/kategori/{{ 'cerpen' }}" name="cerpen"
                                    value="cerpen">Cerpen</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->is('kategori/novel') ? 'text-danger' : '' }}"
                                    href="/kategori/{{ 'novel' }}" name="novel" value="novel">Novel</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->is('kategori/ensiklopedia') ? 'text-danger' : '' }}"
                                    href="/kategori/{{ 'ensiklopedia' }}" name="ensiklopedia"
                                    value="ensiklopedia">Ensiklopedia</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->is('kategori/semua/semua') ? 'text-danger' : '' }}"
                                    href="/kategori/semua/{{ 'semua' }}" name="semua" value="semua">Semua
                                    Buku</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'Koleksi' ? 'active text-danger' : '' }}" aria-current="page"
                            href="/koleksi">Koleksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'About' ? 'active text-danger' : '' }}" aria-current="page"
                            href="/about">About</a>
                    </li>
                </ul>
                <form action="/cari" class="w-100">
                    @if (request('nama'))
                        <input type="hidden" name="nama" value="{{ request('nama') }}">
                    @endif
                    @if (request('judul'))
                        <input type="hidden" name="judul" value="{{ request('judul') }}">
                    @endif
                    <div class="input-group d-md-flex w-100">
                        <input type="text" name="cari" value="{{ request('cari') }}" autocomplete="none"
                            class="form-control bg-light border-0 rounded-0" placeholder="Cari berdasarkan nama pembuat atau judul buku.."
                            aria-label="cari" aria-describedby="button-addon2">
                        <button class="btn bg-light border-0 rounded-0" type="submit" id="button-addon2"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
                <div class="nav-item logout">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="nav-link" type="submit"
                            onclick="return confirm('Yakin ingin logout ?')">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-md" style="margin-top: 3vw;">
        <div class="col mt-5">
            {{-- form --}}
            <form action="/koleksi/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <h4 class="text-header mb-4">Edit Buku</h4>
                <input id="nama" type="hidden" name="nama" value="{{ old('nama', $data->nama) }}"
                    required>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" placeholder="Buat Judul..." name="judul" id="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        style="background: rgba(255, 255, 255, 0.20);
backdrop-filter: blur(4px);
-webkit-backdrop-filter: blur(4px);
border-radius: 10px;
border: 1px solid rgba(255, 255, 255, 0.18);"
                        autofocus required value="{{ old('judul', $data->judul) }}" />
                    @error('judul')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select bg-light opacity-75" aria-label="Default select example"
                        name="kategori" id="kategori">
                        <option name="kategori" selected value="{{ old('kategori', $data->kategori) }}">
                            {{ $data->kategori }}</option>
                        <option name="kategori" value="cerpen">Cerpen</option>
                        <option name="kategori" value="novel">Novel</option>
                        <option name="kategori" value="ensiklopedia">Ensiklopedia</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sinopsis" class="form-label">Sinopsis Buku</label>
                    @error('sinopsis')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="sinopsis" type="hidden" name="sinopsis"
                        value="{{ old('sinopsis', $data->sinopsis) }}" required>
                    <trix-editor input="sinopsis"
                        style="background: rgba(255, 255, 255, 0.20);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.18);"
                        required></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Buku</label>
                    @error('isi')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="isi" type="hidden" name="isi" value="{{ old('isi', $data->isi) }}"
                        required>
                    <trix-editor input="isi"
                        style="background: rgba(255, 255, 255, 0.20);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.18);"
                        required></trix-editor>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Cover</label>
                    <input type="hidden" name="oldImage" value="{{ $data->gambar }}">
                    @if ($data->gambar)
                        <img src="{{ asset('img/koleksi/' . $data->gambar) }}" alt=""
                            class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img alt="{{ $data->gambar }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input type="file" class="form-control-buat @error('gambar') is-invalid @enderror"
                        id="image" name="gambar" value="{{ old('gambar', $data->gambar) }}"
                        onchange="previewImage()" />
                    @error('gambar')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    @if (session()->has('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('gagal') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <button class="btn-buat-quote mt-2 me-2">
                    Simpan
                </button>

                <button class="btn-batal">
                    <a href="/koleksi">Batal</a>
                </button>
            </form>
            {{-- form --}}
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    {{-- footer --}}
    <div class="container-fluid mt-5 mb-5 text-dark" style="text-align: center">
        <h6 class="fw-light">All Right Reserverd. Copyright © booKita 2024 </h6>
    </div>
    {{-- footer --}}

    {{-- cdn bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

