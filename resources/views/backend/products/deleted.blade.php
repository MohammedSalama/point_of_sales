<!-- delete -->
<div class="modal fade" id="deletedproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('backend/products.Delete Product') }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('products.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                    <h6 style="color:red"> {{ trans('backend/products.Are you sure about the process of deleting the product?') }} </h6>
                    </p>
                    <input type="hidden" name="pro_id" id="pro_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> {{ trans('backend/products.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('backend/products.Confirm') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
