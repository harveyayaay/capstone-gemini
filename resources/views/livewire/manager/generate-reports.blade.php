<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="form-group">
      <!-- <select name="" id="" wire:model="onchange">
        <option selected hidden>- select report to generate-</option>
        <option>Scorecard</option>
        <option>Productivity</option>
      </select> -->
      <select name="reports" wire:model="reports" id="" class="form-control-sm col-3">
        <option selected hidden>- Select Report to Generate-</option>
        <option value='Completed Applications'>List of Completed Applications</option>
        <option value='Completed Activities'>List of Completed Activities</option>
        <option value='Incomplete Activities'>List of Incomplete Activities</option>
        <option value='Productivity'>List of out of SLA Activities</option>
      </select>
    </div>
    @if($reports == 'Completed Activities')
      
    @elseif($reports == 'Productivity')
      dd('Productivity')
    @else
      @livewire('generate.completed-activities')

    


    @endif
</div>

