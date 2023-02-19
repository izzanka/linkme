<div>
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown">
        <img class="avatar avatar-sm rounded-circle" src="{{ auth()->user()->getFirstMediaUrl('users','thumb') }}" loading="lazy" alt="profile-image">
        </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <span class="dropdown-header">Account</span>
        <a class="dropdown-item" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path>
                <path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                <path d="M15 8l2 0"></path>
                <path d="M15 12l2 0"></path>
                <path d="M7 16l10 0"></path>
                </svg>
            {{ auth()->user()->username }}
            </a>
            <a class="dropdown-item disabled" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5"></path>
                    <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5"></path>
                    </svg>
                linkme.ferdirns.com/{{ auth()->user()->username_slug }}
                </a>
            <a class="dropdown-item" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                    </svg>
                My Account
            </a>
        <span class="dropdown-header">Support</span>
            <a href="{{ route('sign-out') }}" onclick="event.preventDefault();
            document.getElementById('signout-form').submit();" class="dropdown-item">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                </svg>
            Sign out
        </a>
        <form id="signout-form" action="{{ route('sign-out') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
