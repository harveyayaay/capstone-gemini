@extends('layouts.app')
@section('title', 'Tracker Management')
@section('caption', '(Caption..)')
@section('content')
<div class="pt-2 pl-2 pb-1 mt-5 bg-blue-900 text-white"><h6>Add Tracker</h6></div>

<div class="card">
  <div class="card-body">
    <form action="/admin/tracker-management/store" method="POST">
      @csrf
        @livewire('add-tracker')
    </form>
  </div>
</div>

@endsection
