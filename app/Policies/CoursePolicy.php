<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;

use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //si el estudiante esta matriculado en el curso?    
    public function enrolled(User $user,Course $course){
        //contains , si lo contiene
        return $course->students->contains($user->id);
    }

    //si el curso esta publicado
    //?User $use -> usuario no autentificado, q no se a logueado
    public function published(?User $user, Course $course){
        $result = false;
        if($course->status == 3) $result = true;
        return $result;
    }
}
