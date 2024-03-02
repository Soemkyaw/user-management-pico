@extends('layout')

@section('content')
    <div class="mx-5 my-3">
        <h3>Create Role</h3>
        <a href="" class="btn btn-light my-2"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
        <form action="{{ route('role#update',$role) }}" method="POST" class="bg-white p-3 rounded">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Role Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$role->name) }}" placeholder="Enter a role name ...">
                <x-error-message name="name"></x-error-message>
            </div>

            <div class="mt-3">
                <label class="form-label mt-3">Role Permissions</label>
                <table class="table">
                    <thead>
                        <th>Administrator Access <i class="bi bi-exclamation"></i></th>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input d-inline-block" name="">Select all
                            </div>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($features as $feature)
                            <tr>
                                <td>{{ $feature->name }}</td>
                                @foreach ($feature->permission as $p)
                                    <td>
                                        <input type="checkbox" name="permissions[]" value='{{ $p->id }}'
                                            {{ $role->permissions->pluck('id')->contains($p->id) ? 'checked' : '' }}
                                            id="{{ $p->id }}" class="form-check-input">
                                        <label for="">{{ $p->name }}</label>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
