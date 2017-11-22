<div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                        <li><a href="{{ url('admin') }}">Pending Orders</a></li>

                        <li><a href="{{ url('Drugdetail') }}">Add Drug Detail</a></li>

                        <li><a href="{{ url('ViewDrugdetail') }}">View Drug Detail</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <i class="fa fa-user-circle-o fa-2x " aria-hidden="true"></i>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('view.pharm.profile') }}">
                                            Profile
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('view.pharm.changepass') }}">
                                            Change Password
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
  
                        
                    </ul>
                </div>