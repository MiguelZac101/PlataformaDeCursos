<x-app-layout>
    <section class="bg-cover" style="background-image: url({{asset('img/home/students.jpg')}})">
        <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <h1>
                titulo
            </h1>
            <p>
                Subtitulo
            </p>
            <div>
                <input type="text">
                <button>Buscar</button>
            </div>
        </div>
    </section>
    <section class="mt-24">
        <h1 class="text-center">Contenido</h1>
        <div class="px-4 grid grid-cols-4 gap-6">
            <article>
                <figure>
                    <img src="{{asset('img/home/curso.jpg')}}" alt="">
                </figure> 
                <header>
                    <h1>Cursos y Proyectos</h1>
                </header>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>               
            </article>            
        </div>

    </section>

    <section>
        <h1 class="text-center">
            ÚLTIMOS CURSOS
        </h1>
        <div class="px-4 grid grid-cols-4 gap-6">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>

</x-app-layout>