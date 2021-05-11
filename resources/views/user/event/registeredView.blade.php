@extends('layout.index')

@section('title')
Event View
@endsection

@section('content')
<div class="my-5 mx-5 p-2">
    <div class="grid gird-cols-1 md:grid-cols-2 gap-2">
        <div class="p-2 my-2 mx-2 shadow-md rounded-md">
            <div class="p-2">
                <p class="my-2"><b>Event By</b></p>
                {{ $participate->event->user->name }}
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <p class="p-2 rounded-md bg-indigo-500 text-white font-weight-bold">Event Type :
                    {{ ucwords($participate->event->type->name) }}
                </p>
                <p class="p-2 rounded-md bg-indigo-500 text-white font-weight-bold">Location :
                    {{ ucwords($participate->event->location) }}</p>
                <p class="p-2 rounded-md bg-indigo-500 text-white font-weight-bold">Event Date :
                    {{ ($participate->event->event_date) }}
                </p>
                <p class="p-2 rounded-md bg-indigo-500 text-white font-weight-bold">Reg. End Date :
                    {{ ucwords($participate->event->end_date) }}
                </p>
            </div>
            <div class="p-2">
                <p class="my-2"><b>Description</b></p>
                {!! $participate->event->description !!}
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <a href="{{ route('user.dashboard') }}"
                    class="p-2 bg-blue-500 text-white text-center rounded-md">Back</a>
            </div>
        </div>
        <div class="p-2 my-2 mx-2 shadow-md rounded-md">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class=" overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label for="teammates" class="block text-sm font-medium text-gray-700">Teammates</label>
                                <textarea type="text" name="teammates" id="teammates"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    placeholder="abc" rows="11" disabled>{{ $participate->teammates }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection