@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                @if (session('success'))
                    <div class="m-3 alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-text">
                            {{ session('success') }}
                        </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h6 class="mb-0 text-center">{{ __('Thank You') }}</h6>
                <p class="mb-0 text-center">{{ __('Your information has been submitted successfully.') }}</p>
            </div>
        </div>
    </div>
@endsection
