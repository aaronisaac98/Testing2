<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $list = Event::paginate(10);
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'theme' => ['required', 'max:50'],
            'dateStart' => ['required'],
            'veneu' => ['max:70']

        ]);

        $pieces = explode(" ", $request['dateStart']);
        if (count($pieces) > 1) {
            $start = $pieces[0];
            $end = $pieces[2];
        } else {
            $start = $request['dateStart'];
            $end = $request['dateStart'];
        }
        // dd($request);
        Event::create([
            'name'    => $attributes['name'],
            'theme' => $attributes['theme'],
            'dateStart'     => $start,
            'dateEnd'     => $end,
            'veneu' => $attributes['veneu'],
            'timeStart'    => $request["timeStart"],
            'timeEnd'    => $request["timeEnd"],
            'maxGuest' => $request["maxGuest"],
            'organizer' => $request["organizer"],
            'about' => $request["about"],
            'created_by' => Auth::user()->id,
        ]);

        return redirect('event')->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        return view('event.edit', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //dd($id);
        $event = Event::find($id);
        //dd($event->name);
        return view('event.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // dd(isset($request["edit"]));
        $event = Event::find($request->id);
        if (isset($request["edit"])) {
            //
            $attributes = request()->validate([
                'name' => ['required', 'max:50'],
                'theme' => ['required', 'max:50'],
                'dateStart' => ['required'],
                'veneu' => ['max:70']

            ]);

            $pieces = explode(" ", $request['dateStart']);
            if (count($pieces) > 1) {
                $start = $pieces[0];
                $end = $pieces[2];
            } else {
                $start = $request['dateStart'];
                $end = $request['dateStart'];
            }


            $event->update([
                'name'    => $attributes['name'],
                'theme' => $attributes['theme'],
                'dateStart'     => $start,
                'dateEnd'     => $end,
                'veneu' => $attributes['veneu'],
                'timeStart'    => $request["timeStart"],
                'timeEnd'    => $request["timeEnd"],
                'maxGuest' => $request["maxGuest"],
                'organizer' => $request["organizer"],
                'about' => $request["about"],
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            return redirect('event')->with('success', 'Record Updated Successfully');
        } else {
            //dd("destroy");

            $event->update(

                [
                    'updated_by' => Auth::id(),
                    'updated_at' => now(),
                ]
            );
            $event->delete();
            return redirect()->route('event.index')->with('success', 'Record Deleted');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // dd("destroy");
        Event::find($request->event)->update(
            [
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]
        );
        Event::find($request->event)->delete();
        return redirect()->route('event.index')->with('success', 'Record Deleted');
        //
        //
    }
}
