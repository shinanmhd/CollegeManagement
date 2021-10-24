@extends('layouts.admin')

@section('content')
    <div class="flex flex-col">
        {{--page header--}}
        <div class="flex items-center justify-between bg-gray-50 border-b border-gray-100 p-4">
            <h1 class="text-3xl font-semibold">Add new Course</h1>
            <a href="{{ URL::previous() }}" class="px-4 py-2 rounded-lg text-gray-500 hover:text-gray-800 hover:bg-gray-200 hover:shadow-xl flex items-center space-x-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="">Back</span>
            </a>
        </div>

        {{--form--}}
        <form action="{{ route('admin.course.store') }}" method="post" class="flex flex-col space-y-8 p-12 m-6 w-3/4 border rounded-lg mt-12">
            @csrf

            <div class="flex space-x-8">
                <div class="flex flex-col w-full">
                    <label for="name" class="flex justify-between w-full">
                        <span class="input-label">Course Name</span>
                        @if ($errors->has('name'))
                            <span class="input-error">{{ $errors->first('name') }}</span>
                        @endif
                    </label>
                    <input type="text" name="name" id="name" class="input-text" value="{{ old('name') }}">

                </div>
            </div>

            <div class="flex space-x-8">
                <div class="flex flex-col w-full">
                    <label for="description" class="flex justify-between w-full">
                        <span class="input-label">Course Description</span>
                        @if ($errors->has('description'))
                            <span class="input-error">{{ $errors->first('description') }}</span>
                        @endif
                    </label>
                    <textarea name="description" id="description" rows="2" class="input-text w-full">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="flex space-x-8">
                <div class="flex flex-col w-1/2">
                    <label for="school_year" class="flex justify-between w-full">
                        <span class="input-label">School Year</span>
                        @if ($errors->has('school_year'))
                            <span class="input-error">{{ $errors->first('school_year') }}</span>
                        @endif
                    </label>
                    <input type="text" name="school_year" id="school_year" class="input-text" value="{{ old('school_year') }}">

                </div>
            </div>

            <div class="flex space-x-2 items-center justify-end">
                <a href="{{ URL::previous() }}" type="button"
                    class="border border-gray-700 text-gray-700 rounded-md px-4 py-2 m-2 transition ease select-none hover:text-white hover:bg-gray-800 focus:outline-none focus:shadow-outline">
                    Cancel
                </a>
                <button type="submit"
                    class="border border-green-500 text-green-500 rounded-md px-4 py-2 m-2 transition ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline">
                    Create
                </button>
            </div>

        </form>

    </div>
@endsection
