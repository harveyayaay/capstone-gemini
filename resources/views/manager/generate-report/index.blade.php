@extends('layouts.app')
@section('title', 'Reports')
@section('caption', '(Caption..)')
@section('content')

<div class="card mb-3 mt-5">
  <div class="card-body">
    @livewire('manager.generate-reports')
  </div>
</div>

@endsection