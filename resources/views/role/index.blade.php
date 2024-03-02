@extends('layout')

@section('content')
    <div class=" mx-5 my-3 card">
        <div class=" d-flex justify-content-between px-3 my-3">
            <div class="col-auto">
                <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search">
            </div>
            <a href="{{ route('role#create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Create Role</a>
        </div>
        <div class="px-3">
            <table class="table table-borderless">
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
              </table>

        </div>
    </div>
@endsection
