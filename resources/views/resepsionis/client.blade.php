<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/client.css') }}">
    <title>eBusparwis</title>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/js/bootstrap.min.js') }}">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    -->
    {{-- <script src="https://kit.fontawesome.com/604c789c41.js" crossorigin="anonymous"></script> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container-lg" id="navbar">
        <nav id="noprint"
            class="d-print-none nav-navbar d-flex flex-wrap align-items-center justify-content-between position-relative px-3">
            <a href="#" class="d-flex align-items-center col-md-3 ps-4 text-dark text-decoration-none">
                <span class="nm">Florida</span>
            </a>

            <div class="nav-menu">

            </div>

            <div class="col-md-3 d-flex justify-content-end align-items-center text-black-50">
                <ul class="nav col-12 col-sm-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="#" class="px-3 active nav-link">Client</a>
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
    {{-- <form method="post" action="/admin/list-tipe">
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
                            <input type="text" class="form-control frm" id="floatingInput" name="nama" required
                                placeholder="Nama Tipe">
                            <label for="floatingInput">Nama Tipe</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btncncl btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btnadd btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}
    <div class="topo"></div>
    <div class="container-fluid">
        <div class="lstbs" id="listbus">
            <div class="d-flex justify-content-center align-center">
                <h1>Data Client</h1>
            </div>
            <div class="d-print-none d-flex justify-content-end">
                <button type="button" class=" btn add text-black shadow-sm " media="print" onclick="window.print()">
                    <i class="fa-solid fa-file-pdf"></i>
                    <b class="px-2">Print</b>
                </button>
            </div>
            <div class="row mt-4">
                <table class="table text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Tipe Kamar</th>
                            <th scope="col">Tipe Bed</th>
                            <th scope="col">Check in</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="d-print-none">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemesanan as $item)
                            <tr>
                                <th scope="col">{{ $loop->iteration }}</th>
                                <td>{{ $item->client->nama }}</td>
                                <td>{{ $item->ebus->jenis->nama }}</td>
                                <td>{{ $item->ebus->bed }}</td>
                                <td>{{ $item->mulai }}</td>
                                <td>{{ $item->selesai }}</td>
                                <td>
                                    <select name="" id="" disabled="disabled"></select>    
                                </td>
                                <td class="d-print-none d-flex justify-content-center">
                                    <form action="/admin/list-tipe/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                    <a href="/admin/list-tipe/edit/{{ $item->id }}"
                                        class="ms-2 btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <button onclick="window.print()">Print this page</button> --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
