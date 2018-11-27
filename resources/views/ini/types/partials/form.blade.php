@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- <form method="post" action="{{$actionRoute}}">
    {{csrf_field()}}
    @if($editing)
        <input name="_method" type="hidden" value="PUT">
    @endif --}}
    <table class="table table-bordered">
        <tr class="text-left">
            <th>Name</th>
            <td><input id="name", name="name" size="50" value="{{$iniType->name}}"></td>
        </tr>
        <tr class="text-left">
            <th>Description</th>
            <td><textarea id="description", name="description" cols="50" rows="20">{{$iniType->description}}</textarea>
        </tr>
    </table>

    <input id="submit" type="submit" class="btn btn-primary" value="save">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
{{-- </form> --}}
