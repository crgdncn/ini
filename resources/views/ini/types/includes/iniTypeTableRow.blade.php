<tr id="trow_{{$iniType->id}}">
    <td>{{$iniType->id}}</td>
    <td id="name">{{$iniType->name}}</td>
    <td id="description">{{ str_limit($iniType->description, 200) }}</td>
    <th>{{$iniType->sections->count()}}</th>
    <td>
        <button
            class="btn btn-sm"
            onClick="getFormModal('/ini/types/{{$iniType->id}}/edit', 'Edit INI Type')"
        >
        Edit
        </button>
    </td>
</tr>
