<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="form-group">
      <select name="reports" wire:model="reports" id="" class="form-control-sm col-3">
        <option selected hidden>- Select Report to Generate-</option>
        <option value='Completed Applications'>List of Completed Applications</option>
        <option value='Completed Activities'>List of Completed Activities</option>
        <option value='Incomplete Activities'>List of Incomplete Activities</option>
        <!-- <option value='Productivity'>List of out of SLA Activities</option> -->
      </select>
    </div>
    @if($reports == 'Completed Applications')
      @livewire('generate.generate-activities', ["status" => 'Completed', "reference" => 'Application'])
    @elseif($reports == 'Completed Activities')
      @livewire('generate.generate-activities', ["status" => 'Completed', "reference" => 'All'])
    @elseif($reports == 'Incomplete Activities')
      @livewire('generate.generate-activities', ["status" => 'Incomplete', "reference" => 'All'])
    @else
    
    @endif
</div>

