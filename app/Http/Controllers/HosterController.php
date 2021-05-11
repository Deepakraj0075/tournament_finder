<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participate;
use App\Models\Type;
use Illuminate\Http\Request;

class HosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $query = Event::query();

        $query->where('user_id', auth()->user()->id);

        $events = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('hoster.dashboard', compact(['events']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        $event = new Event();

        return view('hoster.event.form', compact(['types', 'event']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_type' => 'required',
            'event_date' => 'required',
            'end_date' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        if (empty($request->id)) {

            $event = new Event();
        } else {

            $event = Event::findOrFail($request->id);
        }

        $event->user_id = auth()->user()->id;
        $event->type_id = $request->event_type;
        $event->event_date = $request->event_date;
        $event->end_date = $request->end_date;
        $event->location = $request->location;
        $event->description = $request->description;
        if ($request->hasFile('ground')) {
            $filenameWithExt = $request->file('ground')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('ground')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('ground')->storeAs('public/ground', $fileNameToStore);

            $event->ground = $fileNameToStore;
        }
        if ($request->hasFile('qrcode')) {
            $filenameWithExt = $request->file('qrcode')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('qrcode')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('qrcode')->storeAs('public/qrcode', $fileNameToStore);

            $event->qrcode = $fileNameToStore;
        }

        $event->save();

        return redirect(route('hoster.dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $types = Type::all();

        $event = Event::findOrFail($id);

        if ($event->user_id == auth()->user()->id) {

            return view('hoster.event.form', compact(['event', 'types']));
        }

        return redirect(route('hoster.dashboard'));
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
        $event = Event::findOrFail($id);

        if ($event->user_id == auth()->user()->id) {

            $event->delete();
        }

        return redirect(route('hoster.dashboard'));
    }
    public function viewEvent($id)
    {
        $event = Event::findOrFail($id);
        $participates = Participate::where("event_id", $event->id)->get();

        return view('hoster.event.view', compact(['event', 'participates']));
    }
}
