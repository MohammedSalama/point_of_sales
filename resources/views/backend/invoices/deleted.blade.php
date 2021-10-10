<!-- delete -->
<div class="modal fade" id="deletedinvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('backend/invoices.Delete Invoice') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('invoices.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                    <h6 style="color:red">{{ trans('backend/invoices.Are you sure of the process of deleting the invoice ?') }}</h6>
                    </p>
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('backend/invoices.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('backend/invoices.Confirm') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>