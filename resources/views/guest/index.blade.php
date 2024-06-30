@extends('layouts.user_type.auth')

@section('content')
    <div>
        @if ($errors->any())
            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                <span class="alert-text text-white">
                    {{ $errors->first() }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif
        @if (session('success'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                    {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Guest List for {{ $event->name }}</h5>
                            </div>
                            <div class="card mb-4 mx-6">
                                <a href={{ route('guestl.create', $event->id) }} class="btn bg-gradient-primary btn-sm mb-0"
                                    type="button">+&nbsp;
                                    New Guest</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-2 pt-2 pb-2">

                        <livewire:event-guest-table eventid='{{ $event->id }}' />

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
