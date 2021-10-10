@extends('layouts.backend.master')

@section('title')
{{ trans('backend/users.Add User')}} - {{  trans('backend/users.Muhammed Salama')}}
@stop

@section('Page Title')
{{ trans('backend/users.Add User')}}
@stop



@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
        <a class="btn btn-success" href="{{ route('users.index') }}">{{  trans('backend/users.Back')}}</a>
        </div>
    </div>
</div><br>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>{{  trans('backend/users.Error')}} !</strong> {{  trans('backend/users.There is an error in the data')}}<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ trans('backend/users.User Name')}} </strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ trans('backend/users.E-mail')}} </strong>
            {!! Form::text('email', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> {{ trans('backend/users.Password')}}</strong>
            {!! Form::password('password', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> {{  trans('backend/users.Confirm Password')}} </strong>
            {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{  trans('backend/users.User type')}} </strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">{{ trans('backend/users.Add')}}</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
