<div class="alert alert-danger hidden">
    <span id="message-error" class="help-block"></span>
</div>

<form id="{{getObjectBaseClassName($file)}}" action="{{$actionRoute}}">
    {{ csrf_field() }}{{ method_field($method) }}
    <!-- input type="hidden" name="form_id" -->
    <select name="sections[]" class="form-control" multiple>
        @foreach($sections as $section)
            <option value="{{$section->id}}">{{$section->name}}</option>
        @endforeach
    </select>
    <br>
    <button
        id="submit"
        type="button"
        class="btn btn-primary"
        onClick="postFormModal('{{getObjectBaseClassName($file)}}')"
        >
    Add
    </button>
</form>
