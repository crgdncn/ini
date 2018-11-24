<h3>{{$formTitle}}</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{$actionRoute}}">
    {{csrf_field()}}
    @if($editing)
        <input name="_method" type="hidden" value="PUT">
    @endif
    <table>
        <tr>
            <th>Name</th>
            <td><input id="name", name="name" value="{{$iniType->name}}"></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><textarea id="description", name="description">{{$iniType->description}}</textarea>
        </tr>
    </table>

    <input id="submit" type="submit" value="save">
    <a href="{{$cancelRoute}}"><button type="button">Cancel</button></a>
</form>
