@extends('admin.main')
@section('title', 'Show')

@section('style')
<style>
    h5{
        text-align: center;
        font-family: 'Roboto Slab', serif;
    }
    .card{
        width: 50%;
        margin: 5rem auto;
    }
    .avatar {
        height: 100px;
        width: 100px;
        border-radius: 50%;
        margin: 5px auto;
    }
    img{
        max-width: 100%;
        height: auto;
    }
</style>

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Show User</h6>
        </div>
        <div class="card-body">
            <div class="avatar">
                <img src="/img/avatar.png" alt="">
            </div>
                <h5> First Name: <span>{{ $data->first_name }}</span></h5>
                <h5> Last Name : <span>{{ $data->last_name  }} </span></h5>
                <h5>Phone : <span>{{ $data->phone }}</span></h5>
                <a href="/admin/user" class="btn btn-primary float-right">Back</a>
        </div>
    </div>
@endsection