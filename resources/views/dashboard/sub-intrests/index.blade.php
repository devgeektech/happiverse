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
                        <h2 class="content-header-title float-left mb-0">Sub Intrest</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Sub Intrest</a>
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
                        <a class="btn-icon btn btn-success btn-round " href="{{route('events.create')}}"><i data-feather="plus"></i></a>
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
                                <h4 class="card-title">List Sub Intrest</h4>
                            </div>
                            <div class="card-datatable">
                                <table class="dt-responsive table dataTable">
                                    <thead>
                                        <tr>

                                            <th>Sub Intrest</th>
                                            <th>Intrest</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($subIntrests as $key=> $item)
                                    <tbody>
                                        <td>{{ $item->interestSubCategoryId }}</td>
                                        <td>{{ $item->interestCategoryId }}</td>


                                        <td>{{ $item->isActive }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ url('orders/'.$item->id.'/show' ) }}"><i data-feather="eye"></i></a>
                                            <a class="btn btn-primary btn-sm" href="{{ url('orders/edit', $item->id) }}"><i data-feather="edit"></i></a>

                                            {!! Form::open(['method' => 'DELETE','url' => ['orders/'.$item->id.'/destroy', $item->id],'style'=>'display:inline']) !!}
                                            {!! Form::button('<i data-feather="trash"></i>', ['type' => 'submit','class'=>'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </td>

                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                            <th>Sub Intrest</th>
                                            <th>Intrest</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
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