@extends('layout')

@section('content')
    <div class="mx-5 my-3">
        <h3>Create Role</h3>
        <a href="" class="btn btn-light my-2"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
        <form action="{{ route('role#store') }}" method="POST" class="bg-white p-3 rounded">
          @csrf
          <div class="mb-3">
            <label for="roleName" class="form-label">Role Name</label>
            <input type="text" name="name" class="form-control" id="roleName" aria-describedby="emailHelp" placeholder="Enter a role name ...">
            @error('name')
                <small class=" text-danger">
                    {{ $message }}
                </small>
            @enderror
          </div>
          {{-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> --}}
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
    </div>
@endsection
