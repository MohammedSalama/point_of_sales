@extends('layouts.backend.master')

@section('title')
        {{  trans('backend/roles.Users Permissions') }}
@endsection

@section('css')

@endsection

@section('content')

    @include('backend.massage')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">  {{ trans('backend/roles.Users Permissions')}} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color"> {{  trans('backend/roles.Home')}}</a></li>
                    <li class="breadcrumb-item active"> {{  trans('backend/roles.Users Permissions')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @can('اضافة صلاحية')
                        <a class="btn btn-success" href="{{ route('roles.create') }}"> {{ trans('backend/roles.Add')}}</a>
                    @endcan

                    <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                        <tr>
                            <th>#</th>
                            <th>{{ trans('backend/roles.Name')}}</th>
                            <th width="280px"> {{ trans('backend/roles.Processes')}}</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                            <tr style=" text-align: center;">
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('عرض صلاحية')
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"> {{ trans('backend/roles.Show')}}</a>
                                    @endcan

                                    @can('تعديل صلاحية')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"> {{ trans('backend/roles.Edit')}}</a>
                                    @endcan

                                    @can('حذف صلاحية')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit( trans('backend/roles.Delete'), ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>


@endsection

@section('js')

@endsection
