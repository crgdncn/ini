<tr id="trow_{{$key->id}}">
    <td class="td-id">{{$key->id}}</td>
    <td class="td-name" id="name">{{$key->name}}</a></td>
    <td class="td-description d-none d-md-table-cell" id="description">{{ str_limit($key->description, 200) }}</td>
    <td class="td-buttons">
        <button
            class="btn btn-sm"
            type="button"
            onClick="getFormModal('{{relativeRoute('ini.types.sections.keys.edit', [$type, $section, $key])}}', 'Edit Key')"
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
    <form id="delete-key-{{$key->id}}" action="{{relativeRoute('ini.types.sections.keys.destroy', [$type, $section, $key])}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    </td>
</tr>

