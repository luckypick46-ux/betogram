@if(Session::has('user_id'))
<script>$("body").removeClass("unregister");</script>
@endif
<!-- Page header top -->
<nav class="navbar navbar-default navbar-xs top_nav">
    <div class="container">
        <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li class="top_bar_logo">
                    <a href="{{ url('login') }}">
                        <img src="{{ asset('assets/front_end/images/logo.png') }}" alt="Betogram">
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right navbar-actions">
                <li class="header_search">
                    <form role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="search" class="form-control" placeholder="Search for people..." name="SearchUsername" onkeyup="SearchByUsername(this.value)" autocomplete="off">
                        </div>
                    </form>
                </li>
                @if(Session::has('user_id'))
                <li class="top_icon">
                    <a href="#" aria-label="Notifications">
                        <img src="{{ asset('assets/front_end/images/notification.png') }}" alt="Notifications">
                    </a>
                </li>
                <li class="top_icon">
                    <a href="#" aria-label="Messages">
                        <img src="{{ asset('assets/front_end/images/messages.png') }}" alt="Messages">
                    </a>
                </li>
                <li class="dropdown profile_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img src="{{ asset('assets/front_end/images/settings.png') }}" alt="Account settings">
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><i class="fa fa-tachometer" aria-hidden="true"></i> User Dashboard</a></li>
                        <li><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a></li>
                        <li><a href="{{ url('change-password') }}"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></li>
                        <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="header_deposit hidden-xs">
                    <a href="{{ url('deposit') }}" class="btn btn-deposit">
                        <i class="fa fa-credit-card"></i> Deposit
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="nav_hight"></div>
<!-- Page header end -->
<script>
function SearchByUsername(username) {
    if (username !== '') {
        $.ajax({
            type: "POST",
            url: "{{ url('search-username') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { username: username },
            success: function(result) {
                console.log(result);
            }
        });
    }
}
</script>