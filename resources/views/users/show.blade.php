@extends('layout')

@section('content')
    <div class="m-5">
        <div class="row">
            <div class="col-3 me-4 py-5 bg-light card">
                <div class=" d-flex justify-content-center bg-danger-subtle mx-auto rounded-circle" style="height: 100px;width: 100px">
                    <h1 class=" my-auto text-danger fw-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</h1>
                </div>
                <h5 class="text-center mt-3">{{ $user->name }}</h5>
                <h6 class="text-center text-primary">{{ $user->role->name }}</h6>
            </div>
            <div class="col-8 ms-4">
                <h5 class=" text-muted mb-3">User Infomations</h5>
                <div class=" bg-light rounded p-3">
                    <h6>More Infomations</h6>
                    <hr>
                    <div class="row my-3">
                        <div class="col-6 text-muted">Username:</div>
                        <div class="col-6 ">{{ $user->username }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6 text-muted">Email:</div>
                        <div class="col-6 ">{{ $user->email }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6 text-muted">Gender:</div>
                        <div class="col-6 ">{{ $user->gender }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6 text-muted">Phone:</div>
                        <div class="col-6 ">{{ $user->phone }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6 text-muted">Address:</div>
                        <div class="col-6">{{ $user->address }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-6 text-muted">Is Active?:</div>
                        <div class="col-6">{{ $user->is_active ? 'active' : 'deactive' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

