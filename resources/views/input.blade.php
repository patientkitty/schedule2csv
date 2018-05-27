@extends('layouts.bootstrapHead')

@section('content')
    <h1>Sample Form</h1>
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
                <div class="col-md-6">
                <input type="text" class="form-control" name="Group" placeholder="Group #" >
                </div>
            </td>
            <td>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="Group" placeholder="Group #" >
                </div>
            </td>
            <td>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="Group" placeholder="Group #" >
                </div>
            </td>
            <td>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="Group" placeholder="Group #" >
                </div>
            </td>
            <td>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="Group" placeholder="Group #" >
                </div>
            </td>
        </tr>
        <tr>
            <td>

            </td>

        </tr>
        </tbody>
            <button type="submit">创建</button>
        </form>
    </table>
    <h1>End of TABLE</h1>


    @if(!empty($inputs))
        <div class="col-md-7">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>Seat Code</th>
                    <td>{{$inputs}}</td>
                </tr>


                </tbody>
            </table>
        </div>
    @endif

@endsection