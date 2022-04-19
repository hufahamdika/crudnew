<html>
    <head>
        <title>Rekam Medis Pasien</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="container position-center">
                {{-- <div class="row page-bg"> --}}
                    <div class="p-4">
                        <div class="text-center top-icon">
                            <center><h3>Tambah Rekam Medis Baru</h3></center>
                            <br>
                            @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif

                            <form id="form-create" action="{{ route('record.new-data') }}" method="post">
                                @csrf
                                <div class="mt-3 mb-3 form-floating">
                                    <input type="text" class="form-control form-control-lg" name="name" placeholder="Joko Amanto">
                                    <label for="name">Patient Name</label>                                      
                                </div>

                                @error('name')
                                <div class="alert alert-danger"> Patient's Name Error </div>
                                @enderror

                                <div class="mt-3 mb-3 form-floating">
                                    <input type="number" class="form-control form-control-lg" name="age" placeholder="42">
                                    <label for="age">Patient Age</label>                                      
                                </div>

                                @error('age')
                                <div class="alert alert-danger"> Patient's Age Error </div>
                                @enderror

                                <div class="mt-3 mb-3 form-floating">
                                    <input type="text" class="form-control form-control-lg" name="gender" placeholder="Pria">
                                    <label for="gender">Patient Gender</label>                                      
                                </div>

                                @error('gender')
                                <div class="alert alert-danger"> Patient's Gender Error </div>
                                @enderror

                                <div class="mt-3 mb-3 form-floating">
                                    <input type="number" class="form-control form-control-lg" name="temperature" placeholder="37.1" step="any">
                                    <label for="temperature">Temperature</label>                                      
                                </div>

                                @error('temperature')
                                <div class="alert alert-danger"> Temperature Error </div>
                                @enderror

                                <div class="mt-3 mb-3 form-floating">
                                    <input type="text" class="form-control form-control-lg" name="condition" placeholder="So Goood">
                                    <label for="condition">Health Condition</label>                                      
                                </div>

                                @error('condition')
                                <div class="alert alert-danger"> Health Condition Error </div>
                                @enderror
                            </form>
                            <br>
                            <div class="mt-4 text-center submit-btn">
                                <button type="submit" class="btn btn-primary" form="form-create">Tambah Data</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


</html>