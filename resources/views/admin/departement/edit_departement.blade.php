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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Departement</h6>
        </div>
        <div class="card-body">
            <form action="{{route('departement.update',[$data->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$data->name}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="exampleFormControlInput1" rows="4">{{$data->description}}</textarea>
            </div>
                <div class="mb-3 float-right">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/admin/departement" class="btn btn-primary ">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection