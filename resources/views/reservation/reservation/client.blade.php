<?php $asset = URL::asset('/'); ?> 
@extends('master2')

@section('title', 'index')

@section('content')

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

     <span class ="pull-right">    
        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#foodCreate">Click Here to Reserve your Event</button>
    </span>

    <div >

      {!! $calendar->calendar() !!}
      {!! $calendar->script() !!}

    </div>

    <div class="modal fade" id="foodCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="card-header no-bg b-a-0">

        <h4>Request for an Event </h4>
    </div>

    <div class="card-block">
      <div class="row">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('settings.reservation.create') }}">
          <div class="col-lg-6">
        
            {{ csrf_field() }}

            <input name="status" type="hidden"  value="1" >

              <fieldset class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" readonly class="form-control" placeholder="Name" name="name" value ='{{$user->name ." ". $user->last_name}}' > 
              </fieldset>

              <fieldset class="form-group">
                <label for="exampleInputEmail1">Category</label>
                  <select class=" form-control" name="event_id">
                    @foreach($event_data as $ctr => $event_data)
                      <option value = "{{$event_data['id']}}">{{$event_data['name']}}</option>
                    @endforeach
                  </select>
              </fieldset>

              <fieldset class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="text" readonly class="form-control" placeholder="Name" name="status" value ='Pending' > 
              </fieldset>

            </div>

          <div class="col-lg-6">
        
            {{ csrf_field() }}

            <input name="status" type="hidden"  value="1" >

              <fieldset class="form-group">
                  <label >Start Date</label>
                  <input  class="form-control m-b-1 datepicker"  name = "start_date" data-provide="datepicker"  > 

              </fieldset>

              <fieldset class="form-group">
                  <label >Start Time</label>
                  <div class="input-group clockpicker">
                      <input class="form-control timepicker" name = "start_time"  type="text"> <span class="input-group-addon"><i class="material-icons">access_time</i></span>
                  </div>
              </fieldset>

              <fieldset class="form-group">
                  <label >End Date</label>
                  <input name = "end_date" class="form-control m-b-1 datepicker" data-provide="datepicker"  > 
              </fieldset>

              <fieldset class="form-group">
                <label >End Time</label>
                  <div class="input-group clockpicker">
                      <input class="form-control timepicker" name = "end_time"  type="text"> <span class="input-group-addon"><i class="material-icons">access_time</i></span>
                  </div>
              </fieldset>

            </div>

            <button type="submit" class="btn btn-primary pull-right">Save</button>

        </div>
      </form>
    </div>
</div>

      </div>
    </div>
  </div>


@endsection 

@section('footer-scripts')

  <script src="{{$asset}}milestone/vendor/moment/min/moment.min.js"></script>
  <script src="{{$asset}}milestone/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="{{$asset}}milestone/vendor/clockpicker/dist/bootstrap-clockpicker.js"></script>
  <script src="{{$asset}}milestone/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="{{$asset}}milestone/vendor/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="{{$asset}}milestone/vendor/fullcalendar/dist/gcal.js"></script>
  <script src="{{$asset}}milestone/scripts/app/calendar.js"></script>

  <script type="text/javascript">

    $('.datepicker').datepicker({
      dateFormat: 'YYYY-MM-DD'
    });

      $('.timepicker').timepicker();

    $( ".daterangeinput" ).change(function() {
        daterangevalue = $( ".daterangeinput" ).val();
        $( ".disputelabelinput" ).val(daterangevalue);
    });



  </script>

   <script>
            $(window).load(function () {

           
                var calendar = $('#fullcalendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    }
                 
    
                });
            });

        </script>
  
@endsection