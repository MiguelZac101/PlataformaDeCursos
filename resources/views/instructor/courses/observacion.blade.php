<x-instructor-layout :course="$course">   
    
    <h1 class="text-2x1 font-bold">OBSERVACIÓN DEL CURSO</h1>
    <hr>
    <p>
        {!!$course->observation->body!!}
    </p>
    
</x-instructor-layout>