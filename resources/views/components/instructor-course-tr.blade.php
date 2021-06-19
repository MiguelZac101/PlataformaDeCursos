@props(['course'])
<tr>
    <td>
        <img src="{{Storage::url($course->image->url)}}" alt="" width="50">
    </td>
    <td>{{$course->title}}</td>
    <td>{{$course->category->name}}</td>
    <td>{{$course->students->count()}}</td>
    <td>{{$course->rating}}</td>
    <td>{{$course->status}}</td>
    <td>{{$slot}}</td>
    <td>
        <a href="{{route('instructor.courses.edit',$course)}}">Editar</a>
    </td>
</tr>