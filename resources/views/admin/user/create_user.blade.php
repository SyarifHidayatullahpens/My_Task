@extends('admin.main')
@section('title','User')

@section('content')
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Departement</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('departement.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Fisrt Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name">
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name">
                </div>
                <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Select Company</label>
                    <select class="form-control @error('company') is-invalid @enderror" name="company" id="select_company" required>
                        <option value="">Select</option>
                        @foreach($companys as $company)
                            <option value="{{$company->id}}">{{$company->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Select Departement</label>
                    <select class="form-control @error('departement') is-invalid @enderror" name="departement" id="select_departement" required>
                        <option value="">Select</option>
                        @foreach($departements as $departement)
                            <option value="{{$departement->id}}">{{$departement->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm-password" class="form-control" id="confirm-password">
                </div>
                <div class="mb-3">
                    <a href="/admin/departement" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
</div>
@endsection