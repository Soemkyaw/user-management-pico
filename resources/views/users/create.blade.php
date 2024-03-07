@extends('layout')

@section('content')
    <div class="mx-5 my-3">
        <h3>Create User</h3>
        <a href="{{ url()->previous() }}" class="btn btn-light my-2"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
        <form action="{{ route('user.store') }}" method="POST" class=" p-3 rounded">
          @csrf

          {{-- user infomation  --}}
          <div class="row bg-white mb-3 p-3 rounded">
            <h5 class="mb-3 fw-bold">User Infomation</h5>
            <div class="col-12">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name ...">
                <x-error-message name="name"></x-error-message>
            </div>
            <div class="col my-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="username@gmail.com">
                <x-error-message name="email"></x-error-message>
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
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username">
                <x-error-message name="username"></x-error-message>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password"  class="form-control" placeholder="Password">
                <x-error-message name="password"></x-error-message>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Roles</label>
                <select name="role_id" class="form-select">
                    <option value="" disabled selected>Select a Role...</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-error-message name="role_id"></x-error-message>
            </div>
          </div>

          {{-- more infomation  --}}
          <div class="row bg-white mb-3 p-3 rounded">
            <h5 class="mb-3 fw-bold">More Infomation</h5>
            <div class="col-6 my-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="+959xxxxxxxxx">
                <x-error-message name="phone"></x-error-message>
            </div>
            <div class="col-6 my-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option value="" disabled selected>Choose Your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <x-error-message name="gender"></x-error-message>
            </div>
            <div class="col-12 my-3">
                <label class="form-label">Address</label>
                <textarea name="address"  class=" form-control">
                    {{ old('address') }}
                </textarea>
                <x-error-message name="address"></x-error-message>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
    </div>
@endsection
