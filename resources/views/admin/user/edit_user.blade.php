@extends('admin.main')
@section('title','Edit')

@section('content')
<div class="container">
    <form action="{{route('user.update',[$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="exampleFormControlInput1" value="{{$data->username}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" value="{{$data->first_name}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" value="{{$data->last_name}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Company</label>
        <select class="form-control" name="company" id="subCategory" required>
                <option value=""> Pilih </option>
                @foreach($check as $company)
                    <option value="{{$company->id}}">{{$company->nama}}</option>
                @endforeach
            </select>
    </div>
    <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Departement</label>
            <select class="form-control" name="departement" id="subCategory" required>
                <option value=""> Pilih </option>
                @foreach($cek as $departement)
                    <option value="{{$departement->id}}">{{$departement->name}}</option>
                @endforeach
            </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value="{{$data->phone}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">E-mail Address</label>
        <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="{{$data->email}}">
    </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="/admin/user" class="btn btn-primary ">Back</a>
        </div>
    </form>
</div>
@endsection