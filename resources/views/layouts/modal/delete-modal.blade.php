<div class="modal fade bd-example-modal-sm" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body container">
            <div class="pb-2">
                <span class="modal-title h5" id="exampleModalCenterTitle">Delete</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h6>Do you want to delete this?</h6>

            <div class="float-right">
                <form action="" id="delete-form" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-transparent text-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-transparent text-primary" type="submit">Yes</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>