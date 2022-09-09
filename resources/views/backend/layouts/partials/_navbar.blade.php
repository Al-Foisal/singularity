<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-info" style="submit">Logout</button>
            </form>
        </li>
    </ul>
</nav>
