@extends('layouts.user_type.auth')

@section('content')
    <div class="container">
        <h1>Guest Information</h1>
        <p>Name: {{ $guest->name }}</p>
        <p>Email: {{ $guest->email }}</p>
        <p>Organization: {{ $guest->organization }}</p>
        
        <!-- Display QR code image -->
        {!! $qrCode !!}
        
        <p>Scan QR code to confirm attendance.</p>
    </div>
@endsection
