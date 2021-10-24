@extends('layouts.admin')

@section('content')
    <div class="flex flex-col">
        {{--page header--}}
        <div class="flex items-center justify-between bg-gray-50 border-b border-gray-100 p-4">
            <h1 class="text-3xl font-semibold">Course List</h1>
            <a href="{{ route('admin.course.create') }}" class="px-4 py-2 rounded-lg bg-green-100 text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white flex items-center space-x-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="">New Course</span>
            </a>
        </div>

        <div class="my-6 p-4">
            <div class="grid grid-cols-12">
                <div class="col-span-1 font-medium bg-gray-900 text-white p-4">#</div>
                <div class="col-span-2 font-medium bg-gray-900 text-white p-4">Course Name</div>
                <div class="col-span-3 font-medium bg-gray-900 text-white p-4">Description</div>
                <div class="col-span-1 font-medium bg-gray-900 text-white p-4">School Year</div>
                <div class="col-span-2 font-medium bg-gray-900 text-white p-4">Subjects</div>
                <div class="col-span-3 font-medium bg-gray-900 text-white p-4">&nbsp;</div>
            </div>

        @foreach ($courses as $course)
            <div class="grid grid-cols-12 border-b border-l border-r hover:bg-gray-50 font-base">
                <div class="col-span-1 flex items-center p-4">{{ $loop->index + 1 }}</div>
                <div class="col-span-2 flex items-center p-4">{{ $course->name }}</div>
                <div class="col-span-3 flex items-center p-4">{{ $course->description }}</div>
                <div class="col-span-1 flex items-center p-4">{{ $course->school_year }}</div>
                <div class="col-span-2 flex items-center p-4">
                    <ul class="list-decimal">
                        @foreach ($course->subjects as $subject)
                            <li class="">{{ $subject->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-span-3 flex items-center justify-center space-x-2">
                    <a href="{{ route('admin.course.edit', $course->id) }}"
                       class="flex items-center space-x-1 text-yellow-500 px-2 py-1 border border-yellow-500 hover:bg-yellow-500 hover:text-white rounded transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold">Edit</span>
                    </a>

                    <form method="POST" action="{{ route('admin.course.destroy', [ 'course'=> $course->id ]) }}" onSubmit="if(!confirm('Are you sure you want to delete this course and its subjects?')){return false;}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="flex items-center space-x-1 text-red-500 px-2 py-1 border border-red-500 hover:bg-red-500 hover:text-white rounded transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <span class="text-sm font-semibold">Delete</span>
                        </button>
                    </form>

                    <a href="{{ route('admin.subject.show', ['subject' => $course->id]) }}" class="flex items-center space-x-1 text-indigo-500 px-2 py-1 border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" enable-background="new 0 0 512 512" class="h-4 w-4" stroke="currentColor" fill="currentColor" version="1.1" viewBox="0 0 512 512" xml:space="preserve"><path d="M0,331v112.295c0,5.383,2.884,10.353,7.559,13.023L106,512V391L0,331z"/><path d="M136 391L136 512 241 452 241 331z"/><path d="M271 331L271 452 376 512 376 391z"/><path d="M406,391v121l98.441-55.682c4.675-2.67,7.559-7.639,7.559-13.022V331L406,391z"/><path d="M391 241L275.246 298.876 391 365.026 507.754 298.876z"/><path d="M262.709,1.583c-4.224-2.111-9.194-2.111-13.418,0L140.246,57.876L256,124.026l115.754-66.151L262.709,1.583z"/><path d="M136 90L136 214.955 241 267.455 241 150z"/><path d="M121 241L4.246 298.876 121 365.026 236.754 298.876z"/><path d="M271 150L271 267.455 376 214.955 376 90z"/></svg>
                        <span class="text-sm font-semibold">Subjects</span>
                    </a>

                    <a href="{{ route('admin.subject.create', ['cid' => $course->id]) }}" class="flex items-center space-x-1 text-green-500 px-2 py-1 border border-green-500 hover:bg-green-500 hover:text-white rounded transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0" y="0" enable-background="new 0 0 512 512" class="h-4 w-4" stroke="currentColor" fill="currentColor" version="1.1" viewBox="0 0 512 512" xml:space="preserve"><path d="M0,331v112.295c0,5.383,2.884,10.353,7.559,13.023L106,512V391L0,331z"/><path d="M136 391L136 512 241 452 241 331z"/><path d="M271 331L271 452 376 512 376 391z"/><path d="M406,391v121l98.441-55.682c4.675-2.67,7.559-7.639,7.559-13.022V331L406,391z"/><path d="M391 241L275.246 298.876 391 365.026 507.754 298.876z"/><path d="M262.709,1.583c-4.224-2.111-9.194-2.111-13.418,0L140.246,57.876L256,124.026l115.754-66.151L262.709,1.583z"/><path d="M136 90L136 214.955 241 267.455 241 150z"/><path d="M121 241L4.246 298.876 121 365.026 236.754 298.876z"/><path d="M271 150L271 267.455 376 214.955 376 90z"/></svg>
                        <span class="text-sm font-semibold">Add Subject</span>
                    </a>
                </div>
            </div>
        @endforeach
        </div>

    </div>
@endsection

