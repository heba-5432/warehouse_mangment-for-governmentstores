
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
                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" style ="margin:10px">
								<p class="mb-2 col-lg-4 mg-t-20 mg-lg-t-0">{{trans('transfile.library_system')}}</p>


                                <button class="mb-2 col-lg-4 mg-t-20 mg-lg-t-0 btn btn-primary"
                                 style="direction:ltr;float:left ;width:auto;"> item tilte:{{$version->value('title_arav')}}</butt>
                            </div>
                            </h4>
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


<form class="form-horizontal"  method="POST" action="{{ route('ver_chapter.store') }}"  enctype="multipart/form-data">
								@csrf
								@method('POST')


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px">
									<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" style ="margin:10px">
<!-- col-4 -select start--->

<div>

<input type="hidden" value="{{ $version->value('id') }}" name="ver_id">
</div>
<!-- col-4 -select start--->
<label direction="lrt" text-align="left">chapter no.</label>
<select class=" select2 col-lg-1 mg-t-20 mg-lg-t-0  " name="chapter_nocv" >

<option disabled >--choose number--</option>

@for($i=1;$i<=300;$i++)
<option value="{{  $i}}">{{  $i}}</option>
@endfor
</select>

<!-- col-4 -select start--->

										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-8 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="chapter_tiltecv" placeholder="chapter tilte"  value="">


                                        <textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="part1cv" placeholder="part1  max char/2000" col="20" rows="5">{{ old('part1') }}</textarea>

<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="part2cv" placeholder="part2 max char/2000" col="20" rows="5">{{ old('part2') }}</textarea>
<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="part3cv" placeholder="part3 max char/2000" col="20" rows="5">{{ old('part3') }}</textarea>

<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="part4cv" placeholder="end of the chapter max char/1500" col="20" rows="5">{{ old('part4') }}</textarea>




                                       </div> </div>
<div>
                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px solid LightGrey ;padding:10px;width:83% ;margin-right:55px; ">
                                        <label>cover image</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="coverimgcv" placeholder="cover image" value="">

                                        <label>file upload</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="pdfacv" placeholder="" value="">

                                    </div></div>
									<!-- col-4 -select start--->
                                     <br>
                                    <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px;padding:8 px;">


                                      <!--div--->
                                      <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:35px; ">

                                      <input type="text" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="file_name1cv" placeholder="file_title" value="">

<span style="margin-right:200px; border:1px solid LightGrey ;padding:15px;width:100% ">

<label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-lock-open"></i></label>
  <input type="checkbox" id="main-toggle" class="main-secondary" name="lockedacv" checked>
  <label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-eye"></i></label>

  <input type="checkbox" id="main-toggle" class="main-secondary" name="visibleacv" checked>
  </span>
  </div>
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
                                            <th class="border-bottom-0"  width="1%"> item_title &nbsp;&nbsp;</th>
												<th class="border-bottom-0"  width="1%"> chapter no &nbsp;&nbsp;</th>

                                                <th class="border-bottom-0"  width="1%"> {{trans('transfile.title')}} &nbsp;&nbsp;</th>

												<th class="border-bottom-0" width=" auto" colspan="1" >action</th>

                                             <th>  <i style="font-size:20px" class="las la-eye"></i></th>
                                             <th>
<i style="font-size:20px" class="las la-lock-open"></i></th>
<th></th>

										</thead>
<?php $iy=1;?>
										<tbody>
@if(!empty($all_chapters))
@foreach( $all_chapters as $chapter)
											<tr>

                                            <td width="1%"><input type="checkbox" class="table-checkbox" name="itemselected[]" value=""></td>

											<td width=" ">{{$iy=$iy+1}}</td>

<td>{{$version->value('title_arav')}}</td>
                                            <td width="">{{  $chapter->chapternocv}}</td>
												<td width="">{{  $chapter->chapter_titlecv}}</td>


												<td width="">
													<!-- Basic modal -edit button--start--->

													<a  data-target="#mo{{ $chapter->id }}" data-toggle="modal" href="{{ $chapter->id }}" class="btn btn-sm btn-info"><i style="padding:8px;" class="las la-pen"></i></a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mo{{ $chapter->id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
                    <button class="mb-2 col-lg-4 mg-t-20 mg-lg-t-0 btn btn-primary"
                                 style="direction:ltr;float:left;width:auto; "> item tilte:{{$version->value('title_arav')}}</button>

						<form class="form-horizontal"  method="POST" action="{{ route('ver_chapter.edit',$chapter->id) }}" enctype="multipart/form-data">

					@csrf
								@method('POST')
                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px">
									<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" style ="margin:10px">
									<!-- col-4 -select start--->


<label class="  col-lg-2 mg-t-20 mg-lg-t-0"   direction="lrt" text-align="left">chapter no. {{  $chapter->chapternocv}}</label>
<select class=" select2 col-lg-4 mg-t-20 mg-lg-t-0  " name="chapter_no" style="width:150px;" >

<option disabled  selected>-choose number-</option>

@for($i=1;$i<=300;$i++)
<option value="{{  $i}}"


>{{ $i}}</option>
@endfor
</select>

<!-- col-4 -select start--->

										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-6 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="chapter_tilte" placeholder="chapter tilte"  value="{{  $chapter->chapter_titlecv}}">


                                        <textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="part1" placeholder="part1  max char/2000" col="20" rows="5">{{$chapter->chapter_part1cv }}</textarea>

<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="part2" placeholder="part2 max char/2000" col="20" rows="5">{{ $chapter->chapter_part2cv  }}</textarea>
<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="part3" placeholder="part3 max char/2000" col="20" rows="5">{{ $chapter->chapter_part3cv  }}</textarea>

<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="part4" placeholder="end of the chapter max char/1500" col="20" rows="5">{{ $chapter->chapter_part4cv  }}</textarea>




                                       </div> </div>
<div>
                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px solid LightGrey ;padding:10px;width:83% ;margin-right:55px; ">
                                        <label>cover image</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="coverimg1cv" >

                                        <label>file upload</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="pdfa1cv"  >

                                    </div></div>
									<!-- col-4 -select start--->
                                     <br>
                                    <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px;padding:8 px;">


                                      <!--div--->
                                      <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:35px; ">

                                      <input type="text" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="file_name1cv" placeholder="file_title" value="{{ $chapter->file_name }}">

<span style="margin-right:200px; border:1px solid LightGrey ;padding:15px;width:100% ">

<label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-lock-open"></i></label>
  <input type="checkbox" id="main-toggle" class="main-secondary" name="lockeda"

@if($chapter->lockcv== 'on')

  checked
@endif
  >
  <label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-eye" ></i></label>

  <input type="checkbox" id="main-toggle" class="main-secondary" name="visiblea"

@if($chapter->visiblitycv== 'on')

  checked
@endif
    >
  </span>
  </div>
<!--div-->










<!-- col-4 select end-->
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
  <a class="btn btn-sm btn-danger" data-target="#mod{{ $chapter->id }}" data-toggle="modal" href="{{ $chapter->id }}"><i  style="padding:8px;"class="las la-trash"></i></a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod{{ $chapter->id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href="{{route('ver_chapter.destroy', $chapter->id) }}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->

</div>


												 </td>

                                                 <td>
@if ($chapter->visiblitycv=='on') <i style="font-size:20px" class="las la-eye"></i>
@endif
@if ($chapter->visiblitycv !='on')
<i style="font-size:20px" class="las la-eye-slash"></i>
@endif



</td>

<td>
@if ($chapter->lockcv=='on') <i style="font-size:20px" class="las la-lock-open"></i>
@endif
@if ($chapter->lockcv !='on')
<i style="font-size:20px" class="las la-lock"></i>
@endif



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
