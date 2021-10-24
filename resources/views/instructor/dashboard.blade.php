@extends('layouts.website')

@section('content')
    <div class="container mx-auto grid grid-cols-12 py-8 space-x-6">

        <div class="col-span-9 flex flex-col space-y-6">
            <div class="rounded-xl bg-green-600 p-6 text-white flex items-start space-x-2 flex-wrap">
                <img src="{{ strlen(Auth::user()->profile_photo_path) > 0 ? asset('images/avatar/'.Auth::user()->profile_photo_path) :asset('images/avatar.png') }}" alt="" class="w-20 h-20 rounded-full">
                <div class="w-6/12 pl-4 flex flex-col">
                    <h1 class="font-light text-base">Hi, {{ Auth::user()->profile->first_name }} {{ Auth::user()->profile->last_name }}!</h1>
                    <h1 class="font-bold text-2xl">Welcome to Instructor Portal</h1>
                    <div class="flex flex-col opacity-50 mt-4">
                        @foreach ($student->courses as $course)
                            <h1 class="font-light text-sm whitespace-nowrap">{{ $course->name }}</h1>
                        @endforeach
                    </div>
                </div>
                <div class="w-4/12 flex flex-col">
                    <p class="font-bold">{{ Auth::user()->profile->first_name }} {{ Auth::user()->profile->last_name }} ({{ Auth::user()->role }})</p>
                    <p class="">{{ Auth::user()->email }}</p>
                    <p class="">{{ Auth::user()->profile->gender == 'f' ? 'Female' : 'Male' }}, {{ Auth::user()->profile->age }} Years</p>
                    <p class="">{{ Auth::user()->profile->contact_address }}</p>
                </div>
            </div>

            <div class="grid grid-cols-6 space-x-6 w-full">

                <div class="flex flex-col rounded-xl shadow-lg border border-gray-50 p-6 col-span-3">
                    <h1 class="text-xl font-semibold mb-4">Subjects you teach</h1>
                    @forelse ($student->schedules as $class)
                        <div class="grid grid-cols-6 hover:bg-gray-50">
                            <div class="col-span-4">
                                <div class="flex flex-col py-4 border-t pl-2">
                                    <div class="col-span-3">{{ $class->subject->name }}</div>
                                    <div class="col-span-3 flex space-x-2 text-sm text-gray-500">
                                        {{ $class->course->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 flex flex-col items-start justify-center py-4 border-t">
                                <div class="">{{ $class->subject->fullDay($class->day) }}</div>
                                <div class="flex items-center text-gray-500 text-sm">
                                    <h1 class="">{{ $class->time_start }}</h1>
                                    <div class="w-0 h-4 border-r mx-4">&nbsp;</div>
                                    <h1 class="">{{ $class->time_end }}</h1>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex items-center justify-center py-4 border rounded-lg">
                            No Subjects
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-span-3">
            <div class="flex flex-col">
                <h1 class="text-2xl font-bold mb-4">Today's Classes</h1>
                <div class="flex flex-col divide-y border-t border-b">
                    @foreach ($student->schedules as $class)
                        @if ($class->day === strtolower(substr(date('D'), 0, 2)))
                            <div class="py-4 flex items-center justify-start space-x-4">
                                <div class="w-16 h-16 rounded-full bg-green-300 text-green-700 flex items-center justify-center text-3xl font-bold">
                                    {{ substr($class->subject->name, 0, 1) }}
                                </div>
                                <div class="flex flex-col space-y-1">
                                    <h1 class="font-semibold">{{ $class->subject->name }}</h1>
                                    <div class="flex items-center text-gray-500 text-sm">
                                        <h1 class="">Start  <span class="font-semibold">{{ $class->time_start }}</span></h1>
                                        <div class="w-0 h-4 border-r mx-4">&nbsp;</div>
                                        <h1 class="">End <span class="font-semibold">{{ $class->time_end }}</span></h1>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
