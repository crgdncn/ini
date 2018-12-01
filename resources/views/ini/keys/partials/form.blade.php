<span id="message-error" class="help-block"></span>

<form id="{{getObjectBaseClassName($key)}}" action="{{$actionRoute}}">
    {{ csrf_field() }}
    {{ method_field($method) }}
    <input type="hidden" name="ini_section_id" value="{{$section->id}}">
    <table class="table table-bordered">
        <tr class="text-left">
            <th>Name</th>
            <td>
                <input id="name", name="name" size="50" value="{{$key->name}}">
                <br>
                <span id="name-error" class="error-text"></span>
            </td>
        </tr>
        <tr class="text-left">
            <th>Description</th>
            <td>
                <textarea id="description", name="description" cols="50" rows="10">{{$key->description}}</textarea>
                <br>
                <span id="description-error" class="error-text"></span>
            </td>
        </tr>
    </table>

    <button
        id="submit"
        type="button"
        class="btn btn-primary"
        onClick="postFormModal('{{getObjectBaseClassName($key)}}', {{$key->id}})"
        >
    Save
    </button>
    <button id="close"  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>
