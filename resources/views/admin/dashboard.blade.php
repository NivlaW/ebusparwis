<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admdashboard.css') }}">
    <title>eBusparwis</title>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/js/bootstrap.min.js') }}">
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    -->
    <script src="https://kit.fontawesome.com/604c789c41.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="topo">
    </div>
    <div class="container-lg" id="navbar">
        <nav
            class="d-print-none nav-navbar d-flex flex-wrap align-items-center justify-content-between position-relative px-3">
            <a href="#" class="d-flex align-items-center col-md-3 ps-4 text-dark text-decoration-none">
                <span class="nm">Florida</span>
            </a>

            <div class="nav-menu">

            </div>

            <div class="col-md-3 d-flex justify-content-end align-items-center text-black-50">
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="{{ url('/admin/list-tipe') }}" class="px-2 nav-link">Tipe Room</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/fasilitas') }}" class="px-2 nav-link">Fasilitas</a>
                    </li>
                    <li>
                        <a href="#listbus" class="px-3 active nav-link">Room</a>
                    </li>
                    <li class="knn">
                        <a class="nav-link" href="{{ url('/admin/logout') }}">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <form method="post" action="/admin/dashboard" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="..." data-bs-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambahkan Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <input type="text" class="form-control frm" id="floatingInput" name="no" required
                                placeholder="No">
                            <label for="floatingInput">No</label>
                        </div>
                        <div class="form-floating">
                            <select name="jenis" class="form-control frm" id="floatingInput">
                                <option value="" disabled selected hidden>-Pilih Tipe-</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInput">Tipe Room</label>
                        </div>
                        <div class="form-floating">
                            <select name="bed" class="form-control frm" id="floatingInput">
                                <option value="" disabled selected hidden>-Pilih Bed-</option>
                                <option value="Single Bed">Single Bed</option>
                                <option value="Double Bed">Double Bed</option>
                                <option value="Twin Bed">Twin Bed</option>
                            </select>
                            <label for="floatingInput">Amount Bed</label>
                        </div>
                        <div class="form-floating">
                            <textarea type="text" class="form-control frm" id="floatingInput" name="deskripsi" required
                                placeholder="Description"></textarea>
                            <label for="floatingInput">Description</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control frm" id="floatingInput" name="harga" required
                                placeholder="Harga">
                            <label for="floatingInput">Harga</label>
                        </div>
                        <div class="form-floating">
                            <input type="file" class="form-control frm custom-file-input" onchange="readURL(this);"
                                id="floatingInput" name="gambar" id="gambar" required>
                            <label for="floatingInput">Gambar</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btncncl btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btnadd btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container-fluid">
        {{-- <div class="rst"></div>
        <div class="tx">
            <div class="row">
                <div class="col-lg-6 px-5 py-4">
                    <h2 class="text-white">Executive Bus<span>.</span></h2>
                    <div class="col-lg-6">
                        <p class="text-white-50 ps-2">Comfort Your Traveling</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flt shadow-lg bg-white">
            <div class="py-5 px-5 d-flex">
                <div class="select me-3">
                    <label>Tipe Room</label>
                    <select class="jnsbs" id="jns" aria-label="Default select example">
                        <option value="Big bus">Standard Room</option>
                        <option value="Medium Bus">Deluxe Room</option>
                    </select>
                </div>
                <div class="select me-3">
                    <label>Amount Bed</label>
                    <select class="jnsbs" id="jns" aria-label="Default select example">
                        <option value="1">Single Bed</option>
                        <option value="2">Double Bed</option>
                        <option value="3">Twin Bed</option>
                    </select>
                </div>
                <div class="select me-3">
                    <label>Mulai</label>
                    <input type="date" class="tgl" required id="floatingInput" placeholder="Selesai"
                        name="selesai">
                </div>
                <div class="select me-3">
                    <label>Selesai</label>
                    <input type="date" class="tgl" required id="floatingInput" placeholder="Selesai"
                        name="selesai">
                </div>
            </div>
            <a href="#listbus" class="slnjt shadow-lg">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div> --}}
        <div class="lstbs" id="listbus">
            <div class="d-flex justify-content-center align-center">
                <h1>Data Room</h1>
            </div>
            <div class="d-print-none d-flex justify-content-end">
                <button type="button" class=" btn add text-black shadow-sm " media="print" onclick="window.print()">
                    <i class="fa-solid fa-file-pdf"></i>
                    <b class="px-2">Print</b>
                </button>
                <button type="button" class="ms-3 btn add text-black shadow-sm " data-bs-toggle="modal"
                    data-bs-target="#addModal">
                    <i class="fa-solid fa-plus"></i>
                    <b class="px-2">Tambahkan Tipe Room</b>
                </button>
                {{-- <button onclick="window.print()">Print this page</button> --}}
            </div>
            <div class="row mt-4">
                <table class="table text-center table-hover">
                    <thead>
                        <tr class="align-middle">
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Tipe</th>
                            <th scope="col">Amount Bed</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col" class="d-print-none">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ebus as $item)
                            <tr class="align-middle">
                                <th scope="col">{{ $item->no }}</th>
                                <td>
                                    <img src="{{ asset('image/kamar/' . $item->gambar) }}"
                                        class="justify-content-center ftkmr">
                                </td>
                                <td>{{ $item->jenis->nama }}</td>
                                <td>{{ $item->bed }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    <div class="d-print-none d-flex justify-content-center">
                                        <form action="/admin/dashboard/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                        <a href="/admin/edit/{{ $item->id }}"
                                            class="ms-2 btn btn-sm btn-primary">Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @foreach ($ebus as $item)
                    <div class="col-4">
                        <div class="fnc d-flex justify-content-end float-right align-right">
                            <form class="hps" action="/admin/dashboard/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn nav-link">
                                    <i class="text-white fa-solid fa-trash-can fa-lg"></i>
                                </button>
                            </form>
                            <a href="/admin/edit/{{ $item->id }}" class=" edt btn nav-link">
                                <i class="text-white fa-solid fa-pen fa-lg"></i>
                            </a>
                        </div>
                        <a href="/kamar/{{ $item->id }}" class="nav-link crd">
                            <img src="{{ asset('image/kamar/' . $item->gambar) }}" class="ftkmr" alt="">
                            <div class="txtlist">
                                <p class="jdl">{{ $item->jenis->nama }}</p>
                                <p>No {{ $item->no }} | {{ $item->bed }} | Rp {{ $item->harga }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
