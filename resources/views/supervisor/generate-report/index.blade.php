@extends('layouts.app')
@section('title', 'Reports')
@section('caption', '(Caption..)')
@section('content')

<div class="card mb-3">
  <div class="card-body">
    @livewire('supervisor.generate-reports')
  </div>
</div>

@endsection