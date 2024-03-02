
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
                <li class="mb-3"><a href="{{ route('user#index') }}" class=" text-decoration-none text-secondary">Users List</a></li>
                <li class="mb-3"><a href="{{ route('user#create') }}" class=" text-decoration-none text-secondary">Create User</a></li>
            </ul>
          </div>
    </div>
    <div>
        <p class="d-inline-flex gap-1 px-3">
            <a class=" text-decoration-none fw-bold" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" >
                <i class="fa-solid fa-list me-2"></i></i>Role
            </a>
          </p>
          <div class="collapse px-3" id="collapseExample1">
            <ul>
                <li class="mb-3"><a href="{{ route('role#index') }}" class=" text-decoration-none text-secondary">Role List</a></li>
                <li class="mb-3"><a href="{{ route('role#create') }}" class=" text-decoration-none text-secondary">Create Role</a></li>
            </ul>
          </div>
    </div>
    <div class="bg-danger-subtle ">
        <form action="{{ route('logout') }}" method="POST" class="d-inline-flex gap-1 px-1">
            @csrf
            <button class=" btn border-0 text-danger fw-bold"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</button>
        </form>
    </div>
</div>
{{-- @endauth --}}
