
<div class="alert alert-danger hidden">
    <span id="message-error" class="help-block"></span>
</div>

<form id="{{getObjectBaseClassName($type)}}" action="{{$actionRoute}}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{$method}}">
    <table class="table table-bordered">
        <tr class="text-left">
            <th>Name</th>
            <td>
                <input id="name", name="name" size="50" value="{{$type->name}}">
                <br>
                <span id="name-error" class="error-text"></span>
            </td>
        </tr>
        <tr class="text-left">
            <th>Description</th>
            <td>
                <textarea id="description", name="description" cols="50" rows="10">{{$type->description}}</textarea>
                <br>
                <span id="description-error" class="rror-text"></span>
            </td>
        </tr>
    </table>

    <button
        id="submit"
        type="button"
        class="btn btn-primary"
        onClick="postFormModal('{{getObjectBaseClassName($type)}}', {{$type->id}})"
        >
    Save
    </button>
    <button id="close"  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>
