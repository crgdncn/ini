            <tr>
                <td>{{$iniType->name}}</td>
                <td>{{ str_limit($iniType->description, 200) }}</td>
                <th>{{$iniType->sections->count()}}</th>
                <td>
                    <button class="btn btn-sm" onClick="getFormModal('/ini/types/{{$iniType->id}}/edit', 'Edit INI Type')">Edit</button>
                </td>
            </tr>
