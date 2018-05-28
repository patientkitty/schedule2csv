@extends('layouts.bootstrapHead')

@section('content')
    <h1>New Schedule Form</h1>
    <form action="add" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="form-row">
            <div class="form-group col-md-1">
                <label for="inputGroup">Group</label>
                <input type="text" name="group" class="form-control" id="inputGroup" placeholder="#">
            </div>
            <div class="form-group col-md-2">
                <label for="inputCourseName">Course Name</label>
                <input type="text" name="event_name" class="form-control" id="inputCourseName" placeholder="Event Name">
            </div>
            <div class="form-group col-md-2">
                <label for="inputDateStart">Date Start</label>
                <input type="text" name="date_start" class="form-control" id="inputDateStart" placeholder="yyyy-mm-dd">
            </div>
            <div class="form-group col-md-2">
                <label for="inputDateEnd">Date End</label>
                <input type="text" name="date_end" class="form-control" id="inputDateEnd" placeholder="yyyy-mm-dd">
            </div>
            <div class="form-group col-md-1">
                <label for="inputTimeStart">Time Start</label>
                <input type="text" name="time_start" class="form-control" id="inputTimeStart" placeholder="hhmm">
            </div>
            <div class="form-group col-md-1">
                <label for="inputTimeEnd">Time End</label>
                <input type="text" name="time_end" class="form-control" id="inputTimeEnd" placeholder="hhmm">
            </div>
            <div class="form-group col-md-1">
                <label for="inputWeekday">Weekday</label>
                <input type="text" name="weekdays" class="form-control" id="inputWeekday" placeholder="#">
            </div>
            <div class="form-group col-md-1">
                <label for="inputClassroom">Classroom</label>
                <input type="text" name="room" class="form-control" id="inputClassroom" placeholder="#">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
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