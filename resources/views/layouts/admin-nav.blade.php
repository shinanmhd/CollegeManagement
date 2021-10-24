<div class="relative cursor-pointer">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 p-2 group hover:bg-gray-100 border border-opacity-0 hover:border hover:border-gray-200 rounded-lg {{ (Request::is('/*') || Request::is('*/') || Request::is('admin') ? 'border-opacity-100 border border-gray-200 bg-gray-100 text-red-600' : 'border border-opacity-0 hover:border hover:border-gray-200 hover:bg-gray-100') }}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048" class="h-5 w-5 group-hover:text-red-600" stroke-width="4%" stroke="currentColor" fill="currentColor"><path d="M2048 0v2048H0V0h2048zm-128 128h-640v512h640V128zm-640 1152h640V768h-640v512zM128 128v1152h1024V128H128zm0 1792h640v-512H128v512zm1792 0v-512H896v512h1024z"/></svg>
        <h1 class="group-hover:text-black">Dashboard</h1>
    </a>
</div>

<div class="relative cursor-pointer" x-data="{navDropDown:false}" x-on:click="navDropDown = !navDropDown" x-on:mouseleave="navDropDown = false">
    <div class="flex justify-between items-center space-x-2 p-2 group {{ (Request::is('student/*') || Request::is('*/student') || Request::is('*/student/*') ? 'border-opacity-100 border border-gray-200 bg-gray-100 text-red-600' : 'border border-opacity-0 hover:border hover:border-gray-200 hover:bg-gray-100') }}"
         :class="navDropDown ? 'rounded-tl-lg rounded-tr-lg' : 'rounded-lg'">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 511.989 511.989" class="h-5 w-5 group-hover:text-red-600" stroke-width="4%" stroke="currentColor" fill="currentColor"><path d="m470.994 330c0-24.146-17.205-44.348-40-48.994v-54.006c0-4.92-2.412-9.526-6.456-12.329s-9.206-3.445-13.811-1.716l-28.629 10.736c-18.8-19.545-41.652-34.266-66.694-43.303 24.608-18.234 40.59-47.478 40.59-80.388 0-55.141-44.859-100-100-100s-100 44.859-100 100c0 32.91 15.982 62.154 40.59 80.388-25.043 9.038-47.894 23.759-66.694 43.303l-28.629-10.736c-4.606-1.729-9.768-1.087-13.811 1.716-4.044 2.803-6.456 7.409-6.456 12.329v54.006c-22.795 4.646-40 24.847-40 48.994s17.205 44.348 40 48.994v58.006c0 6.253 3.879 11.85 9.733 14.045l160 60c3.374 1.258 7.159 1.258 10.533 0l160-60c5.854-2.195 9.733-7.792 9.733-14.045v-58.006c22.796-4.646 40.001-24.848 40.001-48.994zm-285-230c0-38.598 31.402-70 70-70s70 31.402 70 70-31.402 70-70 70-70-31.402-70-70zm70 100c35.143 0 68.709 12.701 94.899 35.393l-94.899 35.587-94.899-35.587c26.191-22.692 59.757-35.393 94.899-35.393zm-185 130c0-11.028 8.972-20 20-20h10v40h-10c-11.028 0-20-8.972-20-20zm40 49.497c11.397-2.323 20-12.424 20-24.497v-50c0-12.073-8.603-22.174-20-24.497v-31.858l130 48.75v177.961l-130-48.75zm160 95.858v-177.96l130-48.75v31.858c-11.397 2.323-20 12.424-20 24.497v50c0 12.073 8.603 22.174 20 24.497v47.108zm150-125.355h-10v-40h10c11.028 0 20 8.972 20 20s-8.971 20-20 20z"/></svg>
            <h1 class="group-hover:text-black">Student</h1>
        </div>

        <div class="absolute z-10 top-10 -left-2 w-full flex flex-col divide-y divide-gray-100 rounded-bl-lg sm:rounded-br-lg bg-white border border-gray-200 overflow-hidden" x-cloak x-show="navDropDown"
             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-300" x-transition:leave="transition ease-in duration-100" x-transition:leave-end="opacity-0">
            <a href="{{ route('admin.student.index') }}" class="px-4 py-2 hover:bg-gray-100">Show All Students</a>
            <a href="{{ route('admin.student.create') }}" class="px-4 py-2 hover:bg-gray-100">Add Student</a>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-all" viewBox="0 0 20 20" fill="currentColor" x-on:mouseenter="navDropDown = true" :class="navDropDown ? 'transform rotate-180' : 'transform rotate-0'">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </div>
</div>

<div class="relative cursor-pointer" x-data="{navDropDown:false}" x-on:click="navDropDown = !navDropDown" x-on:mouseleave="navDropDown = false">
    <div class="flex justify-between items-center space-x-2 p-2 group {{ (Request::is('course/*') || Request::is('*/course') || Request::is('*/course/*') ? 'border-opacity-100 border border-gray-200 bg-gray-100 text-red-600' : 'border border-opacity-0 hover:border hover:border-gray-200 hover:bg-gray-100') }}"
         :class="navDropDown ? 'rounded-tl-lg rounded-tr-lg' : 'rounded-lg'">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048" class="h-5 w-5 group-hover:text-red-600" stroke-width="4%" stroke="currentColor" fill="currentColor"><path d="M896 1280q0 82-33.5 156.5T768 1566v458l-256-128-256 128v-458q-61-55-94.5-129.5T128 1280q0-79 30-149t82.5-122.5 122-82.5T512 896q79 0 149 30.5t122 82.5 82.5 122 30.5 149zm-384 256q53 0 99.5-20t81.5-55 55-81.5 20-99.5-20-99.5-55-81.5-81.5-55-99.5-20-99.5 20-81.5 55-55 81.5-20 99.5 20 99.5 55 81.5 81.5 55 99.5 20zm128 106q-61 22-123 22-70 0-133-22v174l128-64 128 64v-174zM1920 549v1499H896v-128h896V640h-512V128H384v624q-33 8-65.5 20T256 800V0h1115zm-219-37l-293-293v293h293z"/></svg>
            <h1 class="group-hover:text-black">Course</h1>
        </div>

        <div class="absolute z-10 top-10 -left-2 w-full flex flex-col divide-y divide-gray-100 rounded-bl-lg sm:rounded-br-lg bg-white border border-gray-200 overflow-hidden" x-cloak x-show="navDropDown"
             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-300" x-transition:leave="transition ease-in duration-100" x-transition:leave-end="opacity-0">
            <a href="{{ route('admin.course.index') }}" class="px-4 py-2 hover:bg-gray-100">Show All Courses</a>
            <a href="{{ route('admin.course.create') }}" class="px-4 py-2 hover:bg-gray-100">Add Course</a>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-all" viewBox="0 0 20 20" fill="currentColor" x-on:mouseenter="navDropDown = true" :class="navDropDown ? 'transform rotate-180' : 'transform rotate-0'">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </div>
</div>

<div class="relative cursor-pointer" x-data="{navDropDown:false}" x-on:click="navDropDown = !navDropDown" x-on:mouseleave="navDropDown = false">
    <div class="flex justify-between items-center space-x-2 p-2 group {{ (Request::is('subject/*') || Request::is('*/subject') || Request::is('*/subject/*') ? 'border-opacity-100 border border-gray-200 bg-gray-100 text-red-600' : 'border border-opacity-0 hover:border hover:border-gray-200 hover:bg-gray-100') }}"
         :class="navDropDown ? 'rounded-tl-lg rounded-tr-lg' : 'rounded-lg'">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <h1 class="group-hover:text-black">Subject</h1>
        </div>

        <div class="absolute z-10 top-10 -left-2 w-full flex flex-col divide-y divide-gray-100 rounded-bl-lg sm:rounded-br-lg bg-white border border-gray-200 overflow-hidden" x-cloak x-show="navDropDown"
             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-300" x-transition:leave="transition ease-in duration-100" x-transition:leave-end="opacity-0">
            <a href="{{ route('admin.subject.index') }}" class="px-4 py-2 hover:bg-gray-100">Show All Subjects</a>
            <a href="{{ route('admin.subject.create') }}" class="px-4 py-2 hover:bg-gray-100">Add Subject</a>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-all" viewBox="0 0 20 20" fill="currentColor" x-on:mouseenter="navDropDown = true" :class="navDropDown ? 'transform rotate-180' : 'transform rotate-0'">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </div>
</div>

<div class="relative cursor-pointer" x-data="{navDropDown:false}" x-on:click="navDropDown = !navDropDown" x-on:mouseleave="navDropDown = false">
    <div class="flex justify-between items-center space-x-2 p-2 group {{ (Request::is('instructor/*') || Request::is('*/instructor') || Request::is('*/instructor/*') ? 'border-opacity-100 border border-gray-200 bg-gray-100 text-red-600' : 'border border-opacity-0 hover:border hover:border-gray-200 hover:bg-gray-100') }} transition-all"
         :class="navDropDown ? 'rounded-tl-lg rounded-tr-lg' : 'rounded-lg'">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
            <h1 class="group-hover:text-black">Instructor</h1>
        </div>

        <div class="absolute z-10 top-10 -left-2 w-full flex flex-col divide-y divide-gray-100 rounded-bl-lg sm:rounded-br-lg bg-white border border-gray-200 overflow-hidden" x-cloak x-show="navDropDown"
             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-300" x-transition:leave="transition ease-in duration-100" x-transition:leave-end="opacity-0">
            <a href="{{ route('admin.instructor.index') }}" class="px-4 py-2 hover:bg-gray-100">Show All Instructor</a>
            <a href="{{ route('admin.instructor.create') }}" class="px-4 py-2 hover:bg-gray-100">Add Instructor</a>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-all" viewBox="0 0 20 20" fill="currentColor" x-on:mouseenter="navDropDown = true" :class="navDropDown ? 'transform rotate-180' : 'transform rotate-0'">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </div>
</div>


<div class="relative cursor-pointer" x-data="{navDropDown:false}" x-on:click="navDropDown = !navDropDown" x-on:mouseleave="navDropDown = false">
    <div class="flex justify-between items-center space-x-2 p-2 group hover:bg-gray-100 border border-opacity-0 hover:border hover:border-gray-200 transition-all" :class="navDropDown ? 'rounded-tl-lg rounded-tr-lg' : 'rounded-lg'">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
            <h1 class="group-hover:text-black">Transaction</h1>
        </div>

        <div class="absolute z-10 top-10 -left-2 w-full flex flex-col divide-y divide-gray-100 rounded-bl-lg sm:rounded-br-lg bg-white border border-gray-200 overflow-hidden" x-cloak x-show="navDropDown"
             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-300" x-transition:leave="transition ease-in duration-100" x-transition:leave-end="opacity-0">
            <a href="{{ route('admin.transaction.index') }}" class="px-4 py-2 hover:bg-gray-100">Show All Transaction</a>
            <a href="{{ route('admin.transaction.create') }}" class="px-4 py-2 hover:bg-gray-100">Add Transaction</a>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-all" viewBox="0 0 20 20" fill="currentColor" x-on:mouseenter="navDropDown = true" :class="navDropDown ? 'transform rotate-180' : 'transform rotate-0'">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </div>
</div>

<div class="relative cursor-pointer">
    <a href="{{ route('admin.schedule.index') }}" class="flex items-center space-x-2 p-2 group hover:bg-gray-100 border border-opacity-0 hover:border hover:border-gray-200 rounded-lg {{ (Request::is('schedule/*') || Request::is('*/schedule') || Request::is('*/schedule/*') ? 'border-opacity-100 border border-gray-200 bg-gray-100 text-red-600' : 'border border-opacity-0 hover:border hover:border-gray-200 hover:bg-gray-100') }} transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <h1 class="group-hover:text-black">Schedule</h1>
    </a>
</div>

<div class="relative cursor-pointer">
    <a href="{{ route('admin.profile') }}" class="flex items-center space-x-2 p-2 group hover:bg-gray-100 border border-opacity-0 hover:border hover:border-gray-200 rounded-lg {{ (Request::is('profile/*') || Request::is('*/profile') || Request::is('*/profile/*') || Request::is('change-password/*') || Request::is('*/change-password') || Request::is('*/change-password/*') ? 'border-opacity-100 border border-gray-200 bg-gray-100 text-red-600' : 'border border-opacity-0 hover:border hover:border-gray-200 hover:bg-gray-100') }} transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <h1 class="group-hover:text-black">Settings</h1>
    </a>
</div>
