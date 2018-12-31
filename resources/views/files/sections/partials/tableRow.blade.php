<tr id="trow_{{$section->id}}">
    <td class="td-id">{{$section->id}}</td>
    <td id="name"><a href="{{route('files.file.sections.show', [$file, $section])}}">{{$section->name}}</a></td>

    <td class="td-count">{{$section->keyCount}}</td>
    <td>
        <button
            class="btn btn-sm"
            type="button"
            onClick="postObjectDelete('delete-type-{{$section->id}}', {{$section->id}})"
        >
        Delete Section
        </button>
    <form id="delete-type-{{$section->id}}" action="{{route('files.file.sections.destroy', [$file, $section])}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    </td>
</tr>
