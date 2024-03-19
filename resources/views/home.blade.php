@extends('layouts.app-master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <!-- Medal Card -->
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="card card-congratulation-medal">
                            <div class="card-body">
                                <h5>Congratulations 🎉 John!</h5>
                                <p class="card-text font-small-3">You have won gold medal</p>
                                <h3 class="mb-75 mt-2 pt-50">
                                    <a href="javascript:void(0);">${{$totalOrdersAmount ?? NULL}}</a>
                                </h3>
                                <a href="{{route('business-products.index')}}" class="btn btn-primary">Product Sales</a>
                                <img src="{{asset('libraries/images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
                            </div>
                        </div>
                    </div>
                    <!--/ Medal Card -->

                    <!-- Statistics Card -->
                    <div class="col-xl-8 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Order Statistics</h4>
                                <div class="d-flex align-items-center">
                                    <!-- <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p> -->
                                </div>
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i class="avatar-icon fa-hourglass-end fa-solid"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$orderPending ?? NULL}}</h4>
                                                <p class="card-text font-small-3 mb-0">Pending</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i class="fa-solid fa-truck avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$orderShipped ?? NULL}}</h4>
                                                <p class="card-text font-small-3 mb-0">Shipped</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="media">
                                            <div class="avatar bg-light-success mr-2">
                                                <div class="avatar-content">
                                                    <i class="fa-solid fa-check-to-slot avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$orderDelivered ?? NULL}}</h4>
                                                <p class="card-text font-small-3 mb-0">Delivered</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media">
                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i class="fa-solid fa-xmark avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{$orderCancelled ?? NULL}}</h4>
                                                <p class="card-text font-small-3 mb-0">Cancelled</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Statistics Card -->
                </div>

                <div class="row match-height">
                    <div class="col-lg-4 col-12">
                        <div class="row match-height">
                            <!-- Bar Chart - Orders -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card">
                                    <div class="card-body pb-50">
                                        <h6>Business</h6>
                                        <h2 class="font-weight-bolder mb-1">{{$business ?? NULL}}</h2>
                                        <div id="statistics-order-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Bar Chart - Orders -->

                            <!-- Line Chart - Profit -->
                            <div class="col-lg-6 col-md-3 col-6">
                                <div class="card card-tiny-line-stats">
                                    <div class="card-body pb-50">
                                        <h6>Users</h6>
                                        <h2 class="font-weight-bolder mb-1">{{$businessUsers ?? NULL}}</h2>
                                        <div id="statistics-profit-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Line Chart - Profit -->

                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="card">
                                    <div class="card-header align-items-start pb-0">
                                        <div>
                                            <h2 class="font-weight-bolder">{{$activeBusiness ?? NULL}}</h2>
                                            <p class="card-text">Active Business</p>
                                        </div>
                                        <div class="avatar bg-light-primary p-50">
                                            <div class="avatar-content">
                                                <i class="fa-solid fa-chart-simple font-large-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="line-area-chart-6"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="card">
                                    <div class="card-header align-items-start pb-0">
                                        <div>
                                            <h2 class="font-weight-bolder">{{ $activeBusinessAds ?? NULL}}</h2>
                                            <p class="card-text">Active Ads</p>
                                        </div>
                                        <div class="avatar bg-light-info p-50">
                                            <div class="avatar-content">
                                                <i class="fa-audio-description fa-solid font-large-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="line-area-chart-6"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="card">
                                    <div class="card-header align-items-start pb-0">
                                        <div>
                                            <h2 class="font-weight-bolder">{{ $activeBusinessUsers ?? NULL}}</h2>
                                            <p class="card-text">Active Users</p>
                                        </div>
                                        <div class="avatar bg-light-success p-50">
                                            <div class="avatar-content">
                                                <i class="fa-solid fa-user-check font-large-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="line-area-chart-6"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="card">
                                    <div class="card-header align-items-start pb-0">
                                        <div>
                                            <h2 class="font-weight-bolder">{{ $activeOrderCounts ?? NULL}}</h2>
                                            <p class="card-text">Active Orders</p>
                                        </div>
                                        <div class="avatar bg-light-danger p-50">
                                            <div class="avatar-content">
                                                <i class="fa-solid fab fa-codepen font-large-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="line-area-chart-6"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Report Card -->
                    <div class="col-lg-8 col-12">
                        <div class="card card-revenue-budget">
                            <div class="row mx-0">
                                <div class="col-md-8 col-12 revenue-report-wrapper">
                                    <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center mr-2">
                                                <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                                                <span>Earning</span>
                                            </div>
                                            <div class="d-flex align-items-center ml-75">
                                                <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                                                <span>Expense</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="revenue-report-chart"></div>
                                </div>
                                <div class="col-md-4 col-12 budget-wrapper">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            2020
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2018</a>
                                        </div>
                                    </div>
                                    <h2 class="mb-25">$25,852</h2>
                                    <div class="d-flex justify-content-center">
                                        <span class="font-weight-bolder mr-25">Budget:</span>
                                        <span>56,800</span>
                                    </div>
                                    <div id="budget-chart"></div>
                                    <button type="button" class="btn btn-primary">Increase Budget</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Revenue Report Card -->
                </div>

                <div class="row match-height">
                    <!-- Company Table Card -->
                    <div class="col-lg-8 col-12">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="homeBusinessList" class="table table-bordered table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th>Business Name</th>
                                                <th>Owner Name</th>
                                                <th>Email</th>
                                                <th>Address</th>

                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Company Table Card -->




                    <!-- Goal Overview Card -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Goal Overview</h4>
                                <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                            </div>
                            <div class="card-body p-0">
                                <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                                <div class="row border-top text-center mx-0">
                                    <div class="col-6 border-right py-1">
                                        <p class="card-text text-muted mb-0">Completed</p>
                                        <h3 class="font-weight-bolder mb-0">786,617</h3>
                                    </div>
                                    <div class="col-6 py-1">
                                        <p class="card-text text-muted mb-0">In Progress</p>
                                        <h3 class="font-weight-bolder mb-0">13,561</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Goal Overview Card -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-md-row flex-column justify-content-md-between justify-content-start align-items-md-center align-items-start">
                                <h4 class="card-title">Sales</h4>
                                <div class="btn-group btn-group-toggle mt-md-0 mt-1" data-toggle="buttons">
                                    <label class="btn btn-outline-primary active">
                                        <input type="radio" name="radio_options" id="radio_option1" checked="" />
                                        <span>Daily</span>
                                    </label>
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="radio_options" id="radio_option2" />
                                        <span>Monthly</span>
                                    </label>
                                    <label class="btn btn-outline-primary">
                                        <input type="radio" name="radio_options" id="radio_option3" />
                                        <span>Yearly</span>
                                    </label>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="scatter-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Transaction Card -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Transactions</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-primary rounded">
                                            <div class="avatar-content">
                                                <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Wallet</h6>
                                            <small>Starbucks</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-danger">- $74</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-success rounded">
                                            <div class="avatar-content">
                                                <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Bank Transfer</h6>
                                            <small>Add Money</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-success">+ $480</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-danger rounded">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Paypal</h6>
                                            <small>Add Money</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-success">+ $590</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-warning rounded">
                                            <div class="avatar-content">
                                                <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Mastercard</h6>
                                            <small>Ordered Food</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-danger">- $23</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-info rounded">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Transfer</h6>
                                            <small>Refund</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-success">+ $98</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Transaction Card -->
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
@endsection