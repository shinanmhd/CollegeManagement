<div class="flex flex-col">
    <div class="flex items-center justify-center py-2 bg-gray-800 text-white font-semibold">
        Add Schedule Item
    </div>

    <form class="mt-6 flex flex-col p-6 divide-y" wire:submit.prevent="submit">

        <div class="flex items-center py-4">
            <label for="course_id" class="text-gray-500 w-1/4">Course</label>

            <div class="flex flex-col space-y-1 w-3/4">
                <select name="course_id" id="course_id" class="" wire:change="courseSelected()" wire:model="schedule.course_id">
                    <option selected>Select Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('schedule.course_id') <div class="text-xs text-red-500">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="flex items-center py-4">
            <label for="subject_id" class="text-gray-500 w-1/4">Subject</label>

            <div class="flex flex-col space-y-1 w-3/4">
                <select name="subject_id" id="subject_id" class="" {{ $subjects == null ? 'disabled' : '' }} wire:model="schedule.subject_id">
                    @if ($subjects == null)
                        <option selected>Choose a course to load subjects</option>
                    @else
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('schedule.course_id') <div class="text-xs text-red-500">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="flex items-center py-4">
            <label for="day" class="text-gray-500 w-1/4">Day</label>

            <div class="flex flex-col space-y-1 w-3/4">
                <select name="day" id="day" class="" wire:model="schedule.day">
                    <option select>Select Day</option>
                    <option value="su">Sunday</option>
                    <option value="mo">Monday</option>
                    <option value="tu">Tuesday</option>
                    <option value="we">Wednesday</option>
                    <option value="th">Thursday</option>
                    <option value="fr">Friday</option>
                    <option value="sa">Saturday</option>
                </select>
                @error('schedule.day') <div class="text-xs text-red-500">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="w-full flex py-4">
            <div class="flex space-y-1 items-center w-1/2">
                <label for="time_start" class="text-gray-500 w-2/4 text-right pr-2">Starting Time</label>

                <div class="flex flex-col space-y-1w-2/4">
                    <input type="time" class="" name="time_start" id="time_start" wire:model="schedule.time_start">
                    @error('schedule.time_start') <div class="text-xs text-red-500">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="flex space-y-1 items-center w-1/2">
                <label for="time_end" class="text-gray-500 w-2/4 text-right pr-2">Ending Time</label>

                <div class="flex flex-col space-y-1w-2/4">
                    <input type="time" class="" name="time_end" id="time_start" wire:model="schedule.time_end">
                    @error('schedule.time_end') <div class="text-xs text-red-500">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="w-full flex items-center justify-end">
            <button type="submit"
               class="flex items-center space-x-1 text-white bg-green-400 px-2 py-2 mt-6 hover:bg-green-600 hover:text-white rounded transition-all cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-semibold">Add to Schedule</span>
            </button>
        </div>
    </form>
</div>
