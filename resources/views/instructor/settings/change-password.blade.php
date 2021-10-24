@extends('layouts.website')

@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-12 min-h-screen">

            <div class="col-span-4 col-start-4 flex flex-col mt-6">

                <h1 class="text-2xl font-bold text-gray-700 p-6">Change Password</h1>

                <form action="{{ route('instructor.update-password') }}" method="post" enctype="multipart/form-data" class="flex flex-col p-6 pt-0 space-y-8">
                    @csrf

                    {{--current password--}}
                    <div class="flex flex-col">
                        <label for="current_password" class="flex justify-between w-full">
                            <span class="input-label">Current Password</span>
                            @if ($errors->has('current_password'))
                                <span class="input-error">{{ $errors->first('current_password') }}</span>
                            @endif
                        </label>
                        <input type="password" name="current_password" id="current_password" class="input-text">
                    </div>

                    {{--name--}}
                    <div class="flex items-center w-full space-x-8">

                        <div class="flex flex-col w-1/2">
                            <label for="password" class="flex justify-between w-full">
                                <span class="input-label">New Password</span>
                                @if ($errors->has('password'))
                                    <span class="input-error">{{ $errors->first('password') }}</span>
                                @endif
                            </label>
                            <input type="password" name="password" id="password" class="input-text">
                        </div>

                        <div class="flex flex-col w-1/2">
                            <label for="password_confirmation" class="flex justify-between w-full">
                                <span class="input-label">Password Confirmation</span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="input-error">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="input-text">
                        </div>

                    </div>


                    <div class="w-full flex items-center justify-end">
                        <button type="submit" class="px-6 py-2 rounded-lg bg-green-400 hover:bg-green-500 text-white flex items-center justify-center hover:shadow-xl">
                            Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
