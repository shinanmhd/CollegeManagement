@extends('layouts.admin')

@section('content')

    <div class="w-full p-10 flex flex-col bg-gray-100">
        <h1 class="text-5xl font-bold text-gray-800">Dashboard</h1>
        <h3 class="text-base text-gray-500 mt-1">{{ date('l jS F Y') }}</h3>
    </div>

    <div class="w-full min-h-screen bg-gray-100 grid grid-cols-12 p-10 pt-0 space-x-8">

        <div class="flex flex-col col-span-8">
            {{--counts--}}
            <div class="rounded-3xl shadow-xl p-10 bg-white flex items-center justify-center">
                <a href="{{ route('admin.student.index') }}" class="flex space-x-3 group">
                    <div class="w-12 h-12 rounded-lg bg-red-300 group-hover:bg-red-400 group-hover:shadow-xl transition-all flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 511.989 511.989" class="h-8 w-8" stroke-width="0%" stroke="currentColor" fill="currentColor"><path d="m470.994 330c0-24.146-17.205-44.348-40-48.994v-54.006c0-4.92-2.412-9.526-6.456-12.329s-9.206-3.445-13.811-1.716l-28.629 10.736c-18.8-19.545-41.652-34.266-66.694-43.303 24.608-18.234 40.59-47.478 40.59-80.388 0-55.141-44.859-100-100-100s-100 44.859-100 100c0 32.91 15.982 62.154 40.59 80.388-25.043 9.038-47.894 23.759-66.694 43.303l-28.629-10.736c-4.606-1.729-9.768-1.087-13.811 1.716-4.044 2.803-6.456 7.409-6.456 12.329v54.006c-22.795 4.646-40 24.847-40 48.994s17.205 44.348 40 48.994v58.006c0 6.253 3.879 11.85 9.733 14.045l160 60c3.374 1.258 7.159 1.258 10.533 0l160-60c5.854-2.195 9.733-7.792 9.733-14.045v-58.006c22.796-4.646 40.001-24.848 40.001-48.994zm-285-230c0-38.598 31.402-70 70-70s70 31.402 70 70-31.402 70-70 70-70-31.402-70-70zm70 100c35.143 0 68.709 12.701 94.899 35.393l-94.899 35.587-94.899-35.587c26.191-22.692 59.757-35.393 94.899-35.393zm-185 130c0-11.028 8.972-20 20-20h10v40h-10c-11.028 0-20-8.972-20-20zm40 49.497c11.397-2.323 20-12.424 20-24.497v-50c0-12.073-8.603-22.174-20-24.497v-31.858l130 48.75v177.961l-130-48.75zm160 95.858v-177.96l130-48.75v31.858c-11.397 2.323-20 12.424-20 24.497v50c0 12.073 8.603 22.174 20 24.497v47.108zm150-125.355h-10v-40h10c11.028 0 20 8.972 20 20s-8.971 20-20 20z"/></svg>
                    </div>
                    <div class="flex flex-col items-left justify-center">
                        <h4 class="text-gray-400 text-sm">Students</h4>
                        <h4 class="text-gray-700 text-lg font-semibold">{{ count($students) }}</h4>
                    </div>
                </a>

                <div class="h-full mx-2 flex-grow flex items-center justify-center">
                    <div class="w-1 h-full border-r"></div>
                </div>

                <a href="{{ route('admin.instructor.index') }}" class="flex space-x-3 group">
                    <div class="w-12 h-12 rounded-lg bg-indigo-300 group-hover:bg-indigo-400 transition-all group-hover:shadow-xl flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-left justify-center">
                        <h4 class="text-gray-400 text-sm">Instructors</h4>
                        <h4 class="text-gray-700 text-lg font-semibold">{{ count($instructors) }}</h4>
                    </div>
                </a>

                <div class="h-full mx-2 flex-grow flex items-center justify-center">
                    <div class="w-1 h-full border-r"></div>
                </div>

                <a href="{{ route('admin.course.index') }}" class="flex space-x-3 group">
                    <div class="w-12 h-12 rounded-lg bg-yellow-300 group-hover:bg-yellow-400 transition-all group-hover:shadow-xl flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048" class="h-6 w-6" stroke-width="1%" stroke="currentColor" fill="currentColor"><path d="M896 1280q0 82-33.5 156.5T768 1566v458l-256-128-256 128v-458q-61-55-94.5-129.5T128 1280q0-79 30-149t82.5-122.5 122-82.5T512 896q79 0 149 30.5t122 82.5 82.5 122 30.5 149zm-384 256q53 0 99.5-20t81.5-55 55-81.5 20-99.5-20-99.5-55-81.5-81.5-55-99.5-20-99.5 20-81.5 55-55 81.5-20 99.5 20 99.5 55 81.5 81.5 55 99.5 20zm128 106q-61 22-123 22-70 0-133-22v174l128-64 128 64v-174zM1920 549v1499H896v-128h896V640h-512V128H384v624q-33 8-65.5 20T256 800V0h1115zm-219-37l-293-293v293h293z"/></svg>
                    </div>
                    <div class="flex flex-col items-left justify-center">
                        <h4 class="text-gray-400 text-sm">Courses</h4>
                        <h4 class="text-gray-700 text-lg font-semibold">{{ count($courses) }}</h4>
                    </div>
                </a>

                <div class="h-full mx-2 flex-grow flex items-center justify-center">
                    <div class="w-1 h-full border-r"></div>
                </div>

                <a class="flex space-x-3 group">
                    <div class="w-12 h-12 rounded-lg bg-blue-300 group-hover:bg-blue-400 transition-all group-hover:shadow-xl flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-left justify-center">
                        <h4 class="text-gray-400 text-sm">Subjects</h4>
                        <h4 class="text-gray-700 text-lg font-semibold">{{ count($subjects) }}</h4>
                    </div>
                </a>

                <div class="h-full mx-2 flex-grow flex items-center justify-center">
                    <div class="w-1 h-full border-r"></div>
                </div>

                <a href="{{ route('admin.transaction.index') }}" class="flex space-x-3 group">
                    <div class="w-12 h-12 rounded-lg bg-purple-300 group-hover:bg-purple-400 transition-all group-hover:shadow-xl flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-left justify-center">
                        <h4 class="text-gray-400 text-sm">Transactions</h4>
                        <h4 class="text-gray-700 text-lg font-semibold">{{ count($transactions) }}</h4>
                    </div>
                </a>
            </div>


            {{--latest transitions--}}
            <div class="mt-10 flex flex-col">
                <div class="flex space-x-6">
                    <div class="w-full bg-gray-900 rounded-3xl flex flex-col overflow-hidden">
                        <h1 class="text-3xl font-bold p-6 pb-4 border-gray-700 text-white">Latest Transactions</h1>
                        @foreach ($transactions->reverse()->take(5) as $transaction)
                            <div class="grid grid-cols-6 ml-6 mr-6 p-4 border-t border-gray-700 hover:bg-gray-800 transition-all">
                                <div class="col-span-2 flex flex-col">
                                    <p class="font-bold text-base text-gray-100">{{ $transaction->student->first_name }} {{ $transaction->student->last_name }}</p>
                                    <p class="text-base text-gray-400">{{ $transaction->student->user->email }}</p>
                                </div>
                                {{--<div class="col-span-3 flex flex-col">--}}
                                    <div class="col-span-2 flex items-center justify-start text-gray-100">
                                        {{ $transaction->transaction_name }}
                                    </div>
                                    <div class="col-span-2 flex items-center justify-start text-gray-100">
                                        {{ Carbon\Carbon::parse($transaction->transaction_date)->format('D M d, Y') }}
                                    </div>
                                {{--</div>--}}
                            </div>
                        @endforeach
                        <a href="{{ route('admin.transaction.index') }}" class="w-full border-t border-gray-600 py-3 mt-10 text-gray-400 hover:text-gray-200 bg-gray-900 hover:bg-gray-700 flex items-center justify-center cursor-pointer">
                            View All
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-4 flex flex-col">
            <div class="rounded-3xl shadow-lg bg-white flex flex-col items-start justify-center overflow-hidden">
                <h1 class="text-2xl font-bold text-gray-800 p-8">Upcoming Classes</h1>

                <div class="p-8 pt-0 flex flex-col divide-y w-full">
                    @forelse ($classesToday as $class)
                        <div class="flex space-x-2 items-center py-4">
                            <div class="w-16 h-16 rounded-3xl bg-green-300 text-green-700 flex items-center justify-center text-3xl font-bold">
                                {{ substr($class->subject->name, 0, 1) }}
                            </div>
                            <div class="grid grid-cols-6 space-x-2 flex-grow">
                                <div class="flex flex-col items-start justify-center col-span-4">
                                    <h1 class="font-semibold text-gray-700">{{ $class->subject->name }}</h1>
                                    <h1 class="font-base text-gray-400 text-sm">{{ $class->course->name }}</h1>
                                </div>
                                <div class="flex flex-col col-span-2 justify-center">
                                    <div class="flex space-x-1 items-center justify-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                        <p class="">{{ \Carbon\Carbon::createFromFormat('H:i:s', $class->time_start)->format('H:i A') }}</p>
                                    </div>
                                    <div class="flex space-x-1 items-center justify-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                        <p class="">{{ \Carbon\Carbon::createFromFormat('H:i:s', $class->time_end)->format('H:i A') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex space-x-2 items-center justify-center py-6">
                            No classes scheduled for today ({{ \Carbon\Carbon::now()->format('l') }})
                        </div>
                    @endforelse
                </div>

                <a href="{{ route('admin.schedule.index') }}" class="w-full border-t py-3 text-gray-400 hover:text-gray-700 bg-white hover:bg-gray-100 flex items-center justify-center cursor-pointer">
                    View All
                </a>

            </div>
        </div>

    </div>
@endsection
