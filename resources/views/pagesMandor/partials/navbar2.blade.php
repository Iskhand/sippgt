<style>
    .bunder {
        justify-content: center;
        display: flex;
        align-items: center;
        position: absolute;
        width: 60px;
        height: 60px;
        background-color: #fff;
        padding: 5%;
        border-radius: 50%;
        border: 3px solid #ffc107;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<nav class="navbar navbar-light bg-warning navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none ">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a class="nav-link {{ $title === 'Overview' ? 'active' : ' ' }} " aria-current="page" href="/">
                @if ($title === 'Overview')
                    <div class="bunder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                            class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                        </svg>
                    </div>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        class="bi bi-house" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg>
                @endif

            </a>
        </li>
        <li class="nav-item">
            @if (Auth::user()->role == 'mandorb1')
                <a class="nav-link {{ $title === 'Data Pekerja' ? 'active' : ' ' }}" href="/list1">
                @elseif (Auth::user()->role == 'mandorb2')
                    <a class="nav-link {{ $title === 'Data Pekerja' ? 'active' : ' ' }}" href="/list2">
                    @elseif (Auth::user()->role == 'mandorb3')
                        <a class="nav-link {{ $title === 'Data Pekerja' ? 'active' : ' ' }}" href="/list3">
            @endif
            @if ($title === 'Data Pekerja')
                <div class="bunder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                        class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
                    </svg>
                </div>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                    class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
            @endif
            </a>
        </li>
        <li class="nav-item">
            @if (Auth::user()->role == 'mandorb1')
                <a class="nav-link {{ $title === 'Data Linting' ? 'active' : ' ' }}" href="/view1">
                @elseif (Auth::user()->role == 'mandorb2')
                    <a class="nav-link {{ $title === 'Data Linting' ? 'active' : ' ' }}" href="/view2">
                    @elseif (Auth::user()->role == 'mandorb3')
                        <a class="nav-link {{ $title === 'Data Linting' ? 'active' : ' ' }}" href="/view3">
            @endif
            @if ($title === 'Data Linting')
                <div class="bunder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor"
                        class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                    </svg>
                </div>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                    class="bi bi-bookmark-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                    <path
                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                </svg>
            @endif

            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#logout" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                    class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path
                        d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z" />
                </svg>
            </a>
        </li> --}}
    </ul>
</nav>
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <img src="{{ asset('assetmandor') }}/images/poto.png" class="profile-image img-fluid me-3"
                    alt="">
                <div class="d-flex flex-column">
                    <small>{{ Auth::user()->name }}</small>
                    <a href="#">{{ Auth::user()->email }}</a>
                </div>
                {{-- <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button> --}}

            </div>
            <div class="modal-footer text-center">
                <a href="/logout" class="btn btn-danger">Logout</a>
            </div>
            </form>
        </div>
    </div>
</div>
