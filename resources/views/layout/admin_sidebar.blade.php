<div class="sidebar" data-image="{{ asset('img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'table') active @endif">
                <a class="nav-link" href="{{route('employee')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Employee</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'schedule') active @endif">
                <a class="nav-link" href="{{route('schedule')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Schedule</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'bus') active @endif">
                <a class="nav-link" href="{{route('bus')}}">
                    <i class="nc-icon nc-delivery-fast"></i>
                    <p>Bus</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'track') active @endif">
                <a class="nav-link" href="/track">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>Track</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'city') active @endif">
                <a class="nav-link" href="/city">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>City</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'notifications') active @endif">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bg-danger" href="">
                    <i class="nc-icon nc-alien-33"></i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>
