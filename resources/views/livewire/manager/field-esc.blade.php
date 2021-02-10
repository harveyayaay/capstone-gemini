
<td class="text-center">
    <input type="text" class="form-control-sm col-3 mr-auto"  name="esc_actual" wire:model="esc_actual">

    @if($save_btn == true)
      <button wire:click="saveESC()" class="text-white"><i class="fa fa-check-square text-blue-900" aria-hidden="true"></i></button>
    @endif
</td>

