@extends('layouts.backend.master')

@section('title')
    {{ trans('backend/roles.Add New Permission')}}
@endsection

@section('css')

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            @can('اضافة صلاحية')
            <div class="col-sm-6">
                <a class="btn btn-success" href="{{ route('roles.create') }}"> {{ trans('backend/roles.Add')}}</a>
            </div>
            @endcan
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}" class="default-color">{{ trans('backend/roles.Home')}}</a></li>
                    <li class="breadcrumb-item active"> {{  trans('backend/roles.Add New Permission') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <strong>{{ trans('backend/roles.Name')}} :</strong><br>
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>
                        </div><br>

                        <div class="col-xl-7 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ trans('backend/roles.Permissions')}}</h5>
                                    <div class="accordion gray plus-icon round">
                                        <div class="acd-group">
                                            <a href="#" class="acd-heading"> {{ trans('backend/roles.Users Permissions')}} </a>
                                            <div class="acd-des">
                                                @foreach($permission as $value)
                                                    <label style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                        {{ $value->name }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-success">{{ trans('backend/roles.Add')}}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
@endsection



@section('js')

@endsection
