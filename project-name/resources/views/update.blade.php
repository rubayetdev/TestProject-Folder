<form action="{{route('updates')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$id->id}}">
    <input type="text" name="name" value="{{$id->name}}"><br>
    <input type="email" name="email" value="{{$id->email}}"><br>
    <input type="number" name="phone" value="{{$id->phone}}"><br>
    <input type="password" name="password" value="{{$id->password}}"><br>

    <button type="submit">Button</button>
    <a href="{{route('delete',['id'=>$id->id])}}">Delete</a>
</form>
