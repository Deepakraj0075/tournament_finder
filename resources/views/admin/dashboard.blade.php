@extends('layout.index')

@section('title')
admin Dashboard
@endsection

@section('content')
<div class="my-5 mx-5 p-2">
    <div class="grid gird-cols-1 md:grid-cols-2 gap-2">
        @forelse ($events as $event)
        <div class="p-2 my-2 mx-2 shadow-md rounded-md">
            <div class="p-2">
                <p class="my-2"><b>Event By</b></p>
                {{ $event->user->name }}
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <p class="p-2 rounded-md bg-indigo-500 text-white font-weight-bold">Event Type :
                    {{ ucwords($event->type->name) }}
                </p>
                <p class="p-2 rounded-md bg-indigo-500 text-white font-weight-bold">Location :
                    {{ ucwords($event->location) }}</p>
                <p class="p-2 rounded-md bg-indigo-500 text-white font-weight-bold">Event Date :
                    {{ ($event->event_date) }}
                </p>
                <p class="p-2 rounded-md bg-indigo-500 text-white font-weight-bold">Reg. End Date :
                    {{ ucwords($event->end_date) }}
                </p>
            </div>
            <div class="p-2">
                <p class="my-2"><b>Description</b></p>
                {!! $event->description !!}
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <a href="{{ route('admin.event.view', $event->id) }}"
                    class="p-2 bg-blue-500 text-white text-center rounded-md">View</a>
            </div>
        </div>
        @empty
        <div class="p-2 my-2 mx-2 shadow-md rounded-md">
            No events added
        </div>
        @endforelse
    </div>
</div>
@endsection