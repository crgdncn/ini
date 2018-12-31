<tr id="trow_{{$type->id}}">
    <td class="td-id">{{$type->id}}</td>
    <td id="name"><a href="{{route('ini.types.show', $type)}}">{{$type->name}}</a></td>
    <td id="description">{{ str_limit($type->description, 200) }}</td>
    <td class="td-count">{{$type->sections->count()}}</td>
    <td>
        <button
            class="btn btn-sm"
            type="button"
            onClick="getFormModal('{{route('ini.types.edit', $type->id)}}', 'Edit Type')"
        >
        Edit
        </button>
        <button
            class="btn btn-sm"
            type="button"
            onClick="postObjectDelete('delete-type-{{$type->id}}', {{$type->id}})"
        >
        Delete
        </button>
    <form id="delete-type-{{$type->id}}" action="{{route('ini.types.destroy', $type->id)}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    </td>
</tr>
