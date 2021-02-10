<div>
  <div class="d-flex justify-content-end">
    <form wire:submit.prevent="save">
      <button type="button" class="btn-link" data-toggle="modal" data-target="#deact">Deactivate account</button>
    </form>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="deact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
          Are you sure you want to Deactivate this account?
        </div>
        <div class="modal-footer">
          <button type="button" class="form-control form-control-sm bg-secondary text-white" data-dismiss="modal">Cancel</button>
          <button name="deact" wire:click="deact" type="button" class="form-control form-control-sm bg-primary text-white">Okay</button>
        </div>
      </div>
    </div>
  </div>
</div>