@extends('layouts.user_type.auth')

@section('content')
    <script src="/assets/js/plugins/flatpickr.min.js"></script>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Guest Information') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form method="POST" action="{{ route('guest.edit', ['id' => $guest->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-text">
                                {{ $errors->first() }}
                            </span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="m-3 alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text">
                                {{ session('success') }}
                            </span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="salutations" class="form-control-label">{{ __('Guest Salutations') }}</label>
                                <input class="form-control" type="text" placeholder="i.e: Dato/Datin" id="salutations" name="salutations" value="{{ old('salutations', $guest->salutations)}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">{{ __('Guest Name') }}</label>
                                <input class="form-control" type="text" placeholder="i.e: Will Smith" id="name" name="name" value="{{ old('name', $guest->name) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organization" class="form-control-label">{{ __('Organization') }}</label>
                                <input class="form-control" type="text" placeholder="i.e: Synergy Software House" id="organization" name="organization" value="{{ old('organization', $guest->organization) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="form-control-label">{{ __('Address') }}</label>
                                <input class="form-control" type="text" placeholder="i.e: 123 Main St" id="address" name="address" value="{{ old('address', $guest->address) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactNumber" class="form-control-label">{{ __('Contact Number') }}</label>
                                <input class="form-control" type="tel" placeholder="0123456789" id="contactNumber" name="contactNumber" value="{{ old('contactNumber', $guest->contactNumber) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">{{ __('Email') }}</label>
                                <input class="form-control" type="email" placeholder="i.e: example@example.com" id="email" name="email" value="{{ old('email', $guest->email) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bringrep" name="bringrep" {{ $guest->bringrep ? 'checked' : '' }}>
                                <label class="form-check-label" for="bringrep">{{ __('Bring Representative') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="d-flex justify-content-end">
                            <button type="submit" name="edit" value="0"
                                class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>

                            &nbsp;&nbsp;<button type="submit" name="delete" value="1"
                                class="btn bg-gradient-danger btn-md mt-4 mb-4">{{ 'Delete' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
