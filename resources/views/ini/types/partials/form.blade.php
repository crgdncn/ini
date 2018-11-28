@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="{{getObjectBaseClassName($iniType)}}" url="{{$actionRoute}}">
    {{csrf_field()}}
    @if($editing)
        <input type="hidden" name="_method" value="PUT">
    @endif
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

    <button id="submit" type="button" class="btn btn-primary" onClick="postFormModal("{{getObjectBaseClassName($iniType)}}")">Save</button>
    <button id="close"  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>
