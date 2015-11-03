@section('mainbar')
<div class="mainbar">

    <div class="container">

        <button type="button" class="btn mainbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
            <i class="fa fa-bars"></i>
        </button>

        <div class="mainbar-collapse collapse">

            <!--<ul class="nav navbar-nav mainbar-nav">

                <li class="active">
                    <a href="index-2.html">
                        <i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>

                <li class="dropdown ">
                    <a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-desktop"></i>
                        UI Features
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="ui-buttons.html"><i class="fa fa-user nav-icon"></i> Buttons</a></li>
                        <li><a href="ui-tabs.html"><i class="fa fa-bars nav-icon"></i> Tabs & Accordions</a></li>
                        <li><a href="ui-notifications.html"><i class="fa fa-asterisk nav-icon"></i> Popups / Notifications</a></li>
                        <li><a href="ui-sliders.html"><i class="fa fa-tasks nav-icon"></i> Sliders</a></li>
                        <li><a href="ui-typography.html"><i class="fa fa-font nav-icon"></i> Typography</a></li>
                        <li><a href="ui-portlets.html"><i class="fa fa-list-alt nav-icon"></i> Portlets</a></li>


                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                &nbsp;&nbsp;Charts & Graphs
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="ui-chart-flot.html">
                                        <i class="fa fa-bar-chart-o"></i>
                                        &nbsp;&nbsp;jQuery Flot
                                    </a>
                                </li>

                                <li>
                                    <a href="ui-chart-morris.html">
                                        <i class="fa fa-bar-chart-o"></i>
                                        &nbsp;&nbsp;Morris.js
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="dropdown ">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-align-left"></i>
                        Data Elements
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Form Elements</li>

                        <li>
                            <a href="ui-form-regular.html">
                                <i class="fa fa-location-arrow nav-icon"></i>
                                Regular Elements
                            </a>
                        </li>

                        <li>
                            <a href="ui-form-extended.html">
                                <i class="fa fa-bolt nav-icon"></i>
                                Extended Plugins
                            </a>
                        </li>

                        <li>
                            <a href="ui-form-validation.html">
                                <i class="fa fa-check nav-icon"></i>
                                Form Validation
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li class="dropdown-header">Data Tables</li>

                        <li>
                            <a href="ui-table-basic.html">
                                <i class="fa fa-table"></i>
                                &nbsp;&nbsp;Basic Tables
                            </a>
                        </li>

                        <li>
                            <a href="ui-table-advanced.html">
                                <i class="fa fa-table"></i>
                                &nbsp;&nbsp;Advanced Tables
                            </a>
                        </li>

                        <li>
                            <a href="ui-table-responsive.html">
                                <i class="fa fa-table"></i>
                                &nbsp;&nbsp;Responsive Tables
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown ">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-files-o"></i>
                        Sample Pages
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="page-profile.html"><i class="fa fa-user nav-icon"></i> Profile</a></li>
                        <li><a href="page-invoice.html"><i class="fa fa-money nav-icon"></i> Invoice</a></li>
                        <li><a href="page-pricing.html"><i class="fa fa-dollar nav-icon"></i> Pricing Plans</a></li>
                        <li><a href="page-support.html"><i class="fa fa-question nav-icon"></i> Support Page</a></li>
                        <li><a href="page-gallery.html"><i class="fa fa-picture-o nav-icon"></i> Gallery</a></li>
                        <li><a href="page-settings.html"><i class="fa fa-cogs nav-icon"></i> Settings</a></li>
                        <li><a href="page-calendar.html"><i class="fa fa-calendar nav-icon"></i> Calendar</a></li>
                    </ul>
                </li>

                <li class="dropdown ">
                    <a href="#contact" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        <i class="fa fa-external-link"></i>
                        Extra Pages
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="page-notifications.html">
                                <i class="fa fa-bell"></i>
                                &nbsp;&nbsp;Notifications
                            </a>
                        </li>

                        <li>
                            <a href="ui-icons.html">
                                <i class="fa fa-smile-o"></i>
                                &nbsp;&nbsp;Font Icons
                            </a>
                        </li>

                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">
                                <i class="fa fa-ban"></i>
                                &nbsp;&nbsp;Error Pages
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="page-404.html">
                                        <i class="fa fa-ban"></i>
                                        &nbsp;&nbsp;404 Error
                                    </a>
                                </li>

                                <li>
                                    <a href="page-500.html">
                                        <i class="fa fa-ban"></i>
                                        &nbsp;&nbsp;500 Error
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu">

                            <a tabindex="-1" href="#">
                                <i class="fa fa-lock"></i>
                                &nbsp;&nbsp;Login Pages
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="account-login.html">
                                        <i class="fa fa-unlock"></i>
                                        &nbsp;&nbsp;Login
                                    </a>
                                </li>

                                <li>
                                    <a href="account-login-social.html">
                                        <i class="fa fa-unlock"></i>
                                        &nbsp;&nbsp;Login Social
                                    </a>
                                </li>

                                <li>
                                    <a href="account-signup.html">
                                        <i class="fa fa-star"></i>
                                        &nbsp;&nbsp;Signup
                                    </a>
                                </li>

                                <li>
                                    <a href="account-forgot.html">
                                        <i class="fa fa-envelope"></i>
                                        &nbsp;&nbsp;Forgot Password
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="page-blank.html">
                                <i class="fa fa-square-o"></i>
                                &nbsp;&nbsp;Blank Page
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
-->
        </div> <!-- /.navbar-collapse -->

    </div> <!-- /.container -->

</div> <!-- /.mainbar -->

@stop