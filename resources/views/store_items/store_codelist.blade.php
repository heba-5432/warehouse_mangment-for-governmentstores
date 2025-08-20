
@extends('layouts.master')
<title>@yield('title')</title>
@section('title')
{{trans('transfile.library_catogries')}}
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
 .sidenav {
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
.sidenav a, .dropdown-btn {
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
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover,.dropdown-container li:hover {
  color:rgb(28, 12, 172);
  background-color: aliceblue;
  padding: 5px;
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
				<!-- breadcrumb
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @yield('title')</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>

						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				 breadcrumb -->
@endsection
@section('content')
				<!-- row -->

<!-- default form start--->
				<div class="row">
<!-- default form start--->
<!--- drop down menue start----------------->
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">




						<div class="card  box-shadow-0">
<!-- drop down menue1 start--->							<div class="card-header">


<div class="dropdown" style="float:left">

	<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
	data-toggle="dropdown" id="dropdownMenuButton" type="button"> <i class="fas fa-caret-down ml-1"> </i>excel options</button>
	<div  class="dropdown-menu tx-13">
		<a class="dropdown-item"  style="float:left ;direction:ltr;text-align:left" href="{{route('codelist.export')}}">export all codes</a></a>
		<a style="float:left;direction:ltr;text-align:left" class="dropdown-item " data-target="#more" data-toggle="modal" href="">add bulk users through excel file</a>
        <a style="float:left;direction:ltr;text-align:left" class="dropdown-item" data-target="#moreupload" data-toggle="modal" href="">update users by email-excel file</a>

	</div>
</div>
<h4 class="mb-2">{{trans('transfile.add_users')}}</h4>
</div></div>

<!-- drop down menue1 end--->
<div class="card-header">

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


                    <form class="form-horizontal"  method="POST" action="{{route('codestore.bulkimport')}}" enctype="multipart/form-data">
								@csrf
								@method('POST')
									<!--div- file upload start--->
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5" style="word-wrap: break-word;">
                                {{'تحميل ملفات الاكسل للاكواد المعرفة'}}
                                </div>
</br></hr>
								<div class="row row-sm">
									<div class="col-sm-7 col-md-6 col-lg-8">
										<div class="custom-file">
											<input class="custom-file-input" id="customFile" type="file" name="code_storeupload">
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

                    </div>
</div>

<!--- drop down menue end----------------->


					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1">
								<p class="mb-2">ادخل كود لتعريف العناصر</p></h4>
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

								<form class="form-horizontal"  method="POST" action="{{route('code_list_items.store')}}">
								@csrf
								@method('POST')
                                <div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="serialnum" placeholder=" item code number" value="{{old('serialnum')}}">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="title_ar" placeholder=" item title arabic" value="{{old('title_ar')}}">
									</div>
                                    <div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="title_eng" placeholder=" item title in english" value="{{old('title_eng')}}">
									</div>

									<div class="form-group">
										<input type="text" class="form-control" id="inputName" name ="descrption" placeholder="descrption"  value="{{old('descrption')}}">
									</div>



									<div class="form-group mb-0 justify-content-end">
										<div class="checkbox">

										</div>
									</div>
									<div class="form-group mb-0 mt-3 justify-content-end">
										<div>
											<button type="submit" class="btn btn-primary">submit</button>
											<button type="submit" class="btn btn-secondary">Cancel</button>
										</div>
									</div>
								</form>
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


                                <table class="table text-xs-nowrap  table-bordered table-striped" id="example2">
                                    	<thead class="thead-dark">
@if(!empty('$code_list_items'))
                                        <?php $i=0;?>
											<tr>
                                            <script>
        // Function to toggle the selection of all checkboxes
        function toggleSelectAll(source) {
            const checkboxes = document.querySelectorAll('.table-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = source.checked;
            });
        }
    </script>
  <th width="1%"><input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">all</th>
                                            <th >no.&nbsp;&nbsp;</th>
												<th class="border-bottom-0"  > serial nimber &nbsp;&nbsp;</th>
                                                <th class="border-bottom-0"  >الاسم بالعربي &nbsp;&nbsp;</th>
                                                <th class="border-bottom-0"  >الاسم بالانجلشي&nbsp;&nbsp;</th>
                                                <th class="border-bottom-0"  > {{trans('transfile.description')}} &nbsp;&nbsp;</th>

												<th class="border-bottom-0"  colspan="2" >action</th>

<th></th>
										</thead>
                                </tr>
										<tbody>

                                        @foreach ($Itemscodelist as $cat_items )

                                        <td ><input type="checkbox" class="table-checkbox" name="itemselected[]" value=""></td>
                                        <td >{{$i=$i+1}}</td>
                                        <td >{{$cat_items->serial_numcla}}</td>
												<td >{{$cat_items->ar_titlecla}}</td>
                                                <td >{{$cat_items->En_titlecla}}</td>
                                                <td  >{{$cat_items->descriptioncla}}</td>

												<td width="">
													<!-- Basic modal -edit button--start--->
													<a class="btn btn-sm btn-info" data-target="#mo{{$cat_items->id}}" data-toggle="modal" href="{{$cat_items->id}}"><i style="padding:8px;" class="las la-pen"></i></a>
                                                   <!-- Basic modal -edit alert--start--->
<div class="modal" id="mo{{$cat_items->id}}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit  data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<form class="form-horizontal"  method="post" action="{{route('code_list_items.edit',$cat_items->id)}}">

					@csrf
								@method('POST')
                                 <div class="form-group">
										<input type="number" class="form-control" id="inputName"  name ="serialnum" placeholder=" item code number" value="{{$cat_items->serial_numcla}}">
									</div>
                                <div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="title_ar" placeholder=" item title arabic" value="{{$cat_items->ar_titlecla}}">
									</div>
                                    <div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="title_eng" placeholder=" item title in english" value="{{$cat_items->En_titlecla}}">
									</div>

									<div class="form-group">
										<input type="text" class="form-control" id="inputName" name ="descrption" placeholder="descrption" value="{{$cat_items->descriptioncla}}">
									</div>

									<div class="form-group mb-0 justify-content-end">

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
  <a class="btn ripple btn-danger" data-target="#mod{{$cat_items->id}}" data-toggle="modal" href="{{$cat_items->id}}"><i  class="las la-trash"></i></a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod{{$cat_items->id}}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href="{{route('code_list_items.destroy',$cat_items->id)}}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->

</div>


												</td>
                                                <td></td>
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
