@extends('layouts.admin')

@section('content')
    <div class="flex flex-col">
        {{--page header--}}
        <div class="flex items-center justify-between bg-gray-50 border-b border-gray-100 p-4">
            <h1 class="text-3xl font-semibold">All Subjects</h1>

            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.subject.create') }}" class="px-4 py-2 rounded-lg bg-green-100 text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white flex items-center space-x-2 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="">New Subject</span>
                </a>
            </div>
        </div>

        <div class="my-6 p-4">
            <div class="grid grid-cols-12">
                <div class="col-span-1 font-medium bg-gray-900 text-white p-2">#</div>
                <div class="col-span-4 font-medium bg-gray-900 text-white p-2">Subject Name</div>
                <div class="col-span-5 font-medium bg-gray-900 text-white p-2">Course</div>
                <div class="col-span-2 font-medium bg-gray-900 text-white p-2">&nbsp;</div>
            </div>

        @foreach ($subjects as $subject)
            <div class="grid grid-cols-12 border-b border-l border-r hover:bg-gray-50 font-base">
                <div class="col-span-1 flex items-center p-4">{{ $loop->index + 1 }}</div>
                <div class="col-span-4 flex items-center p-4">{{ $subject->name }}</div>
                <div class="col-span-4 flex items-center p-4">{{ $subject->course->name }}</div>
                <div class="col-span-2 flex items-center justify-center space-x-2">
                    <a href="{{ route('admin.subject.edit', $subject->id) }}"
                       class="flex items-center space-x-1 text-yellow-500 px-2 py-1 border border-yellow-500 hover:bg-yellow-500 hover:text-white rounded transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold">Edit</span>
                    </a>

                    <form method="POST" action="{{ route('admin.subject.destroy', [ 'subject'=> $subject->id ]) }}" onSubmit="if(!confirm('Are you sure you want to delete this subject?')){return false;}">
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

