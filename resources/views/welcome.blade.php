@extends('layouts.app')

@section('title', 'Manage INI Files')

@section('content')
    <h1>Welcome</h1>

    <div style="font-size: 0.75em;">
        <p>
        This project was designed to show that nested resources can be managed using AJAX funtions rather than page reloads making navigation and CRUD operations easier. This project had no real world application beyond the goals stated above.
        </p>

        <h2>Getting Started</h2>
        <p>
            Before you can create an INI file, you must first define what the INI file has in terms of sections and keys. Once you have an INI definition, you can create files of that definition type, adding sections and keys defined in the INI definition.
        </p>

        <h2>Notes</h2>
        <ul>
            <li>
                If you want to have keys that exist outwith a section (i.e. no section), define a section named "None" and add keys to that. When the file is exported, those keys will be listed first in the ini file.
            </li>
        </ul>
    </div>
@endsection
