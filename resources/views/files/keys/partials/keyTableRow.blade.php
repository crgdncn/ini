<tr id="trow_{{$key->id}}">
    <td class="td-id">{{$key->id}}</td>
    <td>{{$key->name}}</td>
    <td>{{$key->value}}</td>
    <td>
        <button
            class="btn btn-sm"
            type="button"
            onClick="getFormModal('{{route('files.file.sections.keys.edit', [$file, $section, $key])}}', 'Edit')"
        >
        Edit
        </button>
        <button
            class="btn btn-sm"
            type="button"
            onClick="postObjectDelete('delete-type-{{$key->id}}', {{$key->id}})"
        >
        Delete
        </button>
        <form id="delete-type-{{$key->id}}" action="{{route('files.file.sections.keys.destroy', [$file, $section, $key])}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    </td>
</tr>
