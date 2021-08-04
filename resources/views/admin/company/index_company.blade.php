@extends('admin.main')
@section('title', 'Yeee')
@section('content')
    <div class="container">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Logo</th>
            <th scope="col">Website URL</th>
            </tr>
        </thead>
            <tbody>
                @forelse ($datas as $data)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->logo }}</td>
                        <td>{{ $data->website_url }}</td>
                    </tr>
                    @empty
                    <p><strong>Empety Table</strong></p>
                @endforelse
            </tbody>
        </table>
@endsection
    </div>