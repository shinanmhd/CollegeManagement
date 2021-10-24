@extends('layouts.admin')

@section('content')
    <div class="flex flex-col p-4">
        {{--page header--}}
        <div class="flex items-center justify-between pb-4 border-b">
            <h1 class="text-3xl font-semibold">Add new Instructor</h1>
            <a href="{{ URL::previous() }}" class="px-4 py-2 rounded-lg text-gray-500 hover:text-gray-800 hover:bg-gray-200 hover:shadow-xl flex items-center space-x-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="">Back</span>
            </a>
        </div>

        {{--form--}}
        <form action="{{ route('admin.instructor.store') }}" method="post" class="flex flex-col space-y-8 p-12 w-3/4 border rounded-lg mt-12">
            @csrf

            <div class="flex space-x-8">
                <div class="flex flex-col w-1/2">
                    <label for="first_name" class="flex justify-between w-full">
                        <span class="input-label">First Name</span>
                        @if ($errors->has('first_name'))
                            <span class="input-error">{{ $errors->first('first_name') }}</span>
                        @endif
                    </label>
                    <input type="text" name="first_name" id="first_name" class="input-text" value="{{ old('first_name') }}">

                </div>
                <div class="flex flex-col w-1/2">
                    <label for="first_name" class="flex justify-between w-full">
                        <span for="last_name" class="input-label">Last Name</span>
                        @if ($errors->has('last_name'))
                            <span class="input-error">{{ $errors->first('last_name') }}</span>
                        @endif
                    </label>
                    <input type="text" name="last_name" id="last_name" class="input-text" value="{{ old('last_name') }}">
                </div>
            </div>

            <div class="flex space-x-8">

                <div class="flex flex-col w-1/4">
                    <label for="email" class="flex justify-between w-full">
                        <span class="input-label">Email</span>
                        @if ($errors->has('email'))
                            <span class="input-error">{{ $errors->first('email') }}</span>
                        @endif
                    </label>
                    <input type="text" name="email" id="email" class="input-text" value="{{ old('email') }}">
                </div>

                <div class="flex flex-col w-1/4">
                    <label for="age" class="flex justify-start space-x-8">
                        <span class="input-label">Age</span>
                        @if ($errors->has('age'))
                            <span class="input-error">{{ $errors->first('age') }}</span>
                        @endif
                    </label>
                    <input type="number" name="age" id="age" class="input-text" value="{{ old('age') }}">
                </div>


                <div class="flex flex-col w-1/4">
                    <label class="flex justify-between w-full">
                        <span class="input-label">Gender</span>
                        @if ($errors->has('gender'))
                            <span class="input-error">{{ $errors->first('gender') }}</span>
                        @endif
                    </label>
                    <div class="flex space-x-10 mt-2">
                        <div class="flex space-x-2">
                            <input type="radio" name="gender" id="male" class="mt-0.5" value="m" {{ old('gender') == 'm' ? 'checked' : '' }}>
                            <label for="male" class="input-label">Male</label>
                        </div>

                        <div class="flex space-x-2">
                            <input type="radio" name="gender" id="female" class="mt-0.5" value="f" {{ old('gender') == 'f' ? 'checked' : '' }}>
                            <label for="female" class="input-label">Female</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex space-x-8">
                <div class="flex flex-col w-full">
                    <label for="contact_address" class="flex justify-between w-full">
                        <span class="input-label">Contact Address</span>
                        @if ($errors->has('contact_address'))
                            <span class="input-error">{{ $errors->first('contact_address') }}</span>
                        @endif
                    </label>
                    <textarea name="contact_address" id="contact_address" rows="2" class="input-text w-full">{{ old('contact_address') }}</textarea>
                </div>
            </div>

            <div class="flex space-x-8">
                <div class="flex flex-col w-1/2">
                    <label for="password" class="flex justify-between w-full">
                        <span class="input-label">Password</span>
                        @if ($errors->has('password'))
                            <span class="input-error">{{ $errors->first('password') }}</span>
                        @endif
                    </label>
                    <input type="password" name="password" id="password" class="input-text">
                </div>
                <div class="flex flex-col w-1/2">
                    <label for="password_confirmation" class="flex justify-between w-full">
                        <span class="input-label">Repeat Password</span>
                        @if ($errors->has('repeat_password'))
                            <span class="input-error">{{ $errors->first('repeat_password') }}</span>
                        @endif
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="input-text">
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
