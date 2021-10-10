@extends('layouts.backend.master')

@section('title')
        {{ trans('backend/invoices.Add new Invoice') }}  
@endsection

@section('css')

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6"> {{ trans('backend/invoices.Add new Invoice') }}  <h4 class="mb-0">   </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('backend/invoices.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('backend/invoices.Invoices List') }} </li>
                </ol>
            </div>
        </div>
    </div>

    @include('backend.massage')

    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('invoices.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>{{ trans('backend/invoices.Invoice number') }} </label>
                                <input type="text" name="invoice_number" value="{{old('invoice_number')}}"
                                       class="form-control @error('invoice_number') is-invalid @enderror" required>
                                @error('invoice_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col">
                                <label>{{ trans('backend/invoices.Invoice date') }} </label>
                                <input class="form-control" type="text" id="datepicker-action" name="invoice_date"
                                       data-date-format="yyyy-mm-dd" title=" {{ trans('backend/invoices.Please enter the invoice date') }}" required>
                                @error('invoice_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <div class="col">
                                <label>{{ trans('backend/invoices.Sections') }}</label>
                                <select name="category_id"
                                        class="form-control p-1  @error('category_id') is-invalid @enderror" required>
                                    <option value="" disabled selected> {{ trans('backend/invoices.Choose from the list') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Products') }}</label>
                                <select name="product_id"
                                        class="form-control p-1 @error('product_id') is-invalid @enderror"></select>
                                @error('product_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Product price') }} </label>
                                <input type="number" name="price" readonly id="price"
                                       class="form-control @error('amount_collection') is-invalid  @enderror">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Discount') }}</label>
                                <input type="number" name="discount" value="0" id="discount" onkeyup="myFunction2()"
                                       class="form-control @error('discount') is-invalid @enderror">
                                @error('discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Total after discount') }}</label>
                                <input type="number" name="total_after_discount" id="total_after_discount" value="0"
                                       readonly class="form-control @error('discount') is-invalid @enderror">
                                @error('discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-6">

                                <label>{{ trans('backend/invoices.Tax Rate') }} </label>
                                <select name="tax_rate" onchange="myFunction1()" id="tax_rate" class="form-control p-1">
                                    <option value="" selected disabled> {{ trans('backend/invoices.Select the tax rate') }} </option>
                                    <option value="5%">5%</option>
                                    <option value="10%">10%</option>
                                </select>
                                @error('tax_rate')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col">
                                <label>{{ trans('backend/invoices.Value of the Tax') }}  </label>
                                <input type="text" readonly name="tax_value" id="tax_value"
                                       class="form-control @error('value_vat') is-invalid @enderror">
                                @error('value_vat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{ trans('backend/invoices.Total') }}</label>
                                <input type="text" readonly name="total" id="total"
                                       class="form-control @error('total') is-invalid @enderror">
                                @error('total')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>{{ trans('backend/invoices.Notes') }}</label>
                                <textarea rows="5" class="form-control" name="notes"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">{{ trans('backend/invoices.Saving Data') }} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endsection

            @section('js')
                {{-- get products --}}
                <script>
                    $(document).ready(function () {
                        $('select[name="category_id"]').on('change', function () {
                            var category_id = $(this).val();
                            if (category_id) {
                                $.ajax({
                                    url: "{{ URL::to('product') }}/" + category_id
                                    , type: "GET"
                                    , dataType: "json"
                                    , success: function (data) {
                                        $('select[name="product_id"]').empty();
                                        $('input[name="price"]').val('');
                                        $('select[name="product_id"]').append('<option selected disabled > {{ trans('backend/invoices.Choose from the list')}}</option>');
                                        $.each(data, function (key, value) {
                                            $('select[name="product_id"]').append('<option value="' + key + '">' + value + '</option>');
                                        });
                                    }
                                    ,
                                });
                            } else {
                                console.log('AJAX load did not work');
                            }
                        });
                    });
                </script>


                {{-- get price --}}
                <script>
                    $(document).ready(function () {
                        $('select[name="product_id"]').on('change', function () {
                            var product_id = $(this).val();
                            if (product_id) {
                                $.ajax({
                                    url: "{{ URL::to('price') }}/" + product_id
                                    , type: "GET"
                                    , dataType: "json"
                                    , success: function (data) {
                                        $('input[name="price"]').val(data);
                                    }
                                });
                            } else {
                                console.log('AJAX load did not work');
                            }
                        });
                    });
                </script>


                <script>
                    function myFunction1(){
                        var total_after_discount = parseFloat(document.getElementById("total_after_discount").value);
                        var tax_rate = parseFloat(document.getElementById("tax_rate").value);
                        {{-- tax_value --}}
                        var cal_tax_value = total_after_discount * tax_rate /100;
                        {{-- total with tax --}}
                        var final_total = parseFloat(cal_tax_value + total_after_discount);
                        document.getElementById("tax_value").value = parseFloat(cal_tax_value).toFixed(2);
                        document.getElementById("total").value = parseFloat(final_total).toFixed(2);
                    }
                    function myFunction2() {
                        var price =  parseFloat(document.getElementById("price").value);
                        var discount =  parseFloat(document.getElementById("discount").value);
                        document.getElementById("total_after_discount").value = price-discount;
                    }
                </script>




@endsection