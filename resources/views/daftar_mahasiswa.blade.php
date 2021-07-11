<html>
<head>
    <title>SIAKAD STTAB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script>
function myFunction() {
  alert("Silahkan Cek Email Anda");
}
</script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="homeAdmin"><img src="../../img/STTAB.png" width="60px">&nbsp;<img src="../../img/STTAB2.png" width="50px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homeAdmin">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftar_kelas">Daftar Kelas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">Daftar Mahasiswa<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="hasil_studi">Hasil Studi</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="biodata_dosen">Biodata Dosen</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ url('/logout')}}" style="color:white; background-color:red; border-radius:20px; margin-left:7%"><b>LOGOUT&nbsp;</b></a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
<div class='container' >
        <div class="table-responsive">
            <a href="cetak_list_mahasiswa" class="btn btn-primary" onclick="myFunction()">Cetak</a>
            <br><br>
                <table id="example" class="table table-striped" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%">
                    @csrf
                    
                    <thead class="thead-dark">
                        <tr style="border: 1px solid #dddddd;">
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Matakuliah</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($daftar_mahasiswa as $d)
                        <tr style="border: 1px solid #dddddd; text-align: left; padding: 8px">
                            <td>{{ $d->namaMahasiswa }}</td>
                            <td>{{ $d->nama_matkul }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<body>
</html>