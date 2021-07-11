<html>
<head>
    <title>SIAKAD STTAB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

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
                <li>
                    <a class="nav-link" href="daftar_kelas">Daftar Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftar_mahasiswa">Daftar Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hasil_studi">Hasil Studi</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">Biodata Dosen<span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="{{ url('/logout')}}" style="color:white; background-color:red; border-radius:20px; margin-left:7%"><b>LOGOUT&nbsp;</b></a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    
    <div class="modal fade" id="modalMatkul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
     
                <form method='post' action='/tambah_matkul'>
                    <!-- untuk membangun form field pada laravel -->
                    {{ csrf_field() }}
                    <table border='0'>
                        <tr>
                            <td>Matakuliah&ensp;</td><td><input type='text' name='matkul' required></td>
                        </tr>
                    </table>
            
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-secondary" data-dismiss="modal" value='Batal'></button>
                <input type="submit" class="btn btn-primary" value='Simpan'></button>
            </div>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalJabatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
     
                <form method='post' action='/tambah_jabatan'>
                    <!-- untuk membangun form field pada laravel -->
                    {{ csrf_field() }}
                    <table border='0'>
                        <tr>
                            <td>Jabatan&ensp;</td><td><input type='text' name='jabatan' required></td>
                        </tr>
                    </table>
            
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-secondary" data-dismiss="modal" value='Batal'></button>
                <input type="submit" class="btn btn-primary" value='Simpan'></button>
            </div>
            </form>
            </div>
        </div>
    </div>


<div class='container' >
        <div class="table-responsive">

        @foreach($biodata_dosen as $b)
            <center><h2>NIP : {{ $b->nip }}</h2>
            <h2>Nama : {{ $b->nama }}</h2></center>
        @endforeach
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMatkul">
        Tambah Matakuliah
        </button>
        <table id="example" class="table table-striped" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%">
                    <thead class="thead-dark">
                        <tr style="border: 1px solid #dddddd;">
                            <th scope="col">Matakuliah</th>
                            <th scope="col" colspan="2" style="text-align:center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($matkul as $b)
                        <tr style="border: 1px solid #dddddd; text-align: left; padding: 8px">
                            <td>{{ $b->nama_matkul }}</td>
                            <td align="center"><a href="/hapus_matakuliah/{{ $b->id }}">Hapus</a></td>
                            <td align="center"><a style="color:orange" href="/view_matakuliah/{{ $b->id }}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>    

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalJabatan">
                Tambah Jabatan
                </button>
                <table id="example" class="table table-striped" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%">
                    <thead class="thead-dark">
                        <tr style="border: 1px solid #dddddd;">
                            <th scope="col">Jabatan</th>
                            <th scope="col" colspan="2" style="text-align:center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($jabatan as $b)
                        <tr style="border: 1px solid #dddddd; text-align: left; padding: 8px">
                            <td>{{ $b->jabatan }}</td>
                            <td align="center"><a href="/hapus_jabatan/{{ $b->id }}">Hapus</a></td>
                            <td align="center"><a style="color:orange"href="/view_jabatan/{{ $b->id }}">Edit</a></td>
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