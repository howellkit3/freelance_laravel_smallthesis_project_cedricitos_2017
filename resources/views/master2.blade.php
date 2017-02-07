<?php $asset = URL::asset('/'); ?>
<?php $role = Auth::user()->role ?>
<!doctype html>
<html lang="en">
   <!-- Mirrored from milestone.nyasha.me/latest/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2016 23:34:54 GMT -->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>@yield('title')</title>
      <link rel="stylesheet" href="{{$asset}}milestone/vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css">
      <link rel="stylesheet" href="{{$asset}}custom/multiselect/css/multi-select.css">
      
      <link rel="stylesheet" href="{{$asset}}milestone/styles/app.min.css">
      <script   src="{{$asset}}milestone/scripts/jquery-1.12.0.min.js" ></script>
      @yield('header-scripts')
   <style type="text/css">

     .table.customized-table td, .table.customized-table th{
         padding: 0 7px;
         white-space: nowrap;
     }
      .clearfix:after {
           visibility: hidden;
           display: block;
           font-size: 0;
           content: " ";
           clear: both;
           height: 0;
           }
      .clearfix { display: inline-block; }
      * html .clearfix { height: 1%; }
      .clearfix { display: block; }

      .configuration-cog{

         display: none;
      }

     .audittable{

       width:100%;

      }

      td, th {

         width: 4rem;
         height: 2rem;  
         padding:2px,0px,0px,2px !important;
         padding-left:4px;
         margin-bottom:2px;
         border: 1px solid #ccc;
         text-align: left;
         vertical-align: middle !important;

      }

      th {
         background: #535a6c;
         color:white;
         border-color: white;
      }

      tbody {

         text-align: left;

      }

      .btn-primary{

         margin-top: 2px;

      }

   </style> 


   </head>
   <body class="skin-4">

      <div class="app expanding">
         <div class="off-canvas-overlay" data-toggle="sidebar"></div>
         <div class="sidebar-panel">
            <div class="brand">  <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen hidden-lg-up"><i class="material-icons">menu</i> </a>   <a class="brand-logo"><img class="expanding-hidden" src="{{$asset}}milestone/images/logo.png" alt=""> </a> </div>
            <div class="nav-profile dropdown">
               <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                  <div class="user-image"><img data-url="{{config('app.images')}}diamond/profile/{{Auth::user()->id}}/40x40" src="" class="avatar img-circle" alt="user" title="user"></div> 
                  <div class="user-info expanding-hidden">{{Auth::user()->name}}<small class="bold">Administrator</small></div>
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="">Settings</a> <a class="dropdown-item" href="javascript:;">Upgrade</a> <a class="dropdown-item" href="javascript:;"><span>Notifications</span> <span class="tag bg-primary">34</span></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:;">Help</a> <a class="dropdown-item" href="#">Logout</a>
               </div>
            </div>
            <nav>
               <p class="nav-title">NAVIGATION</p> 
               <ul class="nav">      
                  <li>
                     <a href="javascript:;">
                        <span class="menu-caret"><i class="material-icons">arrow_drop_down</i> </span>
                        <i class="material-icons " style="color:#98fb98">stars</i> <span class="badge bg-primary pull-right"></span>
                         <span>Reservation</span>
                     </a>
                     <ul class="sub-menu">
                        <li>
                           <a href="javascript:;"><span class="menu-caret"><i class="material-icons">arrow_drop_down</i></span> <span>for approval</span></a>
                           <ul class="sub-menu">
                              <li><a href=""><span> Disputes(agents) </span></a></li>
                              <li><a href=""><span> Disputes </span></a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="javascript:;"><span class="menu-caret"><i class="material-icons">arrow_drop_down</i></span> <span>Request</span></a>
                           <ul class="sub-menu">
                              <li><a href=""><span>Disputes</span></a></li>
                           </ul>
                        </li>                                                   
                     </ul> 
                  </li> 

                  @if($role == 2)
                     <li>

                        <a href="javascript:;">
                           <span class="menu-caret"><i class="material-icons">arrow_drop_down</i> </span>
                           <i class="material-icons " style="color:#63E9FC">settings</i> <span class="badge bg-primary pull-right"></span>
                            <span>Settings</span>
                        </a>

                        <ul class="sub-menu">
                           <li><a href="{{route('settings.food')}}"><span>Food</span></a></li> 
                           <li><a href="{{route('settings.package')}}"><span>Packages</span></a></li> 
                           <li><a href="{{route('settings.food-category')}}"><span>Food Categories</span></a></li> 
                           <li><a href="{{route('settings.event')}}"><span>Events</span></a></li>          
                        </ul> 
                     </li> 
                  @endif
               </ul>
            </nav>
         </div>
         <div class="main-panel">

            <nav class="header navbar">
                  @yield('top-navigation')
            </nav>

            <div class="main-content">
               <div class="content-view">
                  @yield('content')
               </div>
            </div>
 
         </div> 


         <div class="modal fade sidebar-modal chat-panel" tabindex="-1" role="dialog" aria-labelledby="chat-panel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="chat-header">
                     <a class="pull-right" href="javascript:;" data-dismiss="modal"><i class="material-icons">close</i></a>
                     <div class="chat-header-title">People</div>
                  </div>
                  <div class="modal-body flex scroll-y">
                     <div class="chat-group">
                        <div class="chat-group-header">Favourites</div>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-online"></span> <span>Catherine Moreno</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-online"></span> <span>Denise Peterson</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-away"></span> <span>Charles Wilson</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-away"></span> <span>Melissa Welch</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-no-disturb"></span> <span>Vincent Peterson</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Pamela Wood</span></a>
                     </div>
                     <div class="chat-group">
                        <div class="chat-group-header">Online</div>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-online"></span> <span>Tammy Carpenter</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-away"></span> <span>Emma Sullivan</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-no-disturb"></span> <span>Andrea Brewer</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-online"></span> <span>Betty Simmons</span></a>
                     </div>
                     <div class="chat-group">
                        <div class="chat-group-header">Other</div>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Denise Peterson</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Jose Rivera</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Diana Robertson</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>William Fields</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Emily Stanley</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Jack Hunt</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Sharon Rice</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Mary Holland</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Diane Hughes</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Steven Smith</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Emily Henderson</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Wayne Kelly</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Jane Garcia</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Jose Jimenez</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Rachel Burton</span> </a><a href="javascript:;" data-toggle="modal" data-target=".chat-message"><span class="status-offline"></span> <span>Samantha Ruiz</span></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="modal fade chat-message" tabindex="-1" role="dialog" aria-labelledby="chat-message" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="chat-header">
                     <div class="pull-right dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="javascript:;">Profile</a> <a class="dropdown-item" href="javascript:;">Clear messages</a> <a class="dropdown-item" href="javascript:;">Delete conversation</a> <a class="dropdown-item" href="javascript:;" data-dismiss="modal">Close chat</a></div>
                     </div>
                     <div class="chat-conversation-title">
                        <img src="{{$asset}}milestone/images/face1.jpg" class="avatar avatar-xs img-circle m-r-1 pull-left" alt="">
                        <div class="overflow-hidden"><span><strong>Charles Wilson</strong></span> <small>Last seen today at 03:11</small></div>
                     </div>
                  </div>
                  <div class="modal-body flex scroll-y">
                     <p class="text-xs-center text-muted small text-uppercase bold m-b-1">Yesterday</p>
                     <div class="chat-conversation-user them">
                        <div class="chat-conversation-message">
                           <p>Hey.</p>
                        </div>
                     </div>
                     <div class="chat-conversation-user them">
                        <div class="chat-conversation-message">
                           <p>How are the wife and kids, Taylor?</p>
                        </div>
                     </div>
                     <div class="chat-conversation-user me">
                        <div class="chat-conversation-message">
                           <p>Pretty good, Samuel.</p>
                        </div>
                     </div>
                     <p class="text-xs-center text-muted small text-uppercase bold m-b-1">Today</p>
                     <div class="chat-conversation-user them">
                        <div class="chat-conversation-message">
                           <p>Curabitur blandit tempus porttitor.</p>
                        </div>
                     </div>
                     <div class="chat-conversation-user me">
                        <div class="chat-conversation-message">
                           <p>Goodnight!</p>
                        </div>
                     </div>
                     <div class="chat-conversation-user them">
                        <div class="chat-conversation-message">
                           <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                        </div>
                     </div>
                  </div>
                  <div class="chat-conversation-footer">
                     <button class="chat-left"><i class="material-icons">face</i></button>
                     <div class="chat-input" contenteditable=""></div>
                     <button class="chat-right"><i class="material-icons">photo</i></button>
                  </div>
               </div>
            </div>
         </div>


      </div>
      <script type="text/javascript"></script>
      <script src="{{$asset}}milestone/vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
      <script src="{{$asset}}milestone/scripts/helpers/noty-defaults.js"></script>    
      <script src="{{$asset}}milestone/scripts/app.min.js"></script>
      <script src="{{$asset}}socketio/socket.io.js"></script> 
      @yield('footer-scripts')
   </body>
   
</html> 