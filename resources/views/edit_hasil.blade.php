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
                <li class="nav-item">
                    <a class="nav-link" href="daftar_kelas">Daftar Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftar_mahasiswa">Daftar Mahasiswa</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="">Hasil Studi<span class="sr-only">(current)</span></a>
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

    <div class="container">
        <div class="boxed" style="margin-top:10%; background-color:#0b56a7; border-radius: 15px; margin-left:22%; margin-right: 22%">
        <h3 style="text-align:center; color: white;"><br>Edit Hasil Studi Mahasiswa</h3><br>
        <form method='post' action='/ubah_hasil' style="margin-left: 5%; margin-right: 5%">
        
            @csrf
            @foreach($hasil as $h)
            <input type='hidden' class="form-control" name='id' value='{{ $h->id }}'>
                <div class="form-group">
                    <label style="color: white; font-size: 19;">Mahasiswa</label>
                    <select name="nim" id="nim">
                        @foreach($list_mahasiswa as $l)
                            @if($l->nim == $h->nim)
                                <option value="{{ $l->nim }}" selected>{{ $l->nim }} - {{ $l->nama }}</option>
                            @endif
                            @if($l->nim != $h->nim)
                                <option value="{{ $l->nim }}">{{ $l->nim }} - {{ $l->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label style="color: white; font-size: 19;">Nilai</label>
                    <input type='text' class="form-control" name='nilai' placeholder='{{ $h->nilai }}' required>
                    
                </div>
                <div class="form-group">
                <input style="margin-left:0.5%; margin-top: 2%; width: 99%; height: 6%; font-size: 22; background-color: #ffbb33; border: 0" type='submit' value='Update' class="btn btn-warning">
                </div><br style="margin-top:-2%">
            @endforeach
        </form>
        </div>  
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<body>
</html>