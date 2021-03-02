@extends('layouts.app')
@section('content')
@section('title', 'Employee')
@section('caption', '(Caption..)')

  @livewire('manager.add-employee')


  <script>
    //Setting Max of Input Type Date
    datePickerId.max = new Date().toISOString().split("T")[0];
  </script>

@endsection
