@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Events</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @if ($events->isEmpty())
                                <div class="card-header pb-0">
                                    No events found. <a href="{{ route('event.create') }}" class="btn bg-gradient-primary btn-sm mb-0">Add Event</a>
                                </div>
                            @else
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Venue</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Organizer</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($events as $event)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $event->name }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $event->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $event->veneu }}</p>
                                                </td>
                                                <td>
                                                    <span class="align-middle text-center text-sm">{{ $event->organizer }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success">{{ $event->dateStart }}</span>
                                                    <span class="badge badge-sm bg-gradient-success">{{ $event->dateEnd }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('guest.registrationform') }}" class="btn bg-gradient-primary btn-sm mb-0"
                                                    type="button">+&nbsp;
                                                    Manage Guest</a>
                                                    <!-- Add actions for each event if needed -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
