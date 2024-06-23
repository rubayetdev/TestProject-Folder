@foreach($all as $every)
    Id: {{$every->id}}<br>
    <input type="hidden" name="id[]" value="{{$every->id}}">
    Name: {{$every->name}}<br>
    Phone: {{$every->phone}}<br>
    Email: {{$every->email}}<br>
    Password: {{$every->password}}<br>

    <a href="{{route('update',['id'=>$every->id])}}">Update</a><br><br>
    <a href="{{route('delete', ['id' => $every->id])}}">Delete</a>
@endforeach

