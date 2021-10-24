<div class="flex flex-col">
    <div class="flex items-center justify-center py-2 bg-gray-800 text-white font-semibold">
        Assign Course
    </div>

    <div class="mt-6 flex flex-col p-6">
        <div class="grid grid-cols-6 grid-flow-row w-full border-t">
            @foreach ($courses as $course)
                <div class="col-span-4 py-1 pl-2 border-b flex items-center {{ $student->courses->contains($course) ? 'bg-yellow-50' : '' }}">{{ $course->name }}</div>

                @if($student->courses->contains($course))
                    <div class="col-span-2 py-1 flex border-b items-center bg-yellow-50">
                        <a  wire:click="removeCourse({{ $course }})"
                            class="flex items-center space-x-1 text-red-500 px-2 py-1 border border-red-500 hover:bg-red-500 hover:text-white rounded transition-all cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-semibold">Remove Course</span>
                        </a>
                    </div>
                @else
                    <div class="col-span-2 py-1 flex border-b items-center">
                        <a wire:click="assign({{ $course }})"
                           class="flex items-center space-x-1 text-green-500 px-2 py-1 border border-green-500 hover:bg-green-500 hover:text-white rounded transition-all cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-semibold">Add Course</span>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
