
@extends('layouts.master')
<title>@yield('title')</title>
@section('title')
{{trans('transfile.users_info')}}
@endsection
@section('css')
<!---Internal Owl Carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<style>
 /* Fixed sidenav, full height */
 .sidenav  {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn li {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 10px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
  margin-bottom: 10px;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover,.dropdown-container,  li:hover {
  color:rgb(28, 12, 172);
  background-color: aliceblue;
  padding: 5px ;

}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: blue;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
color: aliceblue;
  display: none;
  background-color:rgb(212, 208, 208);
  padding-left: 2px;
  height: 200px auto;
  width: 150px auto;
  padding:10px ;
}

/* Optional: Style the caret down icon */
.fa-caret-down {

  padding-right: 8px;
}
    </style>
@endsection
@section('page-header')

				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->

				<div class="row">
<!-- default form start--->

					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">




						<div class="card  box-shadow-0">

							<div class="card-header">
<!-- drop down menue--->
<button class="dropdown-btn btn ripple btn-primary " style="width:20%;float:left; margin-bottom:50px;text-align:left;height:10px auto;">
    <i  class="fa fa-caret-down">more info</i>
  </button>

  <div class="dropdown-container " style="color:red; background-color:LightGrey; margin-bottom:5px;text-align:left;height:10px auto; float:left"  >

    <p style="direction:ltr; margin-bottom:5px;text-align:left;height:10px auto; padding:4px;">
        <a  style="float:left" href="{{route('users.export')}}">export all users</a></p>
  <br> <p style="direction:ltr; margin-bottom:5px;text-align:left;height:10px auto;padding:4px;">
    <a style="float:left" class=" " data-target="#more" data-toggle="modal" href="">add bulk users through excel file</a>
   </p><br>
<p  style="direction:ltr; margin-bottom:5px;text-align:left;height:10px auto;padding:4px;">
    <a style="float:left" class="" data-target="#moreupload" data-toggle="modal" href="">update users by email-excel file</a>
</p>
  </div>
  <script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
  </script>
    <!-- drop down menue--->
 <!-- Basic modal add bulk usermodel button--start
 <a style="float:left" class="btn ripple btn-primary  col-lg-4 col-xl-4 col-md-4 col-sm-4" data-target="#more" data-toggle="modal" href="">add bulk users through excel file</a>
					<!-- Basic modal add bulk usermodel alert--start-end--->
<!-- Basic modal add bulk usermodel alert--start--->
<div class="modal" id="more">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">file excel upload</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

                    <form class="form-horizontal"  method="POST" action="{{route('user.bulkimport')}}" enctype="multipart/form-data">
								@csrf
								@method('POST')
									<!--div- file upload start--->
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5" style="word-wrap: break-word;">
                                {{trans('transfile.file_role_upload')}}
                                </div>
</br></hr>
								<div class="row row-sm">
									<div class="col-sm-7 col-md-6 col-lg-4">
										<div class="custom-file">
											<input class="custom-file-input" id="customFile" type="file" name="file_users_upload">
                                             <label class="custom-file-label" for="customFile">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


									<div class="form-group mb-0 mt-3 justify-content-end">
										<div>
											<button type="submit" class="btn btn-primary">upload</button>
                                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
</div>
				<!--div-add bulk usermodel alert--start--->

                 <!-- Basic modalupdate bulk usermodel button--start
 <a style="float:left" class="btn ripple btn-primary  col-lg-4 col-xl-4 col-md-4 col-sm-4" data-target="#moreupload" data-toggle="modal" href="">update users by email-excel file</a>
					<!-- Basic modal add bulk usermodel alert--start-end--->
<!-- Basic modal update bulk usermodel alert--start--->
<div class="modal" id="moreupload">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">file updated (excel should contain email col)</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

                    <form class="form-horizontal"  method="POST" action="{{route('user.updateimport')}}" enctype="multipart/form-data">
								@csrf
								@method('POST')
									<!--div- file upload start--->
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5" style="word-wrap: break-word;">
                                {{trans('transfile.file_role_upload')}}
                                </div>
</br></hr>
								<div class="row row-sm">
									<div class="col-sm-7 col-md-6 col-lg-4">
										<div class="custom-file">
											<input class="custom-file-input" id="customFile" type="file" name="file_users_update">
                                             <label class="custom-file-label" for="customFile">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


									<div class="form-group mb-0 mt-3 justify-content-end">
										<div>
											<button type="submit" class="btn btn-primary">update</button>
											<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>

										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
</div>
				<!--div-update bulk usermodel alert--end--->
								<h5><p class="mb-2">{{trans('transfile.add_users')}}</p></h5>
							</div>

							<div class="card-body pt-0">

                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
							@if (session('messege'))
    <div class="alert alert-danger">
        {{ session('messege') }}
    </div>
@endif


							</div>
						</div>
					</div>

				<!--div-->
                <div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{trans('transfile.show_info')}}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								</div>
                                <div class="card-body">
								<div class="table-responsive">

                                <form class="form-horizontal"  method="POST" action="{{route('user_select')}}">
@csrf
   @method('POST')

    <input type="submit" class="btn ripple btn-primary" value="delete selected" style="margin-bottom:10px;">
<br>

									<table id="example1" class="table key-buttons text-md-nowrap  table-bordered table-striped" width="90%">
										<thead class="thead-dark">


											<tr><?php $i=0;?>
                                            <script>
        // Function to toggle the selection of all checkboxes
        function toggleSelectAll(source) {
            const checkboxes = document.querySelectorAll('.table-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = source.checked;
            });
        }
    </script>
  <th><input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">all</th>

                                            <th width="5%">no.&nbsp;&nbsp;</th>
												<th class="border-bottom-0"  width="10%"> {{trans('transfile.name')}} &nbsp;&nbsp;</th>
                                                <th class="border-bottom-0"  width="5%" style=" word-wrap: break-word"> {{trans('transfile.email')}} &nbsp;&nbsp;</th>
                                                <th class="border-bottom-0"  width="10%"> {{trans('transfile.national_id')}} &nbsp;&nbsp;</th>
												<th class="border-bottom-0"  width="10%"> {{trans('transfile.role_level')}} &nbsp;&nbsp;</th>
                                                <th class="border-bottom-0" width="50px" >{{trans('transfile.finan_info')}}</th>

                                                <th class="border-bottom-0" width="50px" >action</th>
												<th class="border-bottom-0" width="50px" >action</th>
												<th>password</th>
                                                <th>payments</th>
                                                <th>status</th>
                                                <th>register by user</th>

						</tr>
										</thead>
										<tbody>
                                        @if(!empty($users_roles))
                                       @foreach($users_roles as $user_r)

											<tr>


                                            <td><input type="checkbox" class="table-checkbox" name="itemselected[]" value="{{$user_r->user_info_id}}"></td>

    </form>
                                            <td>{{$i=$i+1}}</td>
												<td width="5%" >{{$user_r->name}}</td>
                                                <td width="5%" style=" word-wrap: break-word">{{$user_r->email}}</td>
                                                <td width="5%">{{$user_r->national_id}}</td>
                                                <td width="5%">{{$user_r->role_title}}</td>
                                                <td width="5%">{{$user_r->fin_title}}</td>
												<td width="5%">
													<!-- Basic modal -edit button--start--->
													<a class="btn ripple btn-primary" data-target="#mo{{$user_r->user_info_id}}" data-toggle="modal" href="{{$user_r->user_info_id}}"><i class="fa fa-edit" aria-hidden="true"></i>

                                                    </a>

<!-- Basic modal -edit alert--start--->
<div class="modal  "  id="mo{{$user_r->user_info_id}}" >
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit user data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<form class="form-horizontal"  method="POST" action="{{route('user.edit',$user_r->user_info_id)}}">

					@csrf
								@method('POST')
                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12" style="float:right">
									<div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="name" placeholder="Name" value="{{$user_r->name}}">
									</div>
									<div class="form-group">
										<input type="email" class="form-control" id="inputEmail3" name ="email" placeholder="Email" value="{{$user_r->email}}">
									</div>
                                    <div class="form-group">
										<input type="text" class="form-control" id="inputName" name ="national_id" placeholder="national_id" value="{{$user_r->national_id}}">
									</div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12" style="float:right">

                                    <div class="form-group">
                                        @if(!empty($fin_d))
										<fieldset>
                                        {{trans('transfile.finan_info')}}
                                         </fieldset>
<!-- col-4 -select start--->
<div class="">

                                        <select class="class="form-select" name="position_id" >

											<option disabled selected>--choose from panel--</option>
                                    @foreach ($fin_d as $fin1_info )
                                    <option value="{{$fin1_info->id}}"

                                    @if($user_r->fintable_id==$fin1_info->id) ? {{$fin1_info->id}}  selected :''
                                    @endif



                                    >{{$fin1_info->fin_title}}</option>
                                    @endforeach


                                     </select>
                                    @endif

									</div>
                                   </div>
                                   <div class="form-group">
										<input type="text" class="form-control" id="inputName" name ="depar_id" placeholder="department" value="{{$user_r->depar_id}}">
									</div>
                                    <!-- col-4 select end-->

									<div class="form-group">
                                        @if(!empty($roles_info))
										<fieldset>
									{{trans('transfile.role_level')}}
                                         </fieldset>

									<select name="role_id" class="form-select">
									<option disabled selected>--choose from panel--</option>
                                    @foreach ($roles_info as $rol_info )



<option value="{{$rol_info->id}}"
@if($user_r->role_id==$rol_info->id) ? {{$rol_info->id}} selected :''

@endif
>{{$rol_info->role_title}}</option>

                                    @endforeach

                                     </select>
@endif
									</div>
                                    </div>
									<div class="form-group mb-0 justify-content-end" style="float:left">

									</div>
									<div class="form-group mb-0 mt-3 justify-content-end">

									</div>
								</div>
								<div class="modal-footer">
					<button>	<input type ="submit" class="btn ripple btn-primary"  value="edit"></button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
					</form>
					</div>

				</div>
			</div>
		</div>
		<!-- End Basic modal - edit-alert end---->


</td><td>

 <!-- Basic modal -delete button--start--->
  <a class="btn ripple btn-primary" data-target="#mod{{$user_r->user_info_id}}" data-toggle="modal" href="{{$user_r->user_info_id}}"><i class="fa fa-trash" aria-hidden="true"></i>
  </a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod{{$user_r->user_info_id}}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href="{{route('user.destroy',$user_r->user_info_id)}}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->

</div>


												| </td>

                                                <td>

 <!-- Basic modal -reset passsword button--start--->
  <a class="btn ripple btn-primary" data-target="#mors{{$user_r->user_info_id}}" data-toggle="modal" href="">rest_pass</a>
					<!-- Basic modal -reset passsword button--end--->
<!-- Basic modal -reset password alert--start--->
<div class="modal" id="mors{{$user_r->user_info_id}}">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">password rest</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

                    <form class="form-horizontal"  method="POST" action="{{route('user.password_reset',$user_r->user_info_id)}}">

@csrf
            @method('POST')


                    <div class="form-group">
										<input type="password" class="form-control" id="inputPassword3" name ="password" placeholder="Password">
									</div>
					<button>	<input type ="submit" class="btn ripple btn-primary"  value="edit"></button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
					</form>
					</div>

				</div>
			</div>
		</div>
		<!-- End Basic modal - rest password-alert end---->

</div>


												| </td>

<td><!-- drop down menue--
<button class="dropdown-btn{{$user_r->user_info_id}}">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
   <li><a  href="{{route('payment_bones.show',$user_r->user_info_id)}}">pay ment</a></li>
   <li><a  href="{{route('users_details.show',$user_r->user_info_id)}}">more_information</a></li>

  </div>
  <script>
    var dropdown = document.getElementsByClassName("dropdown-btn{{$user_r->user_info_id}}");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
  </script>
    <!-- drop down menue---></td>

<td>@if($user_r->adminnotreviewd  == 0)
<span style="color:red"> not reviewed, </span>
@endif
@if($user_r->adminnotreviewd  == 1)
<span style="color:green"> reviewed</span>
@endif
@if($user_r->adminnotreviewd  ==null)
<span style="color:blue"> didnot registerd</span>
@endif



 </td>
 <td>@if($user_r->status_registered  == 1)
<span style="color:red"> register by user</span>
@endif

@if($user_r->status_registered  ==0)
<span style="color:blue"> add by admin</span>
@endif
</td>
											</tr>
                                        @endforeach
                                        @endif
										</tbody>

									</table>


								</div>
							</div>
						</div>

					</div>




					<!--/div-->

 <!-- default form end--->
				</div>
				<!-- row closed -->

			<!-- Container closed -->
		</div>
		<!-- main-content closed -->



@endsection
@section('js')

<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

@endsection
