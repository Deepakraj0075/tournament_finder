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
            <div class="p-2">
                <p class="my-2"><b>Ground image</b></p>
                <img src="/storage/ground/{{$event->ground}}" alt="" class="h-48">
            </div>
            <div class="p-2">
                <p class="my-2"><b>QR Code</b></p>
                <img src="/storage/qrcode/{{$event->qrcode}}" alt="" class="h-48">
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <a href="{{ route('user.dashboard') }}"
                    class="p-2 bg-blue-500 text-white text-center rounded-md">Back</a>
            </div>
        </div>
        <div class="p-2 my-2 mx-2 shadow-md rounded-md">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('user.event.store', $event->id) }}" method="POST" >
                    @csrf
                    <div class=" overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="teammates"
                                        class="block text-sm font-medium text-gray-700">Teammates</label>
                                    <textarea type="text" name="teammates" id="teammates"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        placeholder="abc" rows="11"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection