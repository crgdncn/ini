
<div class="alert alert-danger hidden">
    <span id="message-error" class="help-block"></span>
</div>

<form id="{{getObjectBaseClassName($file)}}" action="{{$actionRoute}}">
    {{ csrf_field() }}
    {{ method_field($method) }}
    <table class="table table-bordered">
        <tr class="text-left">
            <th>Name</th>
            <td>
                <input id="file_name", name="file_name" size="50" value="{{$file->file_name}}">
                <br>
                <span id="file_name-error" class="error-text"></span>
            </td>
        </tr>
        <tr class="text-left">
            <th>Type</th>
            <td>
                <select name="ini_type_id">
                    <option disabled>Select File Type</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" {{($selected == $type->id) ? 'selected' : ''}}>{{$type->name}}</option>
                    @endforeach
                </select>
                <span id="description-error" class="error-text"></span>
            </td>
        </tr>
    </table>

    <button
        id="submit"
        type="button"
        class="btn btn-primary"
        onClick="postFormModal('{{getObjectBaseClassName($file)}}', {{$file->id}})"
        >
    Save
    </button>
    <button id="close"  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>
