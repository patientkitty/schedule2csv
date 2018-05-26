@extends('layouts.bootstrapHead')

@section('content')
    Hello World
    <br>
    <a href="#" class="btn btn-primary">This is a button</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Group</th>
            <th scope="col">Course Name</th>
            <th scope="col">Date Start</th>
            <th scope="col">Date End</th>
            <th scope="col">Time Start</th>
            <th scope="col">Time End</th>
            <th scope="col">Week Day</th>
            <th scope="col">Classroom</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        </tbody>
    </table>


@endsection