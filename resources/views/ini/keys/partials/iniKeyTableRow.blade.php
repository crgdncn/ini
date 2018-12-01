<tr id="trow_{{$key->id}}">
    <td>{{$key->id}}</td>
    <td id="name">{{$key->name}}</a></td>
    <td id="description">{{ str_limit($key->description, 200) }}</td>
    <td>
        <button
            class="btn btn-sm"
            type="button"
            onClick="getFormModal('{{route('ini.types.sections.keys.edit', [$type, $section, $key])}}', 'Edit Key')"
        >
        Edit
        </button>
        <button
            class="btn btn-sm"
            type="button"
            onClick="postObjectDelete('delete-key-{{$key->id}}', {{$key->id}})"
        >
        Delete
        </button>
    <form id="delete-key-{{$key->id}}" action="{{route('ini.types.sections.keys.destroy', [$type, $section, $key])}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    </td>
</tr>

