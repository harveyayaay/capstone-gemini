@extends('layouts.app')
@section('content')
@section('title', 'Scorecard Management')
@section('caption', '(Caption..)')

<form action="#" method="POST">
  @csrf 
  @livewire('manager.scorecard-management')
</form>

@endsection
