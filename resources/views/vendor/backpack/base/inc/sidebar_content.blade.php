
<style>
     [v-cloak] {
            display: none !important;
        }
    </style>

{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- @includeWhen(class_exists(\Backpack\DevTools\DevToolsServiceProvider::class), 'backpack.devtools::buttons.sidebar_item') -->

@role('super-admin')
<li class="nav-item nav-dropdown">
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
@endrole

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper"></i> Live Reporting</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('live') }}"><i class="nav-icon la la-exclamation"></i> Live</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('report') }}"><i class="nav-icon la la-list"></i> Last Reports</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('all-reports') }}"><i class="nav-icon la la-list"></i> All Reports</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper"></i> Articles</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('article') }}"><i class="nav-icon la la-newspaper"></i> Manage</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('article-category') }}"><i class="nav-icon la la-list"></i> Categories</a></li>
        @role('super-admin')
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('article-author') }}"><i class="nav-icon la la-user"></i> Authors </a></li>
        @endrole
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe-europe"></i> Tours & Events</a>
    <ul class="nav-dropdown-items">
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('events') }}"><i class="nav-icon la la-calendar"></i> Events </a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('poker-tournament') }}"><i class="nav-icon la la-icons"></i> Tournaments</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('poker-tour') }}"><i class="nav-icon la la-map"></i> Tours</a></li>
    </ul>
</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('player') }}"><i class="nav-icon la la-user"></i> Players</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('payout') }}"><i class="nav-icon la la-file-invoice"></i> Payouts</a></li>

<!-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('chip-count') }}"><i class="nav-icon la la-coins"></i> Chip counts</a></li> -->

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper"></i> Miscellaneous</a>
    <ul class="nav-dropdown-items">

<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('image-theme') }}"><i class="nav-icon la la-image"></i> Image themes</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon la la-file-o'></i> <span>Pages</span></a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('currency') }}"><i class="nav-icon la la-money"></i> Currencies</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('level') }}"><i class="nav-icon la la-list"></i> Levels</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('live-report-player') }}"><i class="nav-icon la la-users"></i> Live report players</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('country') }}"><i class="nav-icon la la-flag"></i> Countries</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> <span>Settings</span></a></li>

    </ul>
</li>

<!-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> -->
<!-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('live') }}"><i class="nav-icon la la-question"></i> Lives</a></li> -->