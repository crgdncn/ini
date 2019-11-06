<tr id="trow_{{$section->id}}">
    <td class="td-id">{{$section->id}}</td>
    <td class="td-name">
        <a id="a_{{snake_case($section->name)}}" href="{{relativeRoute('ini.types.sections.show', [$type, $section])}}">{{$section->name}}</a>
    </td>
    <td class="td-description d-none d-md-table-cell" id="description">{{ str_limit($section->description, 200) }}</td>
    <td class="td-count">{{$section->keys->count()}}</td>
    <td class="td-buttons">
        <button
            class="btn btn-sm"
            type="button"
            onClick="getFormModal('{{relativeRoute('ini.types.sections.edit', [$type, $section])}}', 'Edit Section')"
        >
        Edit
        </button>
        <button
            class="btn btn-sm"
            type="button"
            onClick="postObjectDelete('delete-section-{{$section->id}}', {{$section->id}})"
        >
        Delete
        </button>
        <form
            id="delete-section-{{$section->id}}"
            action="{{relativeRoute('ini.types.sections.destroy', [$type, $section])}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    </td>
</tr>
