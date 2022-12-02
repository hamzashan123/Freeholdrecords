@extends('layouts.admin')
@section('content')

<!-- Statistics Row -->

@livewire('backend.dashboard-listing')

<livewire:backend.dashboard-statistics-component />

<!-- Chart Row -->
<livewire:backend.dashboard-chart-component />

@endsection