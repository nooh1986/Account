<div class="modal fade" id="delete{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    حذف فاتوره
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('Invoice.destroy' , 'test') }}" method="POST">
                    @csrf
                    @method('delete')
                    هل انت متاكد من عمليه الحذف؟
                    <br>

                    <input type="hidden" name="id" value="{{ $invoice->id }}">
                    <br>                    
                    <div class="modal-footer">
                        <button class="btn btn-danger font-weight-bolder" type="submit">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>