<form id="{{getObjectBaseClassName($section)}}" action="{{$actionRoute}}" method="post">
    {{ csrf_field() }}{{ method_field($method) }}
    <input type="hidden" name="id" value="{{$key->id}}">

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Key Name</th>
                <td>
                    @if ($key->id)
                    {{-- Do not allow the key to be changed when editing --}}
                    <strong>{{$key->name}}</strong>
                    @else
                    {{-- new key --}}
                    @if ($sectionIniKeys->count() == 0)
                        <p>All keys are in use, see file definition.</p>
                    @endif
                    <select class="form-control", name="ini_key_id">

                        @foreach ($sectionIniKeys as $iniKey)
                            <option value="{{$iniKey->id}}">{{$iniKey->name}}</option>
                        @endforeach
                    </select>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Value</th>
                <td>
                    <textarea class="form-control" name="value">{{$key->value}}</textarea>
                    <span id="value-error" class="error-text"></span>
                </td>
            </tr>
        </tbody>
    </table>

    <button
        id="submit"
        type="button"
        class="btn btn-primary btn-sm"
        onClick="postFormModal('{{getObjectBaseClassName($section)}}', {{$key->id}})"
        >Save
    </button>
    <button id="close"  type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
</form>
