<x-instructor-layout :course="$course">    
    <div>
        @livewire('instructor.courses-goals', ['course' => $course], key($course->id))
    </div>
</x-instructor-layout>