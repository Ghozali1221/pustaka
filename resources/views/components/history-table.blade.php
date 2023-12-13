<div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Judul Buku</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Fix Return Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataHistory as $h)
            <tr class="{{$h->fix_return_date == null ? '' : ($h->return_date < $h->fix_return_date ? 'text-bg-danger' : 'text-bg-primary') }}">
                <td>{{$loop->iteration}}</td>
                <td>{{$h->user->name}}</td>
                <td>{{$h->book->judul}}</td>
                <td>{{$h->rent_date}}</td>
                <td>{{$h->return_date}}</td>
                <td>{{$h->fix_return_date}}</td>
                <td>#</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
