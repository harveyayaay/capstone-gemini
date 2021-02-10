@extends('layouts.app')
@section('content')
@section('title', 'Scorecard')
@section('caption', '(Caption..)')

<form action="#" method="POST">
  @csrf 
  @livewire('manager.scorecard-management')
</form>

@endsection
