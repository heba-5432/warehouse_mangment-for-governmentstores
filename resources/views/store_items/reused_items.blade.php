
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
								<p class="mb-2">{{"العناصر المستعمله الصالحة للاستخدام"}}</p>



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

                                                <th class="border-bottom-0"  width="1%"> {{ "العدد التى تم نقله" }} &nbsp;&nbsp;</th>
<th class="border-bottom-0"  width="1%"> {{ " العدد الحالى" }} &nbsp;&nbsp;</th>

                                                <th>مسترجع من </th>
												<th class="border-bottom-0" width=" auto" colspan="2" >action</th>
<th>السعر التقديري للقطعه </th>
<th>السعر الاجمالى</th>
<th>اضافه الى مستخدم اخر</th>

<th></th>
<th></th>
										</thead>

										<tbody>


											<tr>
@if(!empty($reused_items))
@foreach($reused_items as $reusuedi)
                                            <td width="1%"><input type="checkbox" class="table-checkbox" name="itemselected[]" value=""></td>

											<td width=" ">{{$i=$i+1}}</td>



												<td width="">{{ $reusuedi->title_arai }}</td>

<td width="">{{ $reusuedi->number_returnu }}</td>
<td width="">{{ $reusuedi->used_curr_no}}</td>
<td width="">{{ $reusuedi->name }}</td>
<td>{{ $reusuedi->returned_dateu}}</td>
<td>
{{  $all_stores_items-> value('ar_titlec')}}</td>
<td>{{ $reusuedi->priceu_one}}</td>
<td>{{ $reusuedi->used_price}}</td>
												<td width="">
													<!-- Basic modal -edit button--start-

													<a  data-target="#mo" data-toggle="modal" href="" class="btn btn-sm btn-info"><i style="padding:8px;" class="las la-pen"></i></a>
--->
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




 <!-- Basic modal -delete button--start--
  <a class="btn btn-sm btn-danger" data-target="#mod" data-toggle="modal" href=""><i  style="padding:8px;"class="las la-trash"></i></a>
				->	<!-- Basic modal -delete button--end--->
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



												<td width="">
													<!-- Basic modal -edit button--start--->

													<a  data-target="#mo{{$reusuedi->used_it_id }}" data-toggle="modal" href="{{$reusuedi->used_it_id }}" class="btn btn-sm btn-info">اضافة الى الكهنة</a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mo{{$reusuedi->used_it_id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<form class="form-horizontal"  method="POST" action="{{ route('corrupted_storage_item.returntocorrupt',$reusuedi->used_it_id) }}">

					@csrf
								@method('POST')


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:3px;width:100% ; ">
<div class="card-header">
								<h4 class="card-title mb-1">
								<p class="mb-2">عملية الاسترجاع</p>



                            </h4>
							</div>


                            <label>العناصر  (العهدة)</label>
<select class=" select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="st_reused_it" style="width:40%">

    <option disabled >--choose catogery from panel--</option>
    @if(!empty($reusuedi-> Item_id))

<option value="{{$reusuedi-> Item_id}}"
@if(!empty($reusuedi->item_store_idu))
@if ($reusuedi->item_store_idu  == $reusuedi-> Item_id) ? {{$reusuedi-> Item_id}} selected :''

@endif

@endif

>{{$reusuedi->title_arai}}</option>

@endif
</select>


                            <label>العدد المسترجع</label>
<input style ="margin:8px; padding:10px;" type="number" id= "input2b"class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_number" placeholder=" العدد تم استرجاعه"  value="{{ $reusuedi->number_returnu}}" min="0" required>
<br>
<label>تاريخ الاسترجاع</label>
<input style ="margin:8px; padding:8px;" type="date" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_date" placeholder="loan_date"  value="{{ $reusuedi->returned_dateu }}">


<label>حالة المسترجع</label>
<select  class="col-lg-4 mg-t-20 mg-lg-t-0 " id="mySelect" name="status_returned">
  <option value="corrupted" selected>تالف (كهنه)</option>

</select>
<label>السعر(القيمه التقديريه)</label>
<input input type="number" id="price" name="corr_price" min="0" step="0.01" placeholder="0.00"  value="{{$reusuedi->used_price }}">
<label>يتم الحساب من ضمن  قيمه السعريه للمخزن</label>
<select name=" still_exitc">
<option  value="1" selected>yes</option>
<option value="0">no</option>
</select>
<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-11 mg-t-20 mg-lg-t-0" id="inputName" name ="notices" placeholder="ملاحظات " col="10" rows="5">{{ $reusuedi->noticeisu}}</textarea>




                                    </div>

									<div class="form-group mb-0 mt-3 justify-content-end">

									</div>
								</div>
								<div class="modal-footer">
					<button>	<input type ="submit" class="btn ripple btn-primary"  value="return"></button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
					</form>
					</div>

				</div>
			</div>
		</div>
		<!-- End Basic modal - edit-alert end---->






</td>
<!-- Basic modal -return button to user--start--->
<td>
    <a  data-target="#mor{{$reusuedi-> used_it_id }}" data-toggle="modal" href="{{$reusuedi-> used_it_id}}" class="btn btn-sm btn-info">اضافة الى مستخدم اخر</a>

<!-- Basic modal -return alert--start--->
<div class="modal" id="mor{{ $reusuedi-> used_it_id}}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">returned data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">


<form class="form-horizontal"  method="POST" action=" {{ route('items_store_reused.return',$reusuedi-> used_it_id) }}"  enctype="multipart/form-data" style="width:100%">
								@csrf
								@method('POST')


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:2px">
									<div class="form-group col-lg- mg-t-20 mg-lg-t-0" style ="margin:2px">
<!-- col-4 -select start--->

<div class=" col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:3px;width:100% ; ">
<div class="card-header  col-lg-12 mg-t-20 mg-lg-t-0">
								<h4 class="card-title mb-1">
								<p class="mb-2">عملية الاسترجاع</p>



                            </h4>
							</div>



                            <label>العدد المسترجع</label>
<input style ="margin:8px; padding:10px;" type="number" id= "input2c"class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_numberu" placeholder=" العدد تم استرجاعه"  value="{{ $reusuedi->number_returnu}}" min="0" required>

<label>تاريخ الاسترجاع</label>
<input style ="margin:4px; padding:5px;" type="date" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_dater" placeholder="loan_date"  value="{{old('returned_date')  }}">
<br>
<label >نقل المنتج الى </label>
<select  class="col-lg-3 mg-t-20 mg-lg-t-0 " id="mySelect" name="status_returnedu" >


  <option value="add_to_user3">نقل الى مستفيد اخر (نقل عهدة)</option>
</select>


<label>اسم المستخدم (المنقول له العهدة)</label>
<select class="select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="user2_loanu3" id="myInput" >

    <option disabled  selected>--choose catogery from panel--</option>
    @if(!empty($users))
    @foreach ($users as $usersi)
<option value="{{$usersi->id}}"

>{{$usersi->name}}</option>
@endforeach
@endif
</select>
<div style="padding:5px;margin:10px;">
<label>حالة المسترجع عند نقل العهدة </label>
<select  class="col-lg-4 mg-t-20 mg-lg-t-0 " id="mySelect2" name="status_returned3">

<option value="used">مستعمل used</option>



</select>

</div>

<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-11 mg-t-20 mg-lg-t-0" id="inputName" name ="notices3" placeholder="ملاحظات " col="10" rows="5"></textarea>
</div>
									<!-- col-4 -select start--->


<!-- col-4 -select start--->







                                    </div>



<!-- col-4 select end-->






									<div class="form-group mb-0 mt-3 justify-content-end">

									</div>
								</div>
								<div class="modal-footer">
					<button>	<input type ="submit" class="btn ripple btn-primary"  value="return"></button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
					</form>
					</div>

				</div>
			</div>
		</div>
		<!-- End Basic modal - return -alert end---->








                                                  <!-- drop down menue1 start


<div class="dropdown" style="float:left">

<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
data-toggle="dropdown" id="dropdownMenuButton" type="button"> <i class="fas fa-caret-down ml-1"> </i></button>
<div  class="dropdown-menu tx-13">
    <a class="dropdown-item"  style="float:left ;direction:ltr;text-align:left;color:blue" href="">link 1</a>
    <a style="float:left;direction:ltr;text-align:left;color:blue;" class="dropdown-item " href="">link2</a>
    <a style="float:left;direction:ltr;text-align:left;color:blue;" class="dropdown-item " href="">link3</a>

</div>
</div>

</div>

<!-- drop down menue1 end--->


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
