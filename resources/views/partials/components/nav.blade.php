<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li class="menu-active"><a href="/home">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#category">Find Jobs</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="/contact">Contact</a></li>

        @guest
            <li><a class="ticker-btn" href="{{ route('register') }}">Signup</a></li>
            <li><a class="ticker-btn" href="{{ route('login') }}">Login</a></li>
        @endguest

        @auth
            <li>
                <a class="ticker-btn" href="{{ route('user.dashboard') }}">
                    @if (Auth::user()->profile_photo)
                        <img src="{{ asset('storage/userUploads/' . Auth::user()->profile_photo) }}" alt="Profile Picture" style="width:30px; height:30px; border-radius:50%; object-fit: cover; margin-right: 8px;">
                    @else
                        <img src="https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745" alt="Default Profile Picture" style="width:30px; height:30px; border-radius:50%; margin-right: 8px;">
                    @endif
                    {{ Auth::user()->name }}
                </a>
            </li>
        @endauth
    </ul>
</nav>
