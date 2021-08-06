@extends('admin.main')
@section('title','Create')

@section('content')
<div class="container">
    <form method="POST" action="{{route('departement.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Name Departement</label>
                <input type="text" name="name" class="form-control" id="name_depart">
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="departement" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <a href="/admin/departement" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
</div>
@endsection