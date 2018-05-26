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
        <form action="add" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <tbody>
        <tr>
            <td>
                <input type="text" class="form-control" name="Group" placeholder="Group #" aria-label="Username" aria-describedby="basic-addon1">
            </td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <td>
                <button type="submit">创建</button>
            </td>

        </tr>
        </tbody>
        </form>
    </table>

    @if(!empty($searchResult))
        <div class="col-md-7">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>Seat Code</th>
                    <td>{{$request->Group}}</td>
                </tr>


                </tbody>
            </table>
        </div>
    @endif

@endsection