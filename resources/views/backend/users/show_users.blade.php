@extends('layouts.backend.master')

@section('title')
    {{  trans('backend/users.Users')}}
@endsection

@section('css')

@endsection

@section('content')
    @include('backend.massage')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('backend/users.Users')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}" class="default-color">{{ trans('backend/users.Home')}}</a></li>
                    <li class="breadcrumb-item active"> {{  trans('backend/users.Users')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @can('اضافة مستخدم')
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('users.create') }}">{{  trans('backend/users.Add User')}} </a>
                        </div>
                    @endcan
                    <div class="table-responsive mt-15">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <tr>
                                <th>#</th>
                                <th> {{  trans('backend/users.User Name')}}</th>
                                <th>{{  trans('backend/users.E-mail')}} </th>
                                <th>{{ trans('backend/users.User type')}} </th>
                                <th width="280px">{{  trans('backend/users.Processes')}}</th>
                            </tr>
                            @foreach ($data as $key => $user)
                                <tr style=" text-align: center;">
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('تعديل مستخدم')
                                            <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}">{{ trans('backend/users.Edit')}}</a>
                                        @endcan

                                        @can('حذف مستخدم')
                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit( trans('backend/users.Delete'), ['class' => 'btn btn-danger']) !!}
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
