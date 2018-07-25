<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    Returns all post data

//    Shows data in json format
    public function index()
    {
//       return Event::orderBy('id','DESC')->get();

        $events = Event::all();

        return response()->json( $events );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            'frequency' => 'required',
//            'start_date_and_time' => 'required',
//            'lead_start_date' => 'required',
//            'lead_duration' => 'required',
//        ]);
//
//        $create = Event::create($request->all());
//        return response()->json(['status' => 'success', 'msg'=>'Event created successfully']);



        $event = (new  Event())->fill($request->all());
        $event->owner_id=Auth::user()->id;
        $event->save();

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::where('id', '=', $id)->first();

            return response()->json( $event );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Event::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'frequency' => 'required',
            'start_date_and_time' => 'required',
            'lead_start_date' => 'required',
            'lead_duration' => 'required',
        ]);

        $event = Event::find($id);
        if ($event->count()){
            $event->update($request->all());
            return response()->json(['status'=>'success','msg'=>'Event updated successfully']);
        }
            else {
                return response()->json(['status'=>'error','msg'=>'Error in updating event']);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event $event
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $id)
    {
        $event = Event::find($id);
        if ($event->count()){
            $event->delete();
            return response()->json(['status'=>'success','msg'=>'Event deleted successfully']);
        }
        else {
            return response()->json(['status'=>'error','msg'=>'Error in deleting event']);
        }
    }
}
