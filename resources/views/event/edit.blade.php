@extends('layouts.user_type.auth')
<script src="/assets/js/plugins/flatpickr.min.js"></script>
@section('content')
    <div>
        <div class="container-fluid">
            <div class="page-header min-height-100 border-radius-xl mt-4"
                style="background-image: url('/assets/img/curved-images/curved00.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-auto">
                    </div>
                    <div class="col-lg-6 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <h6 class="mb-0">{{ $event->name }} {{ __('Event Information') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    {{-- <h6 class="mb-0">{{ $event->name }} {{ __('Event Information') }}</h6> --}}
                </div>
                <div class="card-body pt-4 p-3">
                    <form method="post" action="{{ route('event.update', $event) }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
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
                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success"
                                role="alert">
                                <span class="alert-text text-white">
                                    {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">{{ __('Event Name') }}</label>
                                    <div class="@error('event-name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="i.e : Sambutan Hari Raya"
                                            id="name" name="name" onfocus="focused(this)"
                                            onfocusout="defocused(this)" value="{{ old('name', $event->name) }}">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="theme" class="form-control-label">{{ __('Event Theme') }}</label>
                                    <div class="@error('theme')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ old('theme', $event->theme) }}" type="text"
                                            placeholder="i.e : formal tuxedo" id="theme" name="theme">
                                        @error('theme')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="dateStart" class="form-control-label">{{ __('Event Date') }}</label>
                                    <input type="hidden" value="{{ $event->id }}" name="id">
                                    <input class="form-control datepicker" placeholder="Please select date" id="dateStart"
                                        name="dateStart" type="date" onfocus="focused(this)"
                                        onfocusout="defocused(this)">

                                    <script>
                                        if (document.querySelector('.datepicker')) {
                                            flatpickr('.datepicker', {
                                                mode: "range",
                                                dateFormat: "Y-m-d",
                                                defaultDate: ["{{ $event->dateStart }}", "{{ $event->dateEnd }}"]
                                            });
                                        }
                                    </script>
                                    <div class="@error('dateStart')border border-danger rounded-3 @enderror">
                                        @error('dateStart')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="@error('timeStart') border border-danger rounded-3 @enderror">
                                        <label for="timeStart" class="form-control-label">Start Time</label>
                                        <input class="form-control" type="time"
                                            value={{ old('timeStart', $event->timeStart) }} id="timeStart"
                                            name="timeStart">
                                        @error('timeStart')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="@error('timeEnd') border border-danger rounded-3 @enderror">
                                        <label for="timeEnd" class="form-control-label">End Time</label>
                                        <input class="form-control" type="time"
                                            value={{ old('timeEnd', $event->timeEnd) }} id="timeEnd" name="timeEnd">
                                        @error('timeEnd')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="maxGuest" class="form-control-label">{{ __('Max Guest') }}</label>
                                    <div class="@error('maxGuest')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="number" placeholder="0" id="maxGuest"
                                            name="maxGuest" value={{ old('maxGuest', $event->maxGuest) }}>
                                        @error('maxGuest')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="event.veneu" class="form-control-label">{{ __('Veneu') }}</label>
                                    <div class="@error('event.veneu') border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="i.e : PWTC"
                                            id="name" name="veneu" value="{{ old('veneu', $event->veneu) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="organizer" class="form-control-label">{{ __('Organizer') }}</label>
                                    <div class="@error('organizer') border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text"
                                            placeholder="i.e : Universiti Teknologi Malaysia" id="organizer"
                                            name="organizer" value="{{ old('organizer', $event->organizer) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about">{{ 'Event Details' }}</label>
                            <div class="@error('event.about')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="about" rows="3" placeholder="Say something about the event"
                                    name="about">{{ $event->about }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="edit" value="0"
                                class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>

                            &nbsp;&nbsp;<button type="submit" name="delete" value="1"
                                class="btn bg-gradient-danger btn-md mt-4 mb-4">{{ 'Delete' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
