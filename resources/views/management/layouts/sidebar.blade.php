<!-- #Top Bar -->
<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="sidebar-user-panel active">
                    <div class="user-panel">
                        <div class=" image">
                            @if(auth()->check() && auth()->user()->image != null)
                            <img src="{{asset('images/profile').'/'.auth()->user()->image}}" class="img-circle user-img-circle"
                            alt="User Image">
                            @else
                            <img src="{{asset('raja/images/usrbigg.jpg')}}" class="img-circle user-img-circle"
                            alt="User Image">
                            @endif
                        </div>
                    </div>
                    <div class="profile-usertitle">
                        <div class="sidebar-userpic-name">{{auth()->user()->username ?? ''}}</div>
                        <div class="profile-usertitle-job ">Smartlink</div>
                    </div>
                </li>
                <li class="active">
                    <a href="{{url('/')}}" class="">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>

                </li>
                <li>
                    <a  onClick="return false;" class="menu-toggle" href="" >
                        <i class="fas fa-store-alt"></i>
                        <span>References</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{route('reference.index')}}">
                                <span>References List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('reference.create')}}">
                                <span>Add References</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a  onClick="return false;" class="menu-toggle" href="" >
                        <i class="fas fa-store-alt"></i>
                        <span>Customer</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{route('customer.index')}}">
                                <span>Customer List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('customer.create')}}">
                                <span>Add Customer</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a  onClick="return false;" class="menu-toggle" href="" >
                        <i class="fas fa-store-alt"></i>
                        <span>Devices</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{route('device.index')}}">
                                <span>Devices List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('device.create')}}">
                                <span>Add Devices</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a  onClick="return false;" class="menu-toggle" href="" >
                        <i class="fas fa-store-alt"></i>
                        <span>Profile</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{route('profile.index')}}">
                                <span>Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/password')}}">
                                <span>Password</span>
                            </a>
                        </li>
                    </ul>
                </li>
        </div>
    </aside>
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation">
                <a href="#skins" data-toggle="tab" class="active">SKINS</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                <div class="demo-skin">
                    <div class="rightSetting">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list list-unstyled m-t-20">
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Save
                                            History
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Show
                                            Status
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Auto
                                            Submit Issue
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <div class="form-check m-l-10">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked> Show
                                            Status To All
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="rightSetting">
                        <p>SIDEBAR MENU COLORS</p>
                        <button type="button"
                            class="btn btn-sidebar-light btn-border-radius p-l-20 p-r-20">Light</button>
                        <button type="button"
                            class="btn btn-sidebar-dark btn-default btn-border-radius p-l-20 p-r-20">Dark</button>
                    </div>
                    <div class="rightSetting">
                        <p>THEME COLORS</p>
                        <button type="button" class="btn btn-theme-light btn-border-radius p-l-20 p-r-20">Light</button>
                        <button type="button"
                            class="btn btn-theme-dark btn-default btn-border-radius p-l-20 p-r-20">Dark</button>
                    </div>
                    <div class="rightSetting">
                        <p>SKINS</p>
                        <ul class="demo-choose-skin choose-theme list-unstyled">
                            <li data-theme="black" class="actived">
                                <div class="black-theme"></div>
                            </li>
                            <li data-theme="white">
                                <div class="white-theme white-theme-border"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple-theme"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue-theme"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan-theme"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green-theme"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange-theme"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="rightSetting">
                        <p>Disk Space</p>
                        <div class="sidebar-progress">
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-cyan shadow-style width-per-45" role="progressbar"
                                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <small>26% remaining</small>
                            </span>
                        </div>
                    </div>
                    <div class="rightSetting">
                        <p>Server Load</p>
                        <div class="sidebar-progress">
                            <div class="progress m-t-20">
                                <div class="progress-bar l-bg-orange shadow-style width-per-63" role="progressbar"
                                    aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-description">
                                <small>Highly Loaded</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>