@extends('layouts.app')
@section('content')
<h4 class="text-white">Add Tracker</h4>
<p class="text-white mb-3">(Caption..)</p>
<div class="card">
  <div class="card-body">
    <form action="/admin/tracker-management/store" method="POST">
      @csrf
        @livewire('add-tracker')
    </form>
  </div>
</div>

@endsection
