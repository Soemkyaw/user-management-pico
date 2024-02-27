<nav class=" position-relative">
    <p class="text-muted my-3 px-3 fw-bold">Logo</p>
    {{-- <div class=" text-dark px-3"><i class="fa-solid fa-house"></i></div> --}}
    <div class=" text-dark px-3"><i class="fa-solid fa-users"></i></div>
</nav>
{{-- @auth --}}
<div class="nav-role">
    <p class=" text-muted my-3 px-3 fw-bold">User Management</p>
    <div>
        <p class="d-inline-flex gap-1 px-3">
            <a class=" text-decoration-none fw-bold" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa-solid fa-user me-2"></i>Users
            </a>
          </p>
          <div class="collapse px-3" id="collapseExample">
            <ul>
                <li class="mb-3">User List</li>
                <li class="mb-3">Create User</li>
            </ul>
          </div>
    </div>
    <div>
        <p class="d-inline-flex gap-1 px-3">
            <a class=" text-decoration-none fw-bold" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" >
                <i class="fa-solid fa-user-gear me-2"></i>Role
            </a>
          </p>
          <div class="collapse px-3" id="collapseExample1">
            <ul>
                <li class="mb-3">Role List</li>
                <li class="mb-3"><a href="{{ route('role#create') }}" class=" text-decoration-none text-secondary">Create Role</a></li>
            </ul>
          </div>
    </div>
</div>
{{-- @endauth --}}
