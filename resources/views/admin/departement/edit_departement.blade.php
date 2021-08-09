@extends('admin.main')
@section('title','Edit Departement')

@section('content')
<div class="container">
    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <form action="{{route('departement.update',[$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$data->name}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" id="exampleFormControlInput1" value="{{$data->description}}">
    </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/admin/departement" class="btn btn-primary ">Back</a>
        </div>
    </form>
</div>

@endsection