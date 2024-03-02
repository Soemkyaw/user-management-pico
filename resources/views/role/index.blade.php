@extends('layout')

@section('content')
    <div class=" mx-5 my-3 card">
        <div class=" d-flex justify-content-between px-3 my-3">
            <div class="col-auto">
                <form action="{{ route('role#index') }}">
                    <input type="text" name="key" class="form-control" placeholder="Search">
                </form>
            </div>
            <a href="{{ route('role#create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Create Role</a>
        </div>
        <div class="px-3">
            <table class="table table-borderless">
                @if ($roles->count() == 0)
                    <h3 class="text-secondary text-center my-5">There is no role like <span class="text-danger">"{{ request('key') }}"</span> !</h3>
                @else
                <thead>
                      <tr>
                        <th scope="col" class="text-muted">Role</th>
                        <th scope="col" class="text-muted">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td >
                                <div class="dropdown">
                                    <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('role#edit',$role) }}">Edit</a></li>
                                        <li class="">
                                            <form action="{{ route('role#destory',$role) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                @endif
              </table>

        </div>
    </div>
    <div class="mx-5">{{ $roles->links() }}</div>
@endsection
