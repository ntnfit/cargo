@php
use App\Models\Infors;
$infors= Infors::first();
@endphp
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{asset($infors->logo)}}" style="max-height: 123px;width: 209px;" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{asset($infors->logo)}}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main" style="margin-top: -63px;">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @can('agent-list')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('agents.index') }}">
                      <i class="ni ni-tv-2 text-orange"></i>
                      <span class="nav-link-text">Agent</span>
                    </a>
                </li>
                @endcan
                @canany(['user-list','role-list'])
                <li class="nav-item">
                    <a class="nav-link active collapsed" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-user">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('User') }}</span>
                    </a>

                    <div class="collapse" id="navbar-user">
                        <ul class="nav nav-sm flex-column">
                           
                           
                            <li class="nav-item">
                                @can('user-list')
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                                @endcan
                                @can('role-list')
                                <a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a>
                                @endcan
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                @canany(['customer-list','receiver-list'])
                <li class="nav-item">
                    <a class="nav-link active collapsed" href="#navbar-customer" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-customer">
                    
                        <i class="ni ni-circle-08" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Kh??ch h??ng') }}</span>
                    </a>

                    <div class="collapse" id="navbar-customer">
                        <ul class="nav nav-sm flex-column">
                           
                           
                            <li class="nav-item">
                                @can('customer-list')
                                <a class="nav-link" href="{{ route('listcustomer') }}">
                                    {{ __('ng?????i g???i') }}
                                </a>
                                @endcan
                                @can('receiver-list')
                                <a class="nav-link" href="{{ route('listreceiver') }}">ng?????i nh???n</a>
                                @endcan
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('icons') }}">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('map') }}">
                        <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('table') }}">
                      <i class="ni ni-bullet-list-67 text-default"></i>
                      <span class="nav-link-text">Tables</span>
                    </a>
                </li> -->
               @can('infor-list')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('infor.index') }}">
                      <i class="ni ni-shop text-orange"></i>
                      <span class="nav-link-text">Infor Cargo</span>
                    </a>
                </li>
                @endcan
                @can('order-list')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}">
                      <i class="ni ni-bag-17 text-red"></i>
                      <span class="nav-link-text">Orders</span>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mawb.index') }}">
                      <i class="ni ni-archive-2 text-yellow"></i>
                      <span class="nav-link-text">Shipment</span>
                    </a>
                </li>
             
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            
            <!-- Navigation -->
          
        </div>
    </div>
</nav>
