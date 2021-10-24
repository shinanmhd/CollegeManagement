<div>
    <ul class="list-decimal">
        @foreach ($student->courses as $course)
            <li class="">{{ $course->name }}</li>
        @endforeach
    </ul>

    @if (count($student->courses) <= 0)
        <span class="text-sm font-semibold italic text-red-300">No courses assigned</span>
    @endif
</div>
