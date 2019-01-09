        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <div class="page-sidebar ">

                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper">

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="ui-profile.html">

                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="ui-profile.html">{{$user->first_name}}</a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>



                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class='wraplist'>


                        <li class="">
                            <a href="{{route('home')}}">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('licenses')}}">
                                <i class="fa fa-file"></i>
                                <span class="title">Licenses</span>
                            </a>
                        </li>

                        <li class="">
                                <a href="{{route('emails')}}">
                                    <i class="fa fa-envelope"></i>
                                    <span class="title">Emails to monitor</span>
                                </a>
                            </li>

                            <li class="">
                                    <a href="{{route('companies')}}">
                                        <i class="fa fa-building"></i>
                                        <span class="title">Companies</span>
                                    </a>
                                </li>


                                <li class="">
                                    <a href="{{route('spams')}}">
                                        <i class="fa fa-phone"></i>
                                        <span class="title">Spam Phone Numbers</span>
                                    </a>
                                </li>












                    </ul>

                </div>
                <!-- MAIN MENU - END -->


<!--
                <div class="project-info">

                    <div class="block1">
                        <div class="data">
                            <span class='title'>New&nbsp;Orders</span>
                            <span class='total'>2,345</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_orders">...</span>
                        </div>
                    </div>

                    <div class="block2">
                        <div class="data">
                            <span class='title'>Visitors</span>
                            <span class='total'>345</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_visitors">...</span>
                        </div>
                    </div>

                </div> -->



            </div>
            <!--  SIDEBAR - END -->

