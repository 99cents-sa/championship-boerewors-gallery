<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events/index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_name' => 'required|max:255',
            'event_description' => 'required',
        ]);
        $event = Event::create($validatedData);
   
        return redirect('/events')->with('success', 'Event is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.edit', compact('event'));
    }

   // public function edit(Event $event)
   // {
        //
     //   $event = Event::find($event);
       //dd($event);
     //   return view('events.edit', compact('event'));
   // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Event $event)
    //{
        //

      //  $validatedData = $request->validate([
           // 'event_name' => 'required|max:255',
            //'event_description' => 'required',
      //  ]);


    
         // return redirect('/events')->with('success', 'Event is successfully updated');
   // }

   public function update(Request $request, $id)
{
      $request->validate([
        'event_name' => 'required|max:255',
        'event_description' => 'required',
      ]);

      $event = Event::find($id);
      $event->event_name = $request->get('event_name');
      $event->event_description = $request->get('event_description');
      $event->save();

      return redirect('/events')->with('success', 'Event is successfully updated');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
    return redirect()->route('events.index')
    ->with('success','Event deleted successfully');
    }
}
