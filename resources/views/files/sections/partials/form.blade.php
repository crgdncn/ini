<div class="alert alert-danger d-none">
    <span id="message-error" class="help-block"></span>
</div>

<form id="{{getObjectBaseClassName($file)}}" action="{{$actionRoute}}">
    {{ csrf_field() }}{{ method_field($method) }}
    @if ($sections->count() == 0)
        <p>No more available sections, see file definition.<p>
    @endif
    <select name="sections[]" class="form-control" multiple>
        @foreach($sections as $section)
            <option value="{{$section->id}}">{{$section->name}}</option>
        @endforeach
    </select>
    <br>
    <button
        id="submit"
        type="button"
        class="btn btn-primary btn-sm"
        onClick="postFormModal('{{getObjectBaseClassName($file)}}')"
        >
    Add
    </button>
    <button id="close"  type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
</form>
