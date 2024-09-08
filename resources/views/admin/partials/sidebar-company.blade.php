<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p>Navigation</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.dashboard') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>Components</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" href="{{ route('company.jobs') }}">
                <i class="mdi mdi-briefcase menu-icon"></i>
                <span class="menu-title">My Jobs</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" href="{{ route('company.applications') }}">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">Applications</span>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>Settings</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link ajax-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Profile</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('company.profile') }}"> View Profile </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('company.updateProfile', ['id' => Auth::guard('company')->user()->id]) }}"> Edit Profile </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
