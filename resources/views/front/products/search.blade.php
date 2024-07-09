@extends('layouts.front')

@section('content')
    <div class="wrap">
        <livewire:product-grid perPage="24" :search="$query" />
    </div>
@endsection