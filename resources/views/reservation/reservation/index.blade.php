<?php $asset = URL::asset('/'); ?> 
@extends('master2')

@section('title', 'index')

@section('content')

<div class="card">
    <div class="card-header no-bg b-a-0">

        <span class ="pull-right">   
          <a href="{{route('reservation.client')}}"> 
            <button type="button" class="btn btn-success btn-xs">+</button>
          </a>
        </span>

        <h4>Reservation List </h4>
    </div>

    <div class="card-block">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Client Name</th>
                            <th>Event</th>
                            <th>Event Date From</th>
                            <th>Event Date To</th>
                            <th>Food Taste Date</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservation as $ctr => $reserve)
                        
                            <tr>
                                <td>{{$reserve->user_id}}</td>
                                <td>{{$reserve->event_id}}</td>
                                <td>{{$reserve->event_date_from}}</td>
                                <td>{{$reserve->event_date_to}}</td>
                                <td>{{$reserve->food_taste_date}}</td>
                                <td>{{($reserve->status == 1) ? "Active" : "Inactive"}}</td>
                                <td>{{$reserve->created_at}}</td>
                                <td>
                                  <button type="button" class="btn btn-primary fa fa-edit " data-toggle="modal" data-target=".modalEditevent{{$reserve->id}}"></button>
                                  <button type="button" class="btn btn-danger fa fa-remove " data-toggle="modal" data-target=".modalDeleteevent{{$reserve->id}}"></button>
                                </td>
                        
                          
                            </tr>

                            <div class="modal fade bd-example-modal-lg modalEditevent{{$reserve->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <form class="form-horizontal form-label-left" method="post" action="{{route('settings.reservation.update',$reserve->id)}}" novalidate>

                                   {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="reservationCreateLabel">Approve Reservation Request</h4>
                                        </div>

                                        <div class="modal-body">

                                          <input name="id" type="hidden"  value="{{$reserve->id}}">
                                          <input name="status" type="hidden"  value="1">

                                          <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" placeholder="Name"  name="name" value ='{{$reserve->user_id}}' > 
                                          </fieldset>
                                      
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>

                                </form>
                              </div>
                          </div>

                          <div class="modal fade bd-example-modal-lg modalDeletereservation{{$reserve->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <form class="form-horizontal form-label-left" method="post" action="{{route('settings.reservation.delete',$reserve->id)}}" novalidate>

                                   {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                           
                                        </div>

                                        <div class="modal-body">
                                           <h4 class="modal-title" id="reservationCreateLabel">Are you sure you want delete '{{$reserve->name}}'</h4>
                                          <input name="id" type="hidden"  value="{{$reserve->id}}">
                                          <input name="status" type="hidden"  value="0">
                                      
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                              </div>
                          </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection 

@section('footer-scripts')


@endsection