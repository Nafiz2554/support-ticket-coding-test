@extends('admin.admin_master')
@section('admin_content')
    {{-- <img class="w-100 h-100" src="{{ asset('images/pattern.png') }}" alt=""> --}}
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Dashboard</h2>
                    </div>
                </div>
            </div>
            <div class="row column1">
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30 yellow_bg">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="total_no"><b>12</b></p>
                                <p class="head_couter text-white">Logged in</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30 blue1_bg">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-book"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="total_no"><b>12</b></p>
                                <p class="head_couter text-white">Total Ticket</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30 green_bg">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="total_no text-white"><b>12</b> </p>
                                <p class="head_couter text-white">Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30 red_bg">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-comments-o"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <p class="total_no">54</p>
                                <p class="head_couter text-white">Comments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row column1 social_media_section">
                <div class="col-md-6 col-lg-3">
                    <div class="full socile_icons fb margin_bottom_30">
                        <div class="social_icon">
                            <i class="fa fa-facebook"></i>
                        </div>
                        <div class="social_cont">
                            <ul>
                                <li>
                                    <span><strong>35k</strong></span>
                                    <span>Friends</span>
                                </li>
                                <li>
                                    <span><strong>128</strong></span>
                                    <span>Feeds</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full socile_icons tw margin_bottom_30">
                        <div class="social_icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <div class="social_cont">
                            <ul>
                                <li>
                                    <span><strong>584k</strong></span>
                                    <span>Followers</span>
                                </li>
                                <li>
                                    <span><strong>978</strong></span>
                                    <span>Tweets</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full socile_icons linked margin_bottom_30">
                        <div class="social_icon">
                            <i class="fa fa-linkedin"></i>
                        </div>
                        <div class="social_cont">
                            <ul>
                                <li>
                                    <span><strong>758+</strong></span>
                                    <span>Contacts</span>
                                </li>
                                <li>
                                    <span><strong>365</strong></span>
                                    <span>Feeds</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full socile_icons google_p margin_bottom_30">
                        <div class="social_icon">
                            <i class="fa fa-google-plus"></i>
                        </div>
                        <div class="social_cont">
                            <ul>
                                <li>
                                    <span><strong>450</strong></span>
                                    <span>Followers</span>
                                </li>
                                <li>
                                    <span><strong>57</strong></span>
                                    <span>Circles</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
