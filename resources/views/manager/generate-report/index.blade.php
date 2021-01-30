@extends('layouts.app')
@section('title', 'Generate Report')
@section('caption', '(Caption..)')
@section('content')

<div class="card mb-3">
  <div class="card-body">
    @livewire('manager.generate-reports')
  </div>
</div>

@endsection