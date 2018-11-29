<tr id="trow_{{$type->id}}">
    <td>{{$type->id}}</td>
    <td id="name">{{$type->name}}</td>
    <td id="description">{{ str_limit($type->description, 200) }}</td>
    <td style="text-align:center">{{$type->sections->count()}}</td>
    <td>
        <form id="delete-type-{{$type->id}}" action="{{route('ini.types.destroy', $type->id)}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <button
            class="btn btn-sm"
            type="button"
            onClick="getFormModal('{{route('ini.types.edit', $type->id)}}', 'Edit')"
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
    </form>
    </td>
</tr>
