<table id="example" class="table table-striped" style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%">
                    
                    <thead class="thead-dark">
                        <tr style="border: 1px solid #dddddd;">
                            <th scope="col">LK</th>
                            <th scope="col">Media</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($data as $d)
                        <tr style="border: 1px solid #dddddd; text-align: left; padding: 8px">
                            <td>{{ $d->lk }}</td>
                            <td>{{ $d->media }}</td>
                            <td>{{ $d->sks }}</td>
                            <td>{{ $d->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>