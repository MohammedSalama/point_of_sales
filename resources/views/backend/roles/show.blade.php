@extends('layouts.backend.master')

@section('title')
{{ trans('backend/roles.Users Permissions')}} - {{ trans('backend/roles.Muhammed Salama')}}
@stop

@section('Page Title')
 {{ trans('backend/roles.terms of reference')}} : {{ $role->name }}
@stop


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('roles.index') }}"> {{ trans('backend/roles.Back')}}</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                <span class="badge badge-info">{{ $v->name }},</span>

                @endforeach
            @endif
        </div>
    </div>
</div>
@stop
