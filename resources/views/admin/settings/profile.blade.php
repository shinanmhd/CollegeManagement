@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-12 min-h-screen">
        <div class="col-span-2 h-full border-r">
            @include('admin.settings.settings-nav', ['active' => 'profile'])
        </div>

        <div class="col-span-10 flex flex-col">

            <h1 class="text-2xl font-bold text-gray-700 p-6">Edit Profile</h1>

            <form action="{{ route('admin.update-profile') }}" method="post" enctype="multipart/form-data" class="w-7/12 flex flex-col p-6 pt-0 space-y-8">
                @csrf
                {{--image--}}
                <div class="flex items-center justify-center">
                        <label for="avatar" class="w-28 h-28 rounded-full flex items-center justify-center text-gray-400 bg-gray-100 border my-6 relative overflow-hidden group cursor-pointer">
                            <div class="absolute w-full h-full bg-black bg-opacity-25 group-hover:bg-opacity-50 transition-all flex flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white opacity-50 group-hover:opacity-100 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-white text-xs pt-1 opacity-50 group-hover:opacity-100 transition-all">Change Photo</p>
                            </div>
                            <img src="{{ strlen($user->profile_photo_path) > 0 ? asset('images/avatar/'.$user->profile_photo_path) :asset('images/avatar.png') }}" alt="" id="user_avatar" class="w-full h-full rounded-full">
                        </label>
                        <input type="file" id="avatar" name="avatar" style="display:none" onchange="readURL(this);"/>
                </div>

                {{--name--}}
                <div class="flex items-center w-full space-x-8">
                    <div class="flex flex-col w-1/2">
                        <label for="first_name" class="flex justify-between w-full">
                            <span class="input-label">First Name</span>
                            @if ($errors->has('first_name'))
                                <span class="input-error">{{ $errors->first('first_name') }}</span>
                            @endif
                        </label>
                        <input type="text" name="first_name" id="first_name" class="input-text" value="{{ old('first_name', $user->profile->first_name) }}">
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label for="first_name" class="flex justify-between w-full">
                            <span for="last_name" class="input-label">Last Name</span>
                            @if ($errors->has('last_name'))
                                <span class="input-error">{{ $errors->first('last_name') }}</span>
                            @endif
                        </label>
                        <input type="text" name="last_name" id="last_name" class="input-text" value="{{ old('last_name', $user->profile->last_name) }}">
                    </div>
                </div>

                {{--email--}}
                <div class="flex flex-col">
                    <label for="email" class="flex justify-between w-full">
                        <span class="input-label">Email</span>
                        @if ($errors->has('email'))
                            <span class="input-error">{{ $errors->first('email') }}</span>
                        @endif
                    </label>
                    <input type="email" name="email" id="email" class="input-text" value="{{ old('email', $user->email) }}">
                </div>

                {{--address--}}
                <div class="flex flex-col">
                    <label for="contact_address" class="flex justify-between w-full">
                        <span class="input-label">Contact Address</span>
                        @if ($errors->has('contact_address'))
                            <span class="input-error">{{ $errors->first('contact_address') }}</span>
                        @endif
                    </label>
                    <input type="text" name="contact_address" id="contact_address" class="input-text" value="{{ old('contact_address', $user->profile->contact_address) }}">
                </div>

                {{--gender/age--}}
                <div class="flex items-center w-full space-x-8">
                    <div class="flex flex-col w-1/2">
                        <label for="gender" class="flex justify-between w-full">
                            <span class="input-label">Gender</span>
                            @if ($errors->has('gender'))
                                <span class="input-error">{{ $errors->first('gender') }}</span>
                            @endif
                        </label>
                        <select name="gender" id="gender" class="rounded-md border-gray-300">
                            <option selected>Select Gender</option>
                            <option value="m" {{ $user->profile->gender == 'm' ? 'selected' : '' }}>Male</option>
                            <option value="f" {{ $user->profile->gender == 'f' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label for="age" class="flex justify-between w-full">
                            <span for="age" class="input-label">Age</span>
                            @if ($errors->has('age'))
                                <span class="input-error">{{ $errors->first('age') }}</span>
                            @endif
                        </label>
                        <input type="number" name="age" id="age" class="input-text" value="{{ old('age', $user->profile->age) }}">
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
@endsection

@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('user_avatar').src =  e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
