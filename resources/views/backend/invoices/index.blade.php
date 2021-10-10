@extends('layouts.backend.master')
@section('css')

@endsection
@section('title')
        {{ trans('backend/invoices.Invoices List') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6"> {{ trans('backend/invoices.Invoices List') }} <h4 class="mb-0"> </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> {{ trans('backend/invoices.Invoices List') }} </a></li>
                    <li class="breadcrumb-item active">{{ trans('backend/invoices.Invoices') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="row">
                        <div class="col mb-3">
                            <a href="{{route('invoices.create')}}" class="btn  btn-outline-primary">
                                {{ trans('backend/invoices.Add new Invoice') }}
                                </a>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('backend/invoices.Invoice number') }}</th>
                                <th>{{ trans('backend/invoices.Invoice date') }}</th>
                                <th>{{ trans('backend/invoices.Section') }}</th>
                                <th>{{ trans('backend/invoices.Product') }}</th>
                                <th>{{ trans('backend/invoices.Price') }}</th>
                                <th>{{ trans('backend/invoices.Discount') }}</th>
                                <th>{{ trans('backend/invoices.Tax Rate') }}</th>
                                <th>{{ trans('backend/invoices.Tax Value') }} </th>
                                <th> {{ trans('backend/invoices.Invoice status') }}</th>
                                <th>{{ trans('backend/invoices.Total') }}</th>
                                <th>{{ trans('backend/invoices.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$invoice->invoice_number}}</td>
                                    <td>{{$invoice->invoice_date}}</td>
                                    <td>{{$invoice->category->name}}</td>
                                    <td>{{$invoice->product->name}}</td>
                                    <td>{{$invoice->price}}</td>
                                    <td>{{$invoice->discount}}</td>
                                    <td>{{$invoice->tax_rate}}</td>
                                    <td>{{$invoice->tax_value}}</td>
                                    <td class={{$invoice->status == 1 ? 'text-danger':'text-success'}}>{{$invoice->status == 1 ? trans('backend/invoices.Unpaid') : trans('backend/invoices.The payment was made') }}</td>
                                    <td>{{$invoice->total}}</td>
                                    <td>
                                        <a href="{{route('invoices.edit',$invoice->id)}}" class="btn btn-info btn-sm"
                                           title="{{ trans('backend/invoices.Edit')}}" role="button" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button class="btn btn-warning btn-sm" title="{{ trans('backend/invoices.Change payment status')}}" data-toggle="modal" data-target="#Payment_status_change{{$invoice->id}}"><i class="fa fa-trash"></i></button>

                                        <button class="btn btn-danger btn-sm" data-invoice_id="{{$invoice->id}}"
                                                data-toggle="modal" data-target="#deletedinvoice"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                 @include('backend.invoices.change_status')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('backend.invoices.deleted')
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $('#deletedinvoice').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>
@endsection