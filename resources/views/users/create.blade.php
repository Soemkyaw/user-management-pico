@extends('layout')

@section('content')
    <div class="mx-5 my-3">
        <h3>Create User</h3>
        <a href="" class="btn btn-light my-2"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
        <form action="{{ route('user#store') }}" method="POST" class=" p-3 rounded">
          @csrf

          {{-- user infomation  --}}
          <div class="row bg-white mb-3 p-3 rounded">
            <h5 class="mb-3 fw-bold">User Infomation</h5>
            <div class="col-6">
                <label class="form-label">First name</label>
                <input type="text" name="firstName" class="form-control" placeholder="First Name ...">
                @error('firstName')
                    <small class=" text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="col-6">
                <label class="form-label">Second Name</label>
                <input type="text" name="secondName" class="form-control" placeholder="Second Name ...">
            </div>
            <div class="col my-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="username@gmail.com">
            </div>
            <div class="col-12 my-3">
                <input type="checkbox" class="form-check-input" name="is_active">
                <label class="form-check-label">
                    <div class=" text-muted">Is Active?</div>
                    <div class=" text-muted" style="font-size: 13px">User account is activate or deactivate</div>
                </label>
            </div>
          </div>

          {{-- roles and permission  --}}
          <div class="row bg-white mb-3 p-3 rounded">
            <h5 class="mb-3 fw-bold">Roles And Permissions</h5>
            <div class="col-12 mb-3">
                <label class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Roles</label>
                <select name="role_id" class="form-select">
                    <option value="" disabled selected>Select a Role...</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
          </div>

          {{-- more infomation  --}}
          <div class="row bg-white mb-3 p-3 rounded">
            <h5 class="mb-3 fw-bold">More Infomation</h5>
            <div class="col-6 my-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="+959xxxxxxxxx">
            </div>
            <div class="col-6 my-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option value="" disabled selected>Choose Your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="col-12 my-3">
                <label class="form-label">Address</label>
                <textarea name="address" class=" form-control" cols="30" rows="10"></textarea>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
    </div>
@endsection
