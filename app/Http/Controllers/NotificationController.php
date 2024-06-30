<?php

namespace App\Http\Controllers;

use App\Mail\MyTestEmail;
use App\Models\Guest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function sendInvitation($id)
    {
        $guest = Guest::find($id);
        //dd($guest);
        $data['name'] = $guest->name;
        $data['eventname'] = $guest->event->name;
        $data['eventdate'] = $guest->event->dateStart;
        $data['starttime'] = $guest->event->timeStart;
        $data['eventveneu'] = $guest->event->veneu;
        $data['eventrsvp'] = "event";
        $data['email'] = "a@test.com"; //$guest->email;

        // The email sending is done using the to method on the Mail facade
        Mail::to($data['email'])->send(new MyTestEmail($data));
    }
}
