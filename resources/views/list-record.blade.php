<html>
    <head>
        <title>Rekam Medis Pasien</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <center><h3>Rekam Medis</h3></center>
            <br>
            <center><a href="{{ route('record.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Create Record</a></center>
            <br>
            @if (Session::has('tambah_data'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                    <br>
                        {{-- Penambahan Pengumuman Berhasil --}}
                        {{ Session::get('tambah_data') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
                    </button>
                </div>
            @endif

            @if (Session::has('edit_data'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                    <br>
                        {{ Session::get('edit_data') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif

            @if (Session::has('hapus_data'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                    <br>
                        {{ Session::get('hapus_data') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            <table class="table table-hover" style="width: 100%">
                <thead>
                <tr>
                    <th scope="col" style="width: 10%">ID</th>
                    <th scope="col" style="width: 25%">Nama</th>
                    <th scope="col" style="width: 25%">Tanggal Pembuatan</th>
                    <th scope="col" style="width: 40%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                 $it = 1; 
                @endphp

                @foreach ($data as $d)
                <tr>
                    <th scope="row">{{ $it }}</th>
                    <td>{{ $d->patient->name }}</td>
                    <td>{{ $d->created_at }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah yakin ingin menghapus data?');" action="{{ route('record.destroy', $d->id) }}" method="POST">
                            <a href="{{ route('record.edit', $d->id) }}" class="btn btn-primary btn-sm shadow"><i class="fa-solid fa-pen-fancy"></i> Edit</a>
                            |
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            |
                            <a href="{{ route('record.show', $d->id) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i> Show</a>
                        </form>
                    </td>
                </tr>
                @php
                    $it+=1;
                @endphp
                @endforeach
            
                </tbody>
            </table>
        </div>
    </body>


</html>