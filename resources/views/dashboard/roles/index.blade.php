@extends('home')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Roles</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Roles</a>
                                </li>
                                <li class="breadcrumb-item active">List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div>
                        <a class="btn-icon btn btn-success btn-round " href="{{route('roles.create')}}"><i class="fa-plus fa-solid"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Ajax Sourced Server-side -->
            <section id="ajax-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">List Roles</h4>
                            </div>
                            <div class="card-datatable">


                                <table id="tableRoles" class="table table-bordered table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--/ Ajax Sourced Server-side -->
        </div>
    </div>
</div>
@endsection