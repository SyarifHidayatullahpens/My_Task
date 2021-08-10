@extends('admin.main')
@section('title','Edit Company')

@section('style')
<style>
    .card{
        width: 70%;
        margin: 20px auto;
    }
</style>

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Company</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('company.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{$data->nama}}">
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{$data->email}}">
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <label for="exampleFormControlFile1">File</label>
                    <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}">
                </div>
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Website / URL</label>
                <input type="text" name="website_url" class="form-control" id="website_url" value="{{ $data->website_url }}">
            </div>
            <div class="mb-3 float-right">
                <a href="/admin/company" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection