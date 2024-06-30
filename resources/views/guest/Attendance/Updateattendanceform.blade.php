@extends('layouts.user_type.auth')

@section('content')
    <script src="/assets/js/plugins/flatpickr.min.js"></script>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Attendance Information') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form method="POST" action="{{ route('guest.Updateattendancestore', ['id' => $guest->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="salutations" class="form-control-label">{{ __('Salutations') }}</label>
                                <p class="form-control-static">{{ $guest->salutations }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">{{ __('Name') }}</label>
                                <p class="form-control-static">{{ $guest->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organization" class="form-control-label">{{ __('Organization') }}</label>
                                <p class="form-control-static">{{ $guest->organization }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactNumber" class="form-control-label">{{ __('Contact Number') }}</label>
                                <p class="form-control-static">{{ $guest->contactNumber }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="radio" id="attendance_yes" name="attendance" value="on" {{ $guest->attendance === 'on' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="attendance_yes">{{ __('Yes, You are attending') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="radio" id="attendance_no" name="attendance" value="off" {{ $guest->attendance === 'off' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="attendance_no">{{ __('No, You are not attending') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($guest->bringrep === 'on')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="checkbox" id="bringrep" name="bringrep" {{ $guest->bringrep === 'yes' ? 'checked' : '' }}>
                                    <label for="bringrep">{{ __('Bringing Representative') }}</label>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4" id="submitBtn">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
