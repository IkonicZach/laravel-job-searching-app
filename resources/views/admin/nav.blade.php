<style>
    .container {
        max-width: 1325px !important;
    }
</style>

<div class="admin-nav">
    <a href="{{ route('dashboard') }}" class="admin-nav-item @if (Route::currentRouteName() === 'admin.dashboard') active @endif">
        <i class="fa-solid fa-chalkboard fs-5 col-3"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ route('user.index') }}" class="admin-nav-item @if (Route::currentRouteName() === 'user.index') active @endif">
        <i class="fa-solid fa-users fs-5 col-3"></i>
        <span>Users</span>
    </a>
    <a href="{{ route('category.index') }}" class="admin-nav-item @if (Route::currentRouteName() === 'category.index') active @endif">
        <i class="fa-solid fa-list fs-5 col-3"></i>
        <span>Categories</span>
    </a>
    <a class="admin-nav-item">
        <i class="fa-solid fa-user-tie fs-5 col-3"></i>
        <span>Employers</span>
    </a>
    <a href="{{ route('admin.companies') }}" class="admin-nav-item">
        <i class="fa-solid fa-building fs-5 col-3"></i>
        <span>Companies</span>
    </a>
    <a class="admin-nav-item">
        <i class="fa-solid fa-id-card fs-5 col-3"></i>
        <span>Job Posts</span>
    </a>
</div>
