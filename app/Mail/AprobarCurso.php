<?php

namespace App\Mail;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AprobarCurso extends Mailable
{
    use Queueable, SerializesModels;

    public  $curso;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Course $curso)
    {
        $this->curso = $curso;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.aprobar-curso')
                    ->subject('Curso Aprobadox');
    }
}
