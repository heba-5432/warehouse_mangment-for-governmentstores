
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
								<h4 class="card-title mb-1">
								<p class="mb-2">more details</p></h4>
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
<h5>{{$users_info->value('name') }}&nbsp  &nbsp{{$users_info->value('national_id')}}</h5>

								<form class="form-horizontal"  method="POST" action="{{route('users_details.edit',$users_info->value('details_id'))}}" enctype="multipart/form-data">
								{{ csrf_field() }}
								@method('POST')
									<div class="form-group">
										<input type="hidden" class="form-control" id="inputName"  name ="name" placeholder="Name" value="{{$users_info->value('name') }}">
									</div>

    <!--div-->
					<div class=" col-lg-12 mg-t-20 mg-lg-t-0">
						<div class="card col-lg-4 mg-t-20 mg-lg-t-0" style="float:right ;height:150px">
							<div class="card-body">
								<div class="main-content-label mg-b-3">
									upload profile image
								</div>
								<p class="mg-b-20"> for img  max size 2 mb(only jpg ,jpeg,png,).</p>
								<div class="row row-sm">
									<div class="col-sm-7 col-md-6 col-lg-12">
										<div class="custom-file">
											<input class="custom-file-input" id="customFile" type="file" name="profileimg"> <label class="custom-file-label" for="customFile">Choose file</label>
										</div>
									</div>
								</div>
							</div>
                            </div>

					<!--/div-->
                    	<!--div-->

						<div class="card col-lg-4 mg-t-20 mg-lg-t-0" style="float:right; height:150px">
							<div class="card-body">
								<div class="main-content-label mg-b-3">
									upload cv-> pdf
								</div>
								<p class="mg-b-20"> for img  max size 2 mb(only pdf ,doc).</p>
								<div class="row row-sm">
									<div class="col-sm-7 col-md-6 col-lg-12">
										<div class="custom-file">
											<input class="custom-file-input" id="customFile" type="file" name="cvpdf"> <label class="custom-file-label" for="customFile">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>

					<!--/div-->
                    <!--div-->
                    @if(!empty($users_info->value('profil_impath') or $users_info->value('files_path')))
						<div class="card col-lg-4 mg-t-20 mg-lg-t-0" height="150px ">
							<div class="card-body">
								<div class="main-content-label mg-b-3">
									uploaded  files
								</div>

                                @if(!empty($users_info->value('profil_impath')))
<h6>
  <!-- Basic modal -delete button--start--->
<a class=" btn"  data-target="#mod2{{$users_info->value('id')}}" data-toggle="modal" href="{{$users_info->value('id')}}"><i class="fa fa-trash-o" style="color:red;"></i>
</a>
					<!-- Basic modal -delete button--end--->
<img src="{{ asset('uploads/'.$users_info->value('profil_impath'))}}" alt="profile" width="150px" height="100px;">


<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod2{{$users_info->value('id')}}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete profile pic</p>
					</div>
					<div class="modal-footer">
						<a href="{{route('deleteimg',$users_info->value('id'))}}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->


</h6>
@endif

@if(!empty($users_info->value('files_path')))
<h6>file upload : <a href="{{ asset('uploads/' .$users_info->value('files_path')) }}" target="_blank">{{$users_info->value('file_name')}}</a></h6>
<!-- Basic modal -delete button--start--->
<a class="btn ripple btn-primary" data-target="#mod{{$users_info->value('id')}}" data-toggle="modal" href="{{$users_info->value('id')}}">delete</a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod{{$users_info->value('id')}}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href="{{route('deletefile',$users_info->value('id'))}}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->
@endif
							</div>
						</div>
					</div>
                    @endif
					<!--/div-->

									<div class="form-group">
                                more details:    <textarea class="form-control mg-t-20" placeholder="notices details"  rows="4" name="more_details">
                                        @if(!empty($users_info->value('descrption')))
                                    {{$users_info->value('descrption')}}
                                    @endif
                                </textarea>
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


				<!--div-->

</div>
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
