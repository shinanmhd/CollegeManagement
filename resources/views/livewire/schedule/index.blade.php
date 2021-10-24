<div class="flex flex-col">
    {{--page header--}}
    <div class="flex items-center justify-between bg-gray-50 border-b border-gray-100 p-4">
        <h1 class="text-3xl font-bold text-gray-900">Schedule</h1>
        <a wire:click="$emit('openModal', 'schedule.create')" class="px-4 py-2 rounded-lg bg-green-100 text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white flex items-center space-x-2 transition-all cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="">Add</span>
        </a>
    </div>

    <div class="flex flex-col p-4">
        <div class="grid grid-cols-12 divide-x divide-y border-r border-b group-scope">
            <div class="border-l border-t flex items-center justify-center py-2 bg-gray-100 group-scope-hover:bg-red-600 group-scope-hover:text-white transition-all">SUN</div>
            <div class="col-span-11 flex items-center justify-start space-x-2 p-2 overflow-x-auto group-scope-hover:bg-red-50">
                @foreach ($sunday as $su)
                    <div class="p-4 flex flex-col bg-yellow-200 shadow hover:shadow-xl transition-all text-sm relative group" style="min-width: 250px">
                        <h1 class="font-bold">{{ $su->subject->name }}</h1>
                        <h1 class="italic">{{ $su->course->name }}</h1>
                        <h2 class="">{{ Carbon\Carbon::parse($su->time_start)->format('H:i') }} - {{ Carbon\Carbon::parse($su->time_end)->format('H:i') }}</h2>
                        <a wire:click="$emit('openModal', 'schedule.students', {{ json_encode(["schedule_id" => $su->id]) }})"
                            class="hover:underline font-bold mt-2 flex items-center space-x-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <p class="">{{ count($su->students) }} Students</p>
                        </a>

                        <a wire:click="$emit('openModal', 'schedule.instructors', {{ json_encode(["schedule_id" => $su->id]) }})" class="font-bold mt-2 cursor-pointer hover:underline">
                            Instructors:
                        </a>
                        <div class="flex items-center space-x-2">
                            @foreach($su->instructors as $cInstructor)
                                <p class="flex">
                                    {{ $cInstructor->gender == 'm' ? 'Mr.' : 'Ms.' }}
                                    {{ $cInstructor->first_name }} {{ $cInstructor->last_name }},
                                </p>
                            @endforeach
                        </div>

                        {{--actions--}}
                        <div class="z-50 absolute bottom-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100">
                            <a wire:click="$emit('openModal', 'schedule.edit-item', {{ json_encode(["schedule" => $su]) }})"
                                class="w-6 h-6 rounded-full bg-green-300 flex items-center justify-center transition-all text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <a onclick="confirm('Are you sure you want to remove the scheduled class?') || event.stopImmediatePropagation()" wire:click="deleteClass({{$su}})"
                                class="w-6 h-6 rounded-full bg-red-300 flex items-center justify-center transition-all text-red-900 hover:bg-red-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-12 divide-x divide-y border-r border-b group-scope">
            <div class="border-l border-t flex items-center justify-center py-2 bg-gray-100 group-scope-hover:bg-red-600 group-scope-hover:text-white transition-all">MON</div>
            <div class="col-span-11 flex items-center justify-start space-x-2 p-2 overflow-x-auto group-scope-hover:bg-red-50">
                @foreach ($monday as $mo)
                    <div class="p-4 flex flex-col bg-yellow-200 shadow hover:shadow-xl transition-all text-sm relative group" style="min-width: 250px">
                        <h1 class="font-bold">{{ $mo->subject->name }}</h1>
                        <h1 class="italic">{{ $mo->course->name }}</h1>
                        <h2 class="">Mr.Pravin</h2>
                        <h2 class="">{{ Carbon\Carbon::parse($mo->time_start)->format('H:i') }} - {{ Carbon\Carbon::parse($mo->time_end)->format('H:i') }}</h2>
                        <a wire:click="$emit('openModal', 'schedule.students', {{ json_encode(["schedule_id" => $mo->id]) }})"
                           class="hover:underline font-bold mt-2 flex items-center space-x-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <p class="">{{ count($mo->students) }} Students</p>
                        </a>

                        <a wire:click="$emit('openModal', 'schedule.instructors', {{ json_encode(["schedule_id" => $mo->id]) }})" class="font-bold mt-2 cursor-pointer hover:underline">
                            Instructors:
                        </a>
                        <div class="flex items-center space-x-2">
                            @foreach($mo->instructors as $cInstructor)
                                <p class="flex">
                                    {{ $cInstructor->gender == 'm' ? 'Mr.' : 'Ms.' }}
                                    {{ $cInstructor->first_name }} {{ $cInstructor->last_name }},
                                </p>
                            @endforeach
                        </div>

                        {{--actions--}}
                        <div class="z-50 absolute bottom-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100">
                            <a wire:click="$emit('openModal', 'schedule.edit-item', {{ json_encode(["schedule" => $mo]) }})"
                               class="w-6 h-6 rounded-full bg-green-300 flex items-center justify-center transition-all text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <a onclick="confirm('Are you sure you want to remove the scheduled class?') || event.stopImmediatePropagation()" wire:click="deleteClass({{$mo}})"
                               class="w-6 h-6 rounded-full bg-red-300 flex items-center justify-center transition-all text-red-900 hover:bg-red-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-12 divide-x divide-y border-r border-b group-scope">
            <div class="border-l border-t flex items-center justify-center py-2 bg-gray-100 group-scope-hover:bg-red-600 group-scope-hover:text-white transition-all">TUE</div>
            <div class="col-span-11 flex items-center justify-start space-x-2 p-2 overflow-x-auto group-scope-hover:bg-red-50">
                @foreach ($tuesday as $tu)
                    <div class="p-4 flex flex-col bg-yellow-200 shadow hover:shadow-xl transition-all text-sm relative group" style="min-width: 250px">
                        <h1 class="font-bold">{{ $tu->subject->name }}</h1>
                        <h1 class="italic">{{ $tu->course->name }}</h1>
                        <h2 class="">Mr.Pravin</h2>
                        <h2 class="">{{ Carbon\Carbon::parse($tu->time_start)->format('H:i') }} - {{ Carbon\Carbon::parse($tu->time_end)->format('H:i') }}</h2>
                        <a wire:click="$emit('openModal', 'schedule.students', {{ json_encode(["schedule_id" => $tu->id]) }})"
                           class="hover:underline font-bold mt-2 flex items-center space-x-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <p class="">{{ count($tu->students) }} Students</p>
                        </a>

                        <a wire:click="$emit('openModal', 'schedule.instructors', {{ json_encode(["schedule_id" => $tu->id]) }})" class="font-bold mt-2 cursor-pointer hover:underline">
                            Instructors:
                        </a>
                        <div class="flex items-center space-x-2">
                            @foreach($tu->instructors as $cInstructor)
                                <p class="flex">
                                    {{ $cInstructor->gender == 'm' ? 'Mr.' : 'Ms.' }}
                                    {{ $cInstructor->first_name }} {{ $cInstructor->last_name }},
                                </p>
                            @endforeach
                        </div>

                        {{--actions--}}
                        <div class="absolute bottom-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100">
                            <a wire:click="$emit('openModal', 'schedule.edit-item', {{ json_encode(["schedule" => $tu]) }})"
                               class="w-6 h-6 rounded-full bg-green-300 flex items-center justify-center transition-all text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <a onclick="confirm('Are you sure you want to remove the scheduled class?') || event.stopImmediatePropagation()" wire:click="deleteClass({{$tu}})"
                               class="w-6 h-6 rounded-full bg-red-300 flex items-center justify-center transition-all text-red-900 hover:bg-red-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-12 divide-x divide-y border-r border-b group-scope">
            <div class="border-l border-t flex items-center justify-center py-2 bg-gray-100 group-scope-hover:bg-red-600 group-scope-hover:text-white transition-all">WED</div>
            <div class="col-span-11 flex items-center justify-start space-x-2 p-2 overflow-x-auto group-scope-hover:bg-red-50">
                @foreach ($wednesday as $we)
                    <div class="p-4 flex flex-col bg-yellow-200 shadow hover:shadow-xl transition-all text-sm relative group" style="min-width: 250px">
                        <h1 class="font-bold">{{ $we->subject->name }}</h1>
                        <h1 class="italic">{{ $we->course->name }}</h1>
                        <h2 class="">Mr.Pravin</h2>
                        <h2 class="">{{ Carbon\Carbon::parse($we->time_start)->format('H:i') }} - {{ Carbon\Carbon::parse($we->time_end)->format('H:i') }}</h2>
                        <a wire:click="$emit('openModal', 'schedule.students', {{ json_encode(["schedule_id" => $we->id]) }})"
                           class="hover:underline font-bold mt-2 flex items-center space-x-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <p class="">{{ count($we->students) }} Students</p>
                        </a>

                        <a wire:click="$emit('openModal', 'schedule.instructors', {{ json_encode(["schedule_id" => $we->id]) }})" class="font-bold mt-2 cursor-pointer hover:underline">
                            Instructors:
                        </a>
                        <div class="flex items-center space-x-2">
                            @foreach($we->instructors as $cInstructor)
                                <p class="flex">
                                    {{ $cInstructor->gender == 'm' ? 'Mr.' : 'Ms.' }}
                                    {{ $cInstructor->first_name }} {{ $cInstructor->last_name }},
                                </p>
                            @endforeach
                        </div>

                        {{--actions--}}
                        <div class="absolute bottom-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100">
                            <a wire:click="$emit('openModal', 'schedule.edit-item', {{ json_encode(["schedule" => $we]) }})"
                               class="w-6 h-6 rounded-full bg-green-300 flex items-center justify-center transition-all text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <a onclick="confirm('Are you sure you want to remove the scheduled class?') || event.stopImmediatePropagation()" wire:click="deleteClass({{$we}})"
                               class="w-6 h-6 rounded-full bg-red-300 flex items-center justify-center transition-all text-red-900 hover:bg-red-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-12 divide-x divide-y border-r border-b group-scope">
            <div class="border-l border-t flex items-center justify-center py-2 bg-gray-100 group-scope-hover:bg-red-600 group-scope-hover:text-white transition-all">THU</div>
            <div class="col-span-11 flex items-center justify-start space-x-2 p-2 overflow-x-auto group-scope-hover:bg-red-50">
                @foreach ($thursday as $th)
                    <div class="p-4 flex flex-col bg-yellow-200 shadow hover:shadow-xl transition-all text-sm relative group" style="min-width: 250px">
                        <h1 class="font-bold">{{ $th->subject->name }}</h1>
                        <h1 class="italic">{{ $th->course->name }}</h1>
                        <h2 class="">Mr.Pravin</h2>
                        <h2 class="">{{ Carbon\Carbon::parse($th->time_start)->format('H:i') }} - {{ Carbon\Carbon::parse($th->time_end)->format('H:i') }}</h2>
                        <a wire:click="$emit('openModal', 'schedule.students', {{ json_encode(["schedule_id" => $th->id]) }})"
                           class="hover:underline font-bold mt-2 flex items-center space-x-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <p class="">{{ count($th->students) }} Students</p>
                        </a>

                        <a wire:click="$emit('openModal', 'schedule.instructors', {{ json_encode(["schedule_id" => $th->id]) }})" class="font-bold mt-2 cursor-pointer hover:underline">
                            Instructors:
                        </a>
                        <div class="flex items-center space-x-2">
                            @foreach($th->instructors as $cInstructor)
                                <p class="flex">
                                    {{ $cInstructor->gender == 'm' ? 'Mr.' : 'Ms.' }}
                                    {{ $cInstructor->first_name }} {{ $cInstructor->last_name }},
                                </p>
                            @endforeach
                        </div>

                        {{--actions--}}
                        <div class="absolute bottom-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100">
                            <a wire:click="$emit('openModal', 'schedule.edit-item', {{ json_encode(["schedule" => $th]) }})"
                               class="w-6 h-6 rounded-full bg-green-300 flex items-center justify-center transition-all text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <a onclick="confirm('Are you sure you want to remove the scheduled class?') || event.stopImmediatePropagation()" wire:click="deleteClass({{$th}})"
                               class="w-6 h-6 rounded-full bg-red-300 flex items-center justify-center transition-all text-red-900 hover:bg-red-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-12 divide-x divide-y border-r border-b group-scope">
            <div class="border-l border-t flex items-center justify-center py-2 bg-gray-100 group-scope-hover:bg-red-600 group-scope-hover:text-white transition-all">FRI</div>
            <div class="col-span-11 flex items-center justify-start space-x-2 p-2 overflow-x-auto group-scope-hover:bg-red-50">
                @foreach ($friday as $fr)
                    <div class="p-4 flex flex-col bg-yellow-200 shadow hover:shadow-xl transition-all text-sm relative group" style="min-width: 250px">
                        <h1 class="font-bold">{{ $fr->subject->name }}</h1>
                        <h1 class="italic">{{ $fr->course->name }}</h1>
                        <h2 class="">Mr.Pravin</h2>
                        <h2 class="">{{ Carbon\Carbon::parse($fr->time_start)->format('H:i') }} - {{ Carbon\Carbon::parse($fr->time_end)->format('H:i') }}</h2>
                        <a wire:click="$emit('openModal', 'schedule.students', {{ json_encode(["schedule_id" => $fr->id]) }})"
                           class="hover:underline font-bold mt-2 flex items-center space-x-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <p class="">{{ count($fr->students) }} Students</p>
                        </a>

                        <a wire:click="$emit('openModal', 'schedule.instructors', {{ json_encode(["schedule_id" => $fr->id]) }})" class="font-bold mt-2 cursor-pointer hover:underline">
                            Instructors:
                        </a>
                        <div class="flex items-center space-x-2">
                            @foreach($fr->instructors as $cInstructor)
                                <p class="flex">
                                    {{ $cInstructor->gender == 'm' ? 'Mr.' : 'Ms.' }}
                                    {{ $cInstructor->first_name }} {{ $cInstructor->last_name }},
                                </p>
                            @endforeach
                        </div>

                        {{--actions--}}
                        <div class="absolute bottom-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100">
                            <a wire:click="$emit('openModal', 'schedule.edit-item', {{ json_encode(["schedule" => $fr]) }})"
                               class="w-6 h-6 rounded-full bg-green-300 flex items-center justify-center transition-all text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <a onclick="confirm('Are you sure you want to remove the scheduled class?') || event.stopImmediatePropagation()" wire:click="deleteClass({{$fr}})"
                               class="w-6 h-6 rounded-full bg-red-300 flex items-center justify-center transition-all text-red-900 hover:bg-red-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-12 divide-x divide-y border-r border-b group-scope">
            <div class="border-l border-t flex items-center justify-center py-2 bg-gray-100 group-scope-hover:bg-red-600 group-scope-hover:text-white transition-all">SAT</div>
            <div class="col-span-11 flex items-center justify-start space-x-2 p-2 overflow-x-auto group-scope-hover:bg-red-50">
                @foreach ($saturday as $sa)
                    <div class="p-4 flex flex-col bg-yellow-200 shadow hover:shadow-xl transition-all text-sm relative group" style="min-width: 250px">
                        <h1 class="font-bold">{{ $sa->subject->name }}</h1>
                        <h1 class="italic">{{ $sa->course->name }}</h1>
                        <h2 class="">Mr.Pravin</h2>
                        <h2 class="">{{ Carbon\Carbon::parse($sa->time_start)->format('H:i') }} - {{ Carbon\Carbon::parse($sa->time_end)->format('H:i') }}</h2>
                        <a wire:click="$emit('openModal', 'schedule.students', {{ json_encode(["schedule_id" => $sa->id]) }})"
                           class="hover:underline font-bold mt-2 flex items-center space-x-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                            <p class="">{{ count($sa->students) }} Students</p>
                        </a>

                        <a wire:click="$emit('openModal', 'schedule.instructors', {{ json_encode(["schedule_id" => $sa->id]) }})" class="font-bold mt-2 cursor-pointer hover:underline">
                            Instructors:
                        </a>
                        <div class="flex items-center space-x-2">
                            @foreach($sa->instructors as $cInstructor)
                                <p class="flex">
                                    {{ $cInstructor->gender == 'm' ? 'Mr.' : 'Ms.' }}
                                    {{ $cInstructor->first_name }} {{ $cInstructor->last_name }},
                                </p>
                            @endforeach
                        </div>

                        {{--actions--}}
                        <div class="absolute bottom-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100">
                            <a wire:click="$emit('openModal', 'schedule.edit-item', {{ json_encode(["schedule" => $sa]) }})"
                               class="w-6 h-6 rounded-full bg-green-300 flex items-center justify-center transition-all text-green-900 hover:bg-green-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <a onclick="confirm('Are you sure you want to remove the scheduled class?') || event.stopImmediatePropagation()" wire:click="deleteClass({{$sa}})"
                               class="w-6 h-6 rounded-full bg-red-300 flex items-center justify-center transition-all text-red-900 hover:bg-red-500 hover:shadow-xl hover:text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>


