<?php $asset = URL::asset('/'); ?> 
@extends('master2')

@section('title', 'index')

@section('content')

<div class="card">
    <div class="card-header no-bg b-a-0">Food List 
    	<span class ="pull-right">    
    		<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">+</button>
    	</span>
    </div>

    <div class="card-block">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Food</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <form id="validate" class="form-horizontal" role="form" method="POST" action="{{route('settings.food.create')}}">
          
        	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add Food in the List</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      	</div>

          <input type="hidden" value ="1" name="status" > 

          {{ csrf_field() }}



	        <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	            <button type="submit" class="btn btn-primary">Save</button>
	        </div>

        </form>
    </div>
  </div>
</div>

@endsection 

@section('footer-scripts')


@endsection