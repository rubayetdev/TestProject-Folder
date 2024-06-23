@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<form action="{{route('insert')}}" method="post">
    @csrf
    <input type="text" name="name"><br>
    <input type="email" name="email"><br>
    <input type="number" name="phone"><br>
    <input type="password" name="password"><br>

    <button type="submit">Button</button>
</form>

<a href="{{route('page')}}">Another Page</a>
