@extends('layouts.front')

@section('content')
    <div class="profile">
        @if($user->bio)
            <div class="profile__bio">
                <div class="wrap">
                    {{ $user->bio }}
                </div>
            </div>
        @endif
        <div class="profile__products">
            <div class="wrap">
                <livewire:product-grid :userId="$user->id" />
            </div>
        </div>
    </div>
@endsection