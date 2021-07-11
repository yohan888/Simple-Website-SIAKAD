<table id="example" class="table table-striped" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%">
                    
                    <thead class="thead-dark">
                        <tr style="border: 1px solid #dddddd;">
                            <th scope="col">NIM</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Matakuliah</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($data as $d)
                        <tr style="border: 1px solid #dddddd; text-align: left; padding: 8px">
                            <td>{{ $d->nim }}</td>
                            <td>{{ $d->namaMahasiswa }}</td>
                            <td>{{ $d->nama_matkul }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>