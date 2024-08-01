<nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
    <div class="position-sticky py-4 px-3 sidebar-sticky">
        <ul class="nav flex-column h-100">
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Overview' ? 'active' : ' ' }}" aria-current="page" href="/">
                    <i class="bi-house-fill me-2"></i>
                    Overview
                </a>
            </li>

            <li class="nav-item">
                @if (Auth::user()->role == 'mandorb1')
                    <a class="nav-link {{ $title === 'Data Pekerja' ? 'active' : ' ' }}" href="/list1">
                        <i class="bi-wallet me-2"></i>
                        Input Data
                    </a>
                @elseif (Auth::user()->role == 'mandorb2')
                    <a class="nav-link {{ $title === 'Data Pekerja' ? 'active' : ' ' }}" href="/list2">
                        <i class="bi-wallet me-2"></i>
                        Input Data
                    </a>
                @elseif (Auth::user()->role == 'mandorb3')
                    <a class="nav-link {{ $title === 'Data Pekerja' ? 'active' : ' ' }}" href="/list3">
                        <i class="bi-wallet me-2"></i>
                        Input Data
                    </a>
                @endif
            </li>

            <li class="nav-item">
                @if (Auth::user()->role == 'mandorb1')
                    <a class="nav-link {{ $title === 'Data Linting' ? 'active' : ' ' }}" href="/view1">
                        <i class="bi-wallet me-2"></i>
                        Saved Data
                    </a>
                @elseif (Auth::user()->role == 'mandorb2')
                    <a class="nav-link {{ $title === 'Data Linting' ? 'active' : ' ' }}" href="/view2">
                        <i class="bi-wallet me-2"></i>
                        Saved Data
                    </a>
                @elseif (Auth::user()->role == 'mandorb3')
                    <a class="nav-link {{ $title === 'Data Linting' ? 'active' : ' ' }}" href="/view3">
                        <i class="bi-wallet me-2"></i>
                        Saved Data
                    </a>
                @endif
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="setting.html">
                    <i class="bi-gear me-2"></i>
                    Settings
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="help-center.html">
                    <i class="bi-question-circle me-2"></i>
                    Help Center
                </a>
            </li> --}}

            <li class="nav-item border-top mt-auto pt-2">
                <a class="nav-link" href="/logout">
                    <i class="bi-box-arrow-left me-2"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
