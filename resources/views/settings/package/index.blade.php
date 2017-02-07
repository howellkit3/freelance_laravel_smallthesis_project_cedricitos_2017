<?php $asset = URL::asset('/'); ?> 
@extends('master2')

@section('title', 'index')

@section('content')

<div class="card">
    <div class="card-header no-bg b-a-0">

        <span class ="pull-right">    
          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#packageCreate">+</button>
        </span>

        <h4>Package List </h4>
    </div>

    <div class="card-block">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead class="thead-inverse">
                        <tr>
                          <th>Package Name</th>
                          <th>Food Covered</th>
                          <th>Price Per Pax</th>
                          <th>Minimum</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($package_data as $ctr => $package)
                        
                          <tr>
                              <td>{{$package->name}}</td>
                              <td>
                                @foreach($package->food as $ctr2 => $food)

                                  {{$food_data[$food]}} <br>

                                @endforeach
                              </td>
                              <td>{{$package->price_per_pax}}</td>
                              <td>{{$package->minimum}}</td>
                              <td>
                                <button type="button" class="btn btn-primary fa fa-edit " data-toggle="modal" data-target=".modalEditPackage{{$package->id}}"></button>
                                <button type="button" class="btn btn-danger fa fa-remove " data-toggle="modal" data-target=".modalDeletepackage{{$package->id}}"></button>
                              </td>
                          </tr>

                          <div class="modal fade bd-example-modal-lg modalEditPackage{{$package->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <form class="form-horizontal form-label-left" method="post" action="{{route('settings.package.update',$package->id)}}" novalidate>

                                 {{ csrf_field() }}
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                          </button>
                                          <h4 class="modal-title" id="packageCreateLabel">Edit Campaign</h4>
                                      </div>

                                      <div class="modal-body">

                                        <input name="id" type="hidden"  value="{{$package->id}}">
                                        <input name="status" type="hidden"  value="1">

                                        <fieldset class="form-group">
                                          <label for="exampleInputEmail1">Name</label>
                                          <input type="text" class="form-control" placeholder="Name"  name="name" value = '{{$package->name}}' > 
                                        </fieldset>

                                        <fieldset class="form-group">
                                          <label for="exampleInputEmail1">Foods</label>
                                          <select multiple="multiple" required class="my-select" name="food[]">
                                            <optgroup label='Available Members'>

                                              @foreach($food_data as $ctr => $food)
                                                <option value='{{$ctr}}'>{{$food}}</option>
                                              @endforeach
                                              
                                            </optgroup>
                                          </select>
                                        </fieldset>

                                        <fieldset class="form-group">
                                          <label for="exampleInputEmail1">Price Per Pax</label>
                                          <input type="text" class="form-control" placeholder="Name"  name="price_per_pax" value ='{{$package->price_per_pax}}' > 
                                        </fieldset>

                                        <fieldset class="form-group">
                                          <label for="exampleInputEmail1">Minimum</label>
                                          <input type="text" class="form-control" placeholder="Name"  name="minimum" value ='{{$package->minimum}}' > 
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

                          <div class="modal fade bd-example-modal-lg modalDeletepackage{{$package->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <form class="form-horizontal form-label-left" method="post" action="{{route('settings.package.delete',$package->id)}}" novalidate>

                                   {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                           
                                        </div>

                                        <div class="modal-body">
                                           <h4 class="modal-title" id="packageCreateLabel">Are you sure you want delete '{{$package->name}}'</h4>
                                          <input name="id" type="hidden"  value="{{$package->id}}">
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

<!-- Modal -->
<div class="modal fade" id="packageCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <form class="form-horizontal" role="form" method="POST" action="{{ route('settings.package.create') }}">
          
            {{ csrf_field() }}

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Category for package Type</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
                
          
          <input name="status" type="hidden"  value="1" >

            <fieldset class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" placeholder="Name"  name="name" > 
            </fieldset>

            <fieldset class="form-group">
              <label for="exampleInputEmail1">Foods</label>
              <select multiple="multiple" class="my-select" name="food[]">
                <optgroup label='Available Members'>
                  @foreach($food_data as $ctr => $food)
                    <option value='{{$ctr}}'>{{$food}}</option>
                  @endforeach
                </optgroup>
              </select>
            </fieldset>

            <fieldset class="form-group">
              <label for="exampleInputEmail1">Price Per Pax</label>
              <input type="number" class="form-control" placeholder="Name"  name="price_per_pax" > 
            </fieldset>

            <fieldset class="form-group">
              <label for="exampleInputEmail1">Minimum</label>
              <input type="number" class="form-control" placeholder="Name"  name="minimum" > 
            </fieldset>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
    </div>
  </div>
</div>

@endsection 

@section('footer-scripts')

  <script src="{{$asset}}custom/multiselect/js/jquery.multi-select.js"></script>

  <script type="text/javascript">

    $('.my-select').multiSelect({ selectableOptgroup: true })

  </script>

@endsection