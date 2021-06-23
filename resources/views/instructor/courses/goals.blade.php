<x-instructor-layout>
    <x-slot name="course">
        {{$course->slug}}
    </x-slot>
    
    <div>
        @livewire('instructor.courses-goals', ['course' => $course], key($course->id))
    </div>
</x-instructor-layout>