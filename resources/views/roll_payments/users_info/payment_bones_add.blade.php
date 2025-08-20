
@extends('layouts.master')
<title>@yield('title')</title>
@section('title')
{{trans('transfile.payment_bones')}}
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
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
<!-- default form start--->

					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1">
								<p class="mb-2">{{trans('transfile.payment_bones')}}</p>
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

{{$users_roles->value('name')}}&nbsp; {{$degree_dis->value('fin_title')}} &nbsp; &nbsp;salary: {{$degree_dis->value('salary')}} &nbsp;&nbsp;{{$degree_dis->value('dis_title')}}&nbsp; {{$degree_dis->value('total_dis')}}
			</h4>   </div></div>
            <div class="card-header">
                            <form class="form-horizontal"  method="POST" action="{{route('payment_bones.store')}}">
								@csrf
								@method('POST')
									<div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="pay_title" placeholder="pay_title">
									</div>
									<div class="form-group">
										<input type="date" class="form-control" id="inputEmail3" name ="pay_date" placeholder="pay_date">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="inputPassword3" name ="payment_value" placeholder="payment_value">
									</div>
									<div class="form-group">
										<input type="hidden" class="form-control" id="inputPassword3" name ="user_id" placeholder="اسم المستخدم " value="{{$users_roles->value('user_info_id')}}">
									</div>
									<div class="form-group">
										<input type="hidden" class="form-control" id="inputName" name ="discnt_role_id" placeholder="role for discount"  value="{{$degree_dis->value('distab_id')}}">
									</div>
                                    <div class="form-group">
										<input type="hidden" class="form-control" id="inputName" name ="financ_id" placeholder="الجرجه الماليه"  value="{{$degree_dis->value('fintab_id')}}">
									</div>
                                    <div class="form-group">
										<input type="text" class="form-control" id="inputName" name ="serial_number" placeholder="serial"  value="{{rand(100,5000)}}">
									</div>


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
								<table id="example" class="table key-buttons text-md-nowrap  table-bordered table-striped" width="90%">
										<thead class="thead-dark">


											<tr><?php $i=0;?>

                                            <th width="5%">no.&nbsp;&nbsp;</th>
												<th class="border-bottom-0"  width="10%"> {{trans('transfile.title')}} &nbsp;&nbsp;</th>
  <th class="border-bottom-0"  width="10%"> {{trans('transfile.description')}} &nbsp;&nbsp;</th>
<th>value</th>
<th>will be add at</th>
<th>اجمالى بعد الخصم </th>
<th>اجمالى بعد الاضافه</th>
<th>اجمالى بعد الخصم والاضافه</th>
												<th class="border-bottom-0" width="50px" >action</th>
												<th class="border-bottom-0" width="50px" >action</th>
												<th width="50px">no.</th>
						</tr>
										</thead>
										<tbody>

@foreach( $users_roles as $user_all)
@if(!empty($users_roles))
@if(!empty($user_all->roll_id))
											<tr>
											<td>{{$i=$i+1}}</td>
												<td width="5%" >{{$user_all->name}}</td>
<td>{{$user_all->pay_title}}</td>
<td>{{$user_all->payment_value}}</td>
<td>{{$user_all->pay_date}}</td>
<td>{{$user_all->total_after_dis}}</td>
<td>{{$user_all->total_after_reword}}</td>
<td>{{$user_all->total_after_add_dis}}</td>

												<td width="10%">
													<!-- Basic modal -edit button--start--->
													<a class="btn ripple btn-primary" data-target="#mo{{$user_all->roll_id}}" data-toggle="modal" href="{{$user_all->roll_id}}">edit</a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mo{{$user_all->roll_id}}">

<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit  data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<form class="form-horizontal"  method="POST" action="{{route('payment_bones.edit',$user_all->roll_id)}}">

					@csrf
								@method('POST')
                                <div class="form-group">
										<input type="text" class="form-control" id="inputName"  name ="pay_title" placeholder="pay_title" value="{{$user_all->pay_title}}">
									</div>
									<div class="form-group">
										<input type="date" class="form-control" id="inputEmail3" name ="pay_date" placeholder="pay_date" value="{{$user_all->pay_date}}">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="inputPassword3" name ="payment_value" placeholder="payment_value" value="{{$user_all->payment_value}}" >
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


</td>
<td>

 <!-- Basic modal -delete button--start--->
  <a class="btn ripple btn-primary" data-target="#mod{{$user_all->roll_id}}" data-toggle="modal" href="">delete</a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod{{$user_all->roll_id}}">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href="{{route('payment_bones.destroy',$user_all->roll_id)}}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
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
                                            @endif
                                            @endif
                                            @endforeach

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
