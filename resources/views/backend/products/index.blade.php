@extends('layouts.backend.master')
@section('css')

@section('title')
    {{ trans('backend/products.Products') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('backend/products.Sections') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('backend/products.Settings') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('backend/products.Products') }}</li>
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

                    {{-- button Add new Product --}}
                    <div class="row">
                        <div class="col mb-3">
                            <a href="{{route('products.create')}}" class="btn btn-success" role="button" aria-pressed="true">{{ trans('backend/products.Add new product') }}  </a>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('backend/products.Product name') }} </th>
                                <th>{{ trans('backend/products.Price') }}</th>
                                <th>{{ trans('backend/products.Section name') }} </th>
                                <th>{{ trans('backend/products.Notes') }}</th>
                                <th>{{ trans('backend/products.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->notes == true ? $product->notes :  trans('backend/products.There is no notes')}}</td>
                                    <td>
                                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-info btn-sm" title="{{ trans('backend/products.Edit') }}" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm" data-pro_id="{{$product->id}}"  data-toggle="modal" data-target="#deletedproduct"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('backend.products.deleted')
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $('#deletedproduct').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')
            var modal = $(this)
            modal.find('.modal-body #pro_id').val(pro_id);
        })
        </script>
@endsection
