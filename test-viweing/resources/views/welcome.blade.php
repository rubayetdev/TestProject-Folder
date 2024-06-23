<form action="{{route('insert')}}" method="post">
    @csrf
    <input type="text" name="roles" placeholder="Roles"/>

    <button type="submit">Submit</button>
</form>

<form action="{{route('permission')}}" method="post">
    @csrf

    <label for="permission">Permission:</label>
    <select id="permission" name="permission">
        <option value="">Select</option>
        @foreach(\Route::getRoutes() as $route)
            @if ($route->methods[0] === 'GET' && strpos($route->uri, '_ignition') !== 0)
                <option value="{{ $route->uri }}">{{ $route->uri }}</option>
            @endif
        @endforeach
    </select>

    <button type="submit">Submit</button>
</form>


<form action="#" method="post">
    @csrf
    <select id="permission" name="roles">
        <option value="">Select</option>
        @foreach($role as $roles)
            <option value="{{$roles->id}}">{{$roles->role}}</option>
        @endforeach
    </select>

    <select id="permission" name="permission">
        <option value="">Select</option>
        @foreach($permission as $per)
            <option value="{{$per->id}}">{{$per->permission_name}}</option>
        @endforeach
    </select>

    <select id="permission" name="action">
        <option value="Read">Read</option>
        <option value="Edit">Edit</option>
    </select>

    <button type="submit">Submit</button>
</form>


<table>
    <thead>

        <th>Id</th>
        <th>Role</th>

    </thead>
    <tbody>
    @foreach($role as $roles)
    <tr>
        <td>{{$roles->id}}</td>
        <td>{{$roles->role}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
