<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Event::query();

        $events = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('user.dashboard', compact(['events']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEvent($id)
    {
        $event = Event::findOrFail($id);

        return view('user.event.view', compact(['event']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEvent(Request $request, $id)
    {
        $request->validate([
            'teammates' => 'required'
        ]);

        $event = Event::findorfail($id);

        $participate = new Participate();

        $participate->event_id = $event->id;
        $participate->user_id = auth()->user()->id;
        $participate->teammates = trim($request->teammates);

        $participate->save();

        return redirect(route('user.dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function registeredEvent()
    {
        $query = Participate::query();

        $query->where('user_id', auth()->user()->id);

        $participates = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('user.event.registered', compact(['participates']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function registeredEventView($id)
    {
        $participate = Participate::findOrFail($id);

        if ($participate->user_id == auth()->user()->id) {

            return view('user.event.registeredView', compact(['participate']));
        }

        return redirect(route('user.dashboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
