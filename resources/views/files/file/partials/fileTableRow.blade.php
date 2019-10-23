<tr id="trow_{{$file->id}}">
    <td class="td-id">{{$file->id}}</td>
    <td class="td-name" id="name"><a href="{{route('files.file.show', $file)}}">{{$file->file_name}}</a></td>
    <td class="td-description d-none d-md-table-cell">{{$file->iniType->name}}</td>
    <td class="td-buttons">
        <button
            class="btn btn-sm"
            type="button"
            onClick="getFormModal('{{route('files.file.edit', $file)}}', 'Edit Type')"
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
        <a href="{{route('files.file.download', $file)}}"><button type=="button" class="btn btn-sm">Download</button></a>
        <form id="delete-type-{{$file->id}}" action="{{route('files.file.destroy', $file->id)}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    </td>
</tr>
