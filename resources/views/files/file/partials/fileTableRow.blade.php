<tr id="trow_{{$file->id}}">
    <td>{{$file->id}}</td>
    <td id="name"><a href="{{route('files.files.show', $file)}}">{{$file->file_name}}</a></td>
    <td style="text-align:center">{{$file->iniType->name}}</td>
    <td>
        <button
            class="btn btn-sm"
            type="button"
            onClick="getFormModal('{{route('files.files.edit', $file)}}', 'Edit Type')"
        >
        Edit
        </button>
        <button
            class="btn btn-sm"
            type="button"
            onClick="postObjectDelete('delete-type-{{$file->id}}', {{$file->id}})"
        >
        Delete
        </button>
        <form id="delete-type-{{$file->id}}" action="{{route('files.files.destroy', $file->id)}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    </td>
</tr>
