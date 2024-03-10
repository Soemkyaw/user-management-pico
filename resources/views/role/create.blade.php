@extends('layout')

@section('content')
    <div class="mx-5 my-3">
        <h3>Create Role</h3>
        <a href="{{ url()->previous() }}" class="btn btn-light my-2"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
        <form action="{{ route('role.store') }}" method="POST" class="bg-white p-3 rounded">
          @csrf
          <div class="mb-3">
            <label class="form-label">Role Name</label>
            <input type="text" name="name" class="form-control"  placeholder="Enter a role name ...">
            <x-error-message name="name"></x-error-message>
          </div>

          <div class="mt-3">
            <label class="form-label mt-3">Role Permissions</label>
            <table class="table">
                <thead>
                    <th>Administrator Access</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($features as $feature)
                        <tr>
                            <td>{{$feature->name}}</td>
                            {{-- <td>
                                <input type="checkbox" name="permissions[]" value='{{  $feature->permissions->pluck('id') }}' class=" form-check-input">
                                <label for="">Select All</label>
                            </td> --}}
                            @foreach ($feature->permissions as $p)
                                <td>
                                    <input type="checkbox" name="permissions[]" value='{{$p->id}}' class=" form-check-input">
                                     <label for="">{{ $p->name }}</label>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
    </div>
@endsection
