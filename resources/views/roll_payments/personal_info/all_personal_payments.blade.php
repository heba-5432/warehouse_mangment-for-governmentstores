
@extends('layouts.master')
<title>@yield('title')</title>
@section('title')
{{trans('transfile.personal')}}
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
				<class="row">
<!-- default form start--->

					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h2 class="card-title mb-1">
								<p class="mb-2">{{trans('transfile.payment_bones')}}</p></h2>
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
<label><h5><li>{{$users_roles->value('name')}}</li>&nbsp;<li> الدرجه الماليةوالوظيفيه:{{$degree_dis->value('fin_title')}} &nbsp;<li> الراتب  قبل الخصومات والاضافات :{{$degree_dis->value('salary')}} &nbsp;</li>

<span  style="color:blue">
نسبة الخصومات:{{$degree_dis->value('total_deduct')."%"}}</span>
<span  style="color:green">
 نسبة الاضافات:{{$degree_dis->value('total_allow') ."%"}}</span>
<span  style="color:red">
الراتب بعد الخصومات والاضافه:{{$degree_dis->value('total_of_all') }}</span>
<li>&nbsp;:  قاعدة الخصم للمكافات الغير العادي{{$degree_dis->value('dis_title')}}&nbsp;</li> <li>الخصم للمكافات الغير عادية :{{$degree_dis->value('total_dis')."%"}}</li>
</h4></label>
								<form class="form-horizontal"  method="POST" action="{{route('personal.ser')}}">
								@csrf
								@method('POST')
									<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" >
<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" >

                                        <label>start date</label>
										<input type="date" class="form-contro col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="start_date" placeholder="start date" value="{{old('start_date')}}">

                                        <label>end date</label>
										<input type="date" class="form-contro col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="end_date" placeholder="start date" value="{{old('end_date')}}">

                                    </div>

                                    </div>

									<div class="form-group mb-0 justify-content-end">

									</div>
									<div class="form-group mb-0 mt-3 justify-content-end">
										<div>
											<button type="submit" class="btn btn-primary">search</button>
											<button type="submit" class="btn btn-secondary">Cancel</button>
										</div>
									</div>
								</form>
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
                                <a href=""> <button class="btn ripple btn-secondary"  type="button">show all</button></a>


                                <table class="table text-md-nowrap" id="example2">
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


</tr>
</thead>

@if (!empty($users_aw))

@php
$z=$users_aw;

@endphp

@endif

@if(empty($users_aw))
@php
$z=$users_roles;

@endphp

@endif

@foreach( $z as $user_all)




											<tr>
											<td>{{$i=$i+1}}</td>
												<td width="5%" >{{$user_all->name}}</td>
<td>{{$user_all->pay_title}}</td>
<td>{{$user_all->payment_value}}</td>
<td>{{$user_all->pay_date}}</td>
<td>{{$user_all->total_after_dis}}</td>
<td>{{$user_all->total_after_reword}}</td>
<td>{{$user_all->total_after_add_dis}}</td>



</tr>

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
