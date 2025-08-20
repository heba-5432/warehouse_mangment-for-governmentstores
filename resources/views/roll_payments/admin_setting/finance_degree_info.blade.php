
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
@endsection
@section('page-header')

@endsection
@section('content')
				<!-- row -->
				<div class="row">
<!-- default form start--->

					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1"></h4>
								<p class="mb-2">{{trans('transfile.finan_info')}}</p>
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

								<form class="form-horizontal"  method="POST" action="{{route('finan_info.store')}}">
								@csrf
								@method('POST')
									<div class="form-group">
                                    <input type="hidden" class=" col-lg-2 mg-t-20 mg-lg-t-0" id="inputName"  name ="fin_ser" placeholder="title" value="{{rand(10,90000)}}">
                                    <div>
                                        <br>
                                    <div class="form-group">
										<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="fin_title" placeholder="title" value="{{old('fin_title')}}">


										<input type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputEmail3" name ="fin_descreption" placeholder="decription"  value="{{old('fin_descreption')}}">




										<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="salary" placeholder="salary"   value="{{old('salary')}}">
									</div>
                                    <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" >

										<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="allow1" placeholder="allowance1" value="{{old('allow1')}}">


										<input type="text" class="col-lg-3 mg-t-20 mg-lg-t-0" id="inputEmail3" name ="allow2" placeholder="allowance2"  value="{{old('allow2')}}">


										<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="allow3" placeholder="allowance3"   value="{{old('allow3')}}">
</div>
                                        <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" >
										<input type="text" class="col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="deduct1" placeholder="deduction1" value="{{old('deduct1')}}">


										<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputEmail3" name ="deduct2" placeholder="deduction2"  value="{{old('deduct2')}}">


										<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="deduct3" placeholder="deduction3"   value="{{old('deduct3')}}">

</div>

									<!-- col-4 -select start--->
<div class="col-lg-6 mg-t-20 mg-lg-t-0">

<select class="form-control select2" name="disrole_id" >



    <option disabled selected>اختر قاعده الخصم للمكافات  لجهود الغير عاديه</option>

    @foreach ($disct as $dis1)
                                    <option value="{{$dis1 ->id}}"




                                    >{{$dis1->dis_title}}</option>
                                    @endforeach



</select>


</div>
<!-- col-4 select end-->

									<div class="form-group mb-0 justify-content-end">

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
									<table class="table text-md-nowrap" id="example1">
                                        <thead class="thead-dark">


											<tr><?php $i=0;?>

                                            <th width="5%">no.&nbsp;&nbsp;</th>
												<th class="border-bottom-0"  width="10%"> {{trans('transfile.title')}} &nbsp;&nbsp;</th>
                                                <th class="border-bottom-0"  width="10%"> describ &nbsp;&nbsp;</th>
                                                <th>salary</th>
                                                <th>discount role</th>
<th >salary deduction </th>
<th style="width:5%">salary allownce</th>
<th style="width:5%">salary (allow deduction)</th>
												<th class="border-bottom-0" width="50px" >action</th>
												<th class="border-bottom-0" width="50px" >action</th>
												<th width="50px">no.</th>
						</tr>
										</thead>
										<tbody>

@if(!empty('$finan'))
	@foreach($finan as $fin_db)										<tr>
											<td>{{$fin_db->fic2_id}}</td>
												<td width="5%" >{{$fin_db->fin_title}}</td>

    <td width="5%" >{{$fin_db->fin_descreption}}</td>
    <td  width="5%">{{$fin_db->salary}}</td>
<td  width="5%">{{$fin_db->dis_title}}</td>

<td  width="5%">{{$fin_db->total_after_deduct}}</td>
<td  width="5%">{{$fin_db->total_after_allow}}</td>
<td  width="5%">{{$fin_db->total_of_all}}</td>
												<td width="10%">
													<!-- Basic modal -edit button--start--->
													<a  data-target="#mo{{$fin_db->fic2_id}}" data-toggle="modal" href="{{$fin_db->fic2_id}}"class="btn btn-sm btn-info"><i style="padding:8px;" class="las la-pen"></i></a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mo{{$fin_db->fic2_id}}">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit  data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<form class="form-horizontal"  method="POST" action="{{route('finan_info.edit',$fin_db->fic2_id)}}">

					@csrf
								@method('POST')
									<div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="fin_title" placeholder="Name" value="{{$fin_db->fin_title}} ">
									</div>
                                    <div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="fin_descreption" placeholder="Name" value="{{$fin_db->fin_descreption }}">
									</div>
                                    <div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="salary" placeholder="salary" value="{{$fin_db->salary}} ">
									</div>
                                    <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" >

<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="allow1" placeholder="allowance1" value="{{$fin_db->allow1}}">


<input type="text" class="col-lg-3 mg-t-20 mg-lg-t-0" id="inputEmail3" name ="allow2" placeholder="allowance2"  value="{{$fin_db->allow2}}">


<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="allow3" placeholder="allowance3"   value="{{$fin_db->allow3}}">
</div>
<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" >
<input type="text" class="col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="deduct1" placeholder="deduction1" value="{{$fin_db->deduct1}}">


<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputEmail3" name ="deduct2" placeholder="deduction2"  value="{{$fin_db->deduct2}}">


<input type="text" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputName"  name ="deduct3" placeholder="deduction3"   value="{{$fin_db->deduct3}}">

</div>

  <!-- col-4 select end-->

  <div class="form-group">
                                        @if(!empty($disct))
										<fieldset>
									{{trans('transfile.role_level')}}
                                         </fieldset>

									<select name="disrole_id" class="form-select">
									<option disabled selected>--choose from panel--</option>
                                    @foreach ($disct as $dis1)
                                    <option value="{{$dis1->id}}"
                                   @if($dis1->id==$fin_db->disrole_id) ? {{$fin_db->disrole_id}} selected :''

@endif
>{{$dis1->dis_title}}</option>

                                    @endforeach

                                     </select>
@endif


									<div class="form-group mb-0 justify-content-end">

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
  <a class="btn ripple btn-danger" data-target="#mod{{$fin_db->fic2_id}}" data-toggle="modal" href="" class="btn btn-sm btn-info"><i style="" class="las la-trash"></i></a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod{{$fin_db->fic2_id}}">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href="{{route('finan_info.destroy',$fin_db->fic2_id)}}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->

</div>


												| </td>
												<td >ادخل راتب</td>
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
