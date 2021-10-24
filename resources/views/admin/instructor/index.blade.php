@extends('layouts.admin')

@section('content')
    <div class="flex flex-col">
        {{--page header--}}
        <div class="flex items-center justify-between bg-gray-50 border-b border-gray-100 p-4">
            <h1 class="text-3xl font-bold text-gray-900">Instructors List</h1>
            <a href="{{ route('admin.instructor.create') }}" class="px-4 py-2 rounded-lg bg-green-100 text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white flex items-center space-x-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="">New Instructor</span>
            </a>
        </div>

        <div class="my-6 p-6">
            <div class="grid grid-cols-12">
                <div class="col-span-1 font-medium bg-gray-800 text-white p-4">#</div>
                <div class="col-span-2 font-medium bg-gray-800 text-white p-4">Name</div>
                <div class="col-span-2 font-medium bg-gray-800 text-white p-4">Email</div>

                <div class="col-span-1 font-medium bg-gray-800 text-white p-2 grid grid-cols-6">
                    <div class="col-span-1 font-medium bg-gray-800 text-white p-2 col-span-3">Gender</div>
                    <div class="col-span-1 font-medium bg-gray-800 text-white p-2 col-span-3">Age</div>
                </div>

                <div class="col-span-2 font-medium bg-gray-800 text-white p-4">Address</div>
                <div class="col-span-2 font-medium bg-gray-800 text-white p-4">Courses</div>
                <div class="col-span-2 font-medium bg-gray-800 text-white p-4">&nbsp;</div>
            </div>

        @foreach ($instructors as $instructor)
            <div class="grid grid-cols-12 border-b border-l border-r hover:bg-gray-50 font-base">
                <div class="col-span-1 flex items-center p-4">{{ $loop->index + 1 }}</div>
                <div class="col-span-2 flex items-center p-4">{{ $instructor->first_name . " " . $instructor->last_name }}</div>
                <div class="col-span-2 flex items-center p-4">{{ $instructor->user->email }}</div>

                <div class="col-span-1 flex items-center grid grid-cols-6">
                    <div class="col-span-3 flex items-center p-4">{{ $instructor->gender == 'm' ? "Male" : "Female" }}</div>
                    <div class="col-span-3 flex items-center p-4">{{ $instructor->age }}</div>
                </div>

                <div class="col-span-2 flex items-center p-4">{{ $instructor->contact_address }}</div>
                <div class="col-span-2 flex items-center p-4">
                    @livewire('instructor.instructor-courses', ['instructor' => $instructor])
                </div>
                <div class="col-span-2 flex items-center justify-center space-x-2">
                    <a onclick="Livewire.emit('openModal', 'instructor.assign-course', {{ json_encode(["instructor" => $instructor]) }})"
                       class="flex items-center space-x-1 text-green-500 px-2 py-1 border border-green-500 hover:bg-green-500 hover:text-white rounded transition-all cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span class="text-sm font-semibold">Courses</span>
                    </a>

                    <a href="{{ route('admin.instructor.edit', ['instructor' => $instructor]) }}"
                       class="flex items-center space-x-1 text-yellow-500 px-2 py-1 border border-yellow-500 hover:bg-yellow-500 hover:text-white rounded transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold">Edit</span>
                    </a>

                    <form method="POST" action="{{ route('admin.instructor.destroy', [ 'instructor'=> $instructor ]) }}" onSubmit="if(!confirm('Are you sure you want to delete this Instructor?')){return false;}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="flex items-center space-x-1 text-red-500 px-2 py-1 border border-red-500 hover:bg-red-500 hover:text-white rounded transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <span class="text-sm font-semibold">Delete</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
        </div>

    </div>
@endsection

