@extends('layout')

@section('content')
        <div class=" mx-5 my-3 card">
            <div class=" d-flex justify-content-between px-3 my-3">
                <div class="col-auto">
                    <form action="{{ route('user#index') }}">
                        <input type="text" name="key" class="form-control" placeholder="Search">
                    </form>
                </div>
                <a href="{{ route('user#create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Create User</a>
            </div>
            <div class="px-3">
                <table class="table">
                    @if ($users->count() == 0)
                        <h3 class="text-secondary text-center my-5">There is no name like <span class="text-danger">"{{ request('key') }}"</span> !</h3>
                    @else
                        <thead>
                            <tr>
                                <th scope="col">USER</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">ROLE</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($users as $user)
                                <tr>
                                    <td class=" py-3 d-flex align-items-center">
                                        <span class="text-danger bg-danger-subtle rounded p-2 me-2">{{ strtoupper(substr($user->name, 0, 1)) }}</span>

                                        <span class="">
                                            <div class=" text-muted">{{ $user->name }}</div>
                                            <div class=" text-muted" style="font-size: 13px">{{ $user->email }}</div>
                                        </span>
                                        @if (Auth::id() == $user->id)
                                                <span class="text-success ms-2 bg-success-subtle px-1 rounded">You</span>
                                        @endif
                                    </td>
                                    <td class=" py-3 align-items-center">{{ $user->username }}</td>
                                    <td class=" py-3 align-items-center">{{ $user->role->name }}</td>
                                    <td class=" py-3">
                                        @if ($user->is_active === 1)
                                            <span class=" text-success bg-success-subtle px-1 rounded">Active</span>
                                        @else
                                            <span class=" text-danger bg-danger-subtle px-1 rounded">Inactive</span>
                                        @endif
                                    </td>
                                    <td  class="">
                                        <div class="dropdown">
                                            <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('user#profile',$user) }}">View</a></li>
                                                <li><a class="dropdown-item" href="{{ route('user#edit',$user) }}">Edit</a></li>
                                                <li>
                                                    <form action="{{ route('user#destory',$user) }}" method="POST">
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
        <div class="mx-5">
            {{ $users->links() }}
        </div>
@endsection
