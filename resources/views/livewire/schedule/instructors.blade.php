<div class="flex flex-col">
    <div class="flex items-center justify-center py-2 bg-gray-800 text-white font-semibold">
        Schedule Instructors
    </div>


    <div class="p-6">
        @foreach ($schedule->course->instructor as $instructor)
            <div class="grid grid-cols-6 border-b group hover:bg-gray-50">
                <div class="col-span-4 py-2 flex items-center space-x-2 pl-4">
                    {{ $instructor->gender == 'm' ? 'Mr.' : 'Ms.' }}
                    {{ $instructor->first_name }}
                    {{ $instructor->last_name }}
                </div>
                <div class="col-span-2 py-2 flex items-center justify-center">
                    @if ($schedule->instructors->contains($instructor))
                        <a wire:click="removeStudent({{$instructor}})"
                           class="flex items-center space-x-1 text-white bg-yellow-400 px-2 py-2 hover:bg-yellow-600 hover:text-white rounded transition-all cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-semibold">Remove</span>
                        </a>
                    @else
                        <a wire:click="addStudent({{$instructor}})"
                           class="flex items-center space-x-1 text-white bg-green-400 px-2 py-2 hover:bg-green-600 hover:text-white rounded transition-all cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-semibold">Add to Class</span>
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
