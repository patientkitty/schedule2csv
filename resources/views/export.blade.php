@extends('layouts.bootstrapHead')

@section('content')
    <h1>Schedule Export</h1>
    <form action="searchGroup" method="get" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="form-row">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Group</span>
                <input type="number" name="group" class="form-control" id="inputGroup" placeholder="#" min="1" max="9900000">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    <br>
    <form action="exportData" method="get" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        @if(empty($searchGroup) == false)
        <input type="hidden" name="searchGroup" value="{{ $searchGroup }}"/>
        @endif
        <div class="form-row">
            <div>
                <label>Total Export:</label>
                @if(empty($total) == false)
                <label>{{$total}}</label>
                @endif
                @if(empty($searchGroup) == false)
                    <a href="{{ url('/exportData/' . $searchGroup) }}" class="btn btn-primary">Export</a>
                @endif
            </div>
        </div>
    </form>

    <br>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Group</th>
            <th scope="col">Event Name</th>
            <th scope="col">Date</th>
            <th scope="col">Time Start</th>
            <th scope="col">Time End</th>
            <th scope="col">Classroom</th>
        </tr>
        </thead>

        @if(!empty($inputs))
            @foreach($inputs as $input)
                <tbody>
                <tr>
                    <td>{{$input->group}}</td>
                    <td>{{$input->event_name}}</td>
                    <td>{{$input->date}}</td>
                    <td>{{$input->time_start}}</td>
                    <td>{{$input->time_end}}</td>
                    <td>{{$input->room}}</td>
                </tr>

                </tbody>
            @endforeach
        @endif
    </table>
    <h1>End of TABLE</h1>



@endsection