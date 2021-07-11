<html>
<head>
    <title>SIAKAD STTAB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- <style>
        .carousel-item {
        height: 80%;
        }
        .hero {
            background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.6)), url();
        }
    </style> -->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="../../img/STTAB.png" width="60px">&nbsp;<img src="../../img/STTAB2.png" width="50px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">Regitrasi Kuliah<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hasil">Hasil Studi</a>
                </li>
                <li>
                    <a class="nav-link" href="jadwal">Jadwal</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="tagihan">Tagihan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="biodata">Biodata Dosen</a>
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
        <!-- <center>
            <marquee style="color: red;" width="900"><h2>Registrasi Matakuliah Semester 1 Telah ditutup, Informasi Lainnya Akan Diumumkan Segera Terimakasih &#128522;</h2></marquee>
        </center> -->
        <div class="table-responsive">
                
                <table id="example" class="table table-striped" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%">
                    {{ csrf_field() }}
                    
                    <thead class="thead-dark">
                        <tr style="border: 1px solid #dddddd;">
                            <th scope="col">Kode Kelas</th>
                            <th scope="col">Nama Matakuliah</th>
                            <th scope="col">Dosen</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Ruang</th>
                            <th scope="col">SKS</th>
                            <th scope="col" colspan="1" style="text-align:center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($registrasi as $r)
                        <tr style="border: 1px solid #dddddd; text-align: left; padding: 8px">
                            <td>{{ $r->kode_kelas }}</td>
                            <td>{{ $r->nama_matkul }}</td>
                            <td>{{ $r->nama }}</td>
                            <td>{{ $r->waktu }}</td>
                            <td>{{ $r->ruang }}</td>
                            <td>{{ $r->sks }}</td>
                            <form action='/ambilKelas' method="post">
                            @csrf
                            <td>
                                <input type='submit' name="kodeKelas" value='{{ $r->kode_kelas }}' style="background-color: #ffbb33; border-radius:20px; width:65px">
                            </td>
                            </form>
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