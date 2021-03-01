@extends('layouts.app')
@section('title', 'Schedule')
@section('caption', '(Caption..)')
@section('content')

    @livewire('manager.schedule-calendar-view', ["date" => $date])

@endsection