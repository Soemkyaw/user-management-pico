@extends('layout')

@section('content')
    <div class=" mx-5 my-3 card">
        <div class=" d-flex justify-content-between px-3 my-3">
            <div class="col-auto">
                <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search">
            </div>
            <a href="" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Create User</a>
        </div>
        <div class="px-3">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    </th>
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
                        <th class="py-3">1</th>
                        <td class=" py-3 d-flex align-items-center">
                            <span class="text-danger bg-danger-subtle rounded p-2 me-2">{{ substr($user->name, 0, 1) }}</span>
                            <span class="">
                                <div class=" text-muted">{{ $user->name }}</div>
                                <div class=" text-muted" style="font-size: 13px">{{ $user->email }}</div>
                            </span>
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
                                    <li><a class="dropdown-item" href="#">View</a></li>
                                  <li><a class="dropdown-item" href="#">Edit</a></li>
                                  <li><a class="dropdown-item" href="#">Delete</a></li>
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