@extends('layouts.backend.master')
@section('css')

@section('title')
    {{ trans('backend/categories.Sections') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('backend/categories.Sections') }} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{ trans('backend/categories.Settings') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('backend/categories.Sections') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
     @include('backend.massage')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="row">
                        <div class="col mb-3">
                            <button class="btn btn-success" data-toggle="modal" data-target="#AddCategories">
                                {{ trans('backend/categories.Add New Section') }}
                            </button>
                        </div>

                        @include('backend.categories.create')

                    </div>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('backend/categories.Section name') }} </th>
                                <th>{{ trans('backend/categories.Notes') }}</th>
                                <th>{{ trans('backend/categories.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->notes == true ? $category->notes :  trans('backend/categories.There is no notes') }}</td>
                                    <td>

                                        <button class="btn btn-success btn-sm" title="{{ trans('backend/categories.Edit') }}" data-toggle="modal"
                                                data-target="#Editcategory{{$category->id}}"><i
                                                class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" title="{{ trans('backend/categories.Delete') }}" data-toggle="modal"
                                                data-target="#Deleted{{$category->id}}"><i class="fa fa-trash"></i>
                                        </button>

                                    </td>

                                </tr>

                            @include('backend.categories.edit')
                            @include('backend.categories.deleted')
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')



@endsection
