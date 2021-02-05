@extends('layouts.app')
@section('content')
<h4 class="text-white">Add Metric</h4>
<p class="text-white mb-3">(Caption..)</p>
<form action="#" method="POST">
  @csrf 
  @livewire('manager.scorecard-management')
</form>

@endsection
