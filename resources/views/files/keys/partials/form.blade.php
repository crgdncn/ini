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
                </td>
            </tr>
        </tbody>
    </table>
</form>

<button
        id="submit"
        type="button"
        class="btn btn-primary"
        onClick="postFormModal('{{getObjectBaseClassName($section)}}', {{$key->id}})"
        >Save
    </button>
