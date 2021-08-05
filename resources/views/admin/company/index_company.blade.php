@extends('admin.main')
@section('title', 'Company')

@section('content')
    <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div></div>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Company</a>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables </h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Website URL</th>
                                <th scope="col">Action</th>
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
                                            <td>
                                            <a href="{{route('company.edit',[$data->id])}}" type="submit" class="btn btn-primary"><span class="fas fa-edit">Edit</a>
                                                <a href="#" type="button" class="btn btn-danger" onclick= "return confirm('Apakah anda ingin menghapus item.?');"><span class="fas fa-trash-alt">Delate</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <p><strong>Empety Table</strong></p>
                                    @endforelse
                                </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection