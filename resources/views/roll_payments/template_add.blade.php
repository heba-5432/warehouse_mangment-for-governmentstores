
@extends('layouts.master')
<title>@yield('title')</title>
@section('title')
{{trans('transfile.library_system')}}
@endsection
@section('css')
<!---Internal Owl Carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
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
				<div class="row">
<!-- default form start--->

					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1">
								<p class="mb-2">{{trans('transfile.library_system')}}</p></h4>
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


<form class="form-horizontal"  method="POST" action=""  enctype="multipart/form-data">
								@csrf
								@method('POST')


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px">
									<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" style ="margin:10px">
<!-- col-4 -select start--->
<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px;padding:8 px;">

<label>store owner</label>
<select class=" select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="catogery_ida">

<option disabled >--choose catogery from panel--</option>

<option></option>


</select>

</div>
<!-- col-4 -select start--->
										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="title_ara" placeholder="arabic title" value="">


										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="title_eng" placeholder="english title"  value="">


										<input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="auther1a" placeholder="auther name"  value="">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther2a" placeholder="co-auther name"  value="">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther3a" placeholder="co-auther name"  value="">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther4a" placeholder="co-auther name"  value="">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther5a" placeholder="co-auther name"  value="">


                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="barcode_numbera" placeholder="barcode number"  value="">

                                            <textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="introductiona" placeholder="introduction" col="10" rows="5"></textarea>

										<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="summerya" placeholder="summery" col="10" rows="5"></textarea>

                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="locationa" placeholder="location for hard copy" value="">
                                        <input  style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="copies_numbera" placeholder="copies number" value="">
                                        </div> </div>
<div>
                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:55px; ">
                                        <label>cover image</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="profil_impatha" placeholder="cover image" value="">

                                        <label>file upload</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="pdfa" placeholder="start date" value="">

                                    </div></div>
									<!-- col-4 -select start--->
                                    <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px;padding:8 px;">

                                    <label>catogery</label>
<select class=" select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="catogery_ida">

    <option disabled >--choose catogery from panel--</option>
    @if(!empty($ItemsCatogery))
    @foreach ($ItemsCatogery as $catgory)
<option value="{{$catgory->id}}"
@if(!empty($Catogery_title))
@if ($Catogery_title == $catgory->id) ? {{$catgory->id}} selected :''

@endif

@endif

>{{$catgory->ar_title}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->





                                        <label  style ="margin:2px; padding:2px;">item type</label>
                                        <select class=" select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="catogery2_ida">

<option disabled >--choose catogery from panel--</option>

<option value=""

></option>

</select>



                                    </div>
<!-- col-4 -select start--->
                                    <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px LightGrey solid ;padding:10px;width:85% ;margin-right:55px; ">
                                    <p class="form-group" >Multiple Select to key words</p>
                                        <select class="form-control select2 col-lg-6 mg-t-20 mg-lg-t-0" multiple="multiple"name="keyword_ida[]">
                                        <option disabled >--choose --</option>

										</select>
                                        <!-- col-4 -select start--->
                                      <!--div--->

<span style="margin-right:100px; border:1px solid LightGrey ;padding:15px;width:100% ">

<label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-lock"></i></label>
  <input type="checkbox" id="main-toggle" class="main-secondary" name="lockeda" checked>
  <label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-eye"></i></label>

  <input type="checkbox" id="main-toggle" class="main-secondary" name="visiblea" checked>
  </span>
<!--div-->

                                    </div>








<!-- col-4 select end-->




                                    </div>
									<div class="form-group mb-0 justify-content-end" >
										<div class="checkbox">
											<div class="custom-checkbox custom-control">
												</div>
										</div>
									</div>
									<div class="form-group mb-0 mt-3 justify-content-end"  style ="margin:20px; padding:8px;">
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
                                <table class="table text-xs-nowrap  table-bordered table-striped" id="example2">    	<thead class="thead-dark">


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
  <th width="1%"><input type="checkbox" id="select-all" onclick="toggleSelectAll(this)">all</th>
                                            <th width="1%">no.&nbsp;&nbsp;</th>

												<th class="border-bottom-0"  width="1%"> {{trans('transfile.title')}} &nbsp;&nbsp;</th>

                                                <th class="border-bottom-0"  width="1%"> {{trans('transfile.description')}} &nbsp;&nbsp;</th>

												<th class="border-bottom-0" width=" auto" colspan="2" >action</th>

<th>chapters</th>
<th>versions</th>

										</thead>

										<tbody>


											<tr>

                                            <td width="1%"><input type="checkbox" class="table-checkbox" name="itemselected[]" value=""></td>

											<td width=" ">{{$i=$i+1}}</td>



												<td width=""></td>
<td></td>
<td></td>

												<td width="">
													<!-- Basic modal -edit button--start--->

													<a  data-target="#mo" data-toggle="modal" href="" class="btn btn-sm btn-info"><i style="padding:8px;" class="las la-pen"></i></a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mo">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<form class="form-horizontal"  method="POST" action="}">

					@csrf
								@method('POST')
                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px">
									<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" style ="margin:10px">
									<!-- col-4 -select start--->
<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px;padding:8 px;">

<label>store owner</label>
<select class=" select2 col-lg-8 mg-t-20 mg-lg-t-0 " name="catogery_ida">

<option disabled >--choose catogery from panel--</option>

<option></option>

</select>

</div>
<!-- col-4 -select start--->
                                    <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="title_ara" placeholder="arabic title" value="">


										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="title_eng" placeholder="english title" value="">


										<input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="auther1a" placeholder="auther name" value="">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther2a" placeholder="co-auther name" value="">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther3a" placeholder="co-auther name" value="">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther4a" placeholder="co-auther name" value="">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther5a" placeholder="co-auther name" value="">


                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="barcode_numbera" placeholder="barcode number" value="">

                                        <textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="introductiona" placeholder="introduction" col="10" rows="5"></textarea>

										<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="summerya" placeholder="summery" col="10" rows="5"></textarea>

                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="locationa" placeholder="location for hard copy" value="">
                                        <input  style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="copies_numbera" placeholder="copies number" value="}">
                                        </div> </div>
<div>
                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:55px; ">
                                        <label>cover image</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="profil_impatha" placeholder="cover image">

                                        <label>file upload</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="pdfa" placeholder="file upload" value="">


									<!-- col-4 -select start--->


                                    <label>catogery</label>
<select class=" select2" name="catogery_ida" style="width:30%">

    <option disabled >--choose catogery from panel--</option>

</select>








                                        <label  style ="margin:2px; padding:2px;">item type</label>
                                        <select class=" select2 " name="catogery2_ida" style="width:30%">

<option disabled >--choose catogery from panel--</option>

</select>



                                    </div>

                                <!-- col-4 select end-->


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px LightGrey solid ;padding:10px;width:100% ;margin-right:55px; ">
                                    <p class="form-group" >Multiple Select to key words</p>
                                        <select class="form-control select2 col-lg-8 mg-t-20 mg-lg-t-0" multiple="multiple"name="keyword_ida[]" width="50%"">
                                        <option disabled  >--choose --</option>

    </select>
                                      <!--div--->

<span style="margin-right:100px; border:1px solid LightGrey ;padding:15px;width:100% ">

<label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-lock"></i></label>
  <input type="checkbox"  class="main-secondary" name="lockeda"


   >
  <label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-eye"></i></label>

  <input type="checkbox"  class="main-secondary" name="visiblea"



>
  </span>
<!--div-->

                                    </div>



<!-- col-4 select end-->












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




 <!-- Basic modal -delete button--start--->
  <a class="btn btn-sm btn-danger" data-target="#mod" data-toggle="modal" href=""><i  style="padding:8px;"class="las la-trash"></i></a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href=""><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->

</div>


												 </td>

                                                <td> <a href=""><button class="btn ripple btn-primary" type="button">add chapters</button></a></td>
                                                <td> <a href=""><button class="btn ripple btn-primary" type="button">add version</button></a></td>

                                            </tr>

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
