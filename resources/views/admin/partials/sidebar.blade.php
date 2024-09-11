<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p>Navigation</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>Components</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" href="{{ route('admin.user.index') }}">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" href="{{ route('admin.jobs.index') }}">
                <i class="mdi mdi-briefcase menu-icon"></i>
                <span class="menu-title">Jobs</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" href="{{ route('admin.categories.index') }}">
                <i class="mdi mdi-tag-multiple menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" href="{{ route('admin.companies.index') }}">
                <i class="mdi mdi-office-building menu-icon"></i>
                <span class="menu-title">Companies</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" href="{{ route('admin.applications') }}">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">Applications</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" href="{{ route('admin.blog.index') }}">
                <i class="mdi mdi-newspaper menu-icon"></i>
                <span class="menu-title">Blogs</span>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>Settings</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.profile') }}"> View Profile </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.updateProfile', ['id' => Auth::guard('admin')->user()->id]) }}"> Edit Profile </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
