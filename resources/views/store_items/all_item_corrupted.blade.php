
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
								<p class="mb-2">{{ "(كهنة)جدول التالف"}}</p>

<p class="btn ripple btn-primary">{{ "السعر التقديري:" . $sum_price}}</p>

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

                                                <th class="border-bottom-0"  width="1%"> {{ "العدد"}}&nbsp;</th>
                                                 <th class="border-bottom-0"  width="1%"> العدد الحالى&nbsp;</th>
 <th class="border-bottom-0"  width="1%">مسترجع من &nbsp;</th>
					<th>تاريخ الاسترجاع</th>
                    <th>القيمه التقديريه</th>
                    <th> مجموع على السعر التقديري </th>
 <th class="border-bottom-0" width=" auto" colspan="2" >action</th>

<th></th>
<th>more</th>


										</thead>

										<tbody>
                                            @if(!empty($all_stores_corrupted))
                                        @foreach ($all_stores_corrupted as $poor_items)

											<tr>

                                            <td width="1%"><input type="checkbox" class="table-checkbox" name="itemselected[]" value=""></td>

											<td width=" ">{{$i=$i+1}}</td>



												<td width="">{{  $poor_items->title_arai}}</td>
<td>{{  $poor_items->number_returnc}}</td>
<td>{{  $poor_items->curr_no_corrupted}}</td>
<td>{{  $poor_items->name}}</td>
<td>{{  $poor_items->returned_datec}}</td>
<td>{{  $poor_items->corr_price}}</td>

<td>

@if($poor_items->still_exits==1)
{{ "yes" }}
@endif
@if($poor_items->still_exits!=1)
<span style="color:red">{{ "no" }}</span>
@endif
</td>
<td></td>

												<td width="">
													<!-- Basic modal -edit button--start--->

													<a  data-target="#mo{{$poor_items->corr_id  }}" data-toggle="modal" href="{{$poor_items->corr_id }}" class="btn btn-sm btn-info"><i style="padding:8px;" class="las la-pen"></i></a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mo{{$poor_items->corr_id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<form class="form-horizontal"  method="POST" action="{{  route('corrupted_storage_item.edit',$poor_items->corr_id)}}">

					@csrf
								@method('POST')


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:3px;width:100% ; ">
<div class="card-header">
								<h4 class="card-title mb-1">
								<p class="mb-2">عملية الاسترجاع</p>



                            </h4>
							</div>


                            <label>العناصر  (العهدة)</label>
<select class=" select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="store_poor_items" style="width:40%">

    <option disabled >--choose catogery from panel--</option>
    @if(!empty($all_stores_items))
    @foreach ($all_stores_items as $store_items)
<option value="{{$store_items-> id}}"
@if(!empty($poor_items->item_store_idc))
@if ($poor_items->item_store_idc  == $store_items->id) ? {{$store_items-> id}} selected :''

@endif

@endif

>{{$store_items->title_arai}}</option>
@endforeach
@endif
</select>


                            <label>العدد المسترجع</label>
<input style ="margin:8px; padding:10px;" type="number" id= "input2b"class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_number" placeholder=" العدد تم استرجاعه"  value="{{ $poor_items->number_returnc}}" min="0" required>
<br>
<label>تاريخ الاسترجاع</label>
<input style ="margin:8px; padding:8px;" type="date" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_date" placeholder="loan_date"  value="{{ $poor_items->returned_datec }}">

<label>السعر(القيمه التقديريه)</label>
<input input type="number" id="price" name="price_corrupted" min="0" step="0.01" placeholder="0.00"  value="{{ $poor_items->corr_price }}">
<label>يتم الحساب من ضمن  قيمه السعريه للمخزن</label>
<select name=" still_exits_c">
<option  value="1" selected>yes</option>
<option value="0">no</option>
</select>


<br>

<label>حالة المسترجع</label>
<select  class="col-lg-4 mg-t-20 mg-lg-t-0 " id="mySelect" name="status_returned">
  <option value="poor_storage" selected>تالف (كهنه)</option>

</select>

<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-11 mg-t-20 mg-lg-t-0" id="inputName" name ="notices" placeholder="ملاحظات " col="10" rows="5">{{ $poor_items->noticeisc}}</textarea>




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
  <a class="btn btn-sm btn-danger" data-target="#mod{{$poor_items->corr_id  }}" data-toggle="modal" href="{{$poor_items->corr_id  }}"><i  style="padding:8px;"class="las la-trash"></i></a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod{{$poor_items->corr_id}}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
                        كل عددالعناصر المحذوفه سيتم ردها الى العدد بالمخزن
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

													<a  data-target="#mou{{$poor_items->corr_id }}" data-toggle="modal" href="{{$poor_items->corr_id }}" class="btn btn-sm btn-info">استرجاع الى المستعمل</a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mou{{$poor_items->corr_id}}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">استرجاع الى جدول المستعمل</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<form class="form-horizontal"  method="POST" action="{{ route('corrupted_storage_item.returntoused',$poor_items->corr_id)}}">

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
    @if(!empty($poor_items->corr_id))

<option value="{{$poor_items->corr_id}}"


> {{  $poor_items->title_arai}}</option>

@endif
</select>



<label style ="margin:2px; padding:3px;" >العدد المسترجع</label>


 <input  style ="width:120px;"  onchange="calculateSum" type="number" class="col-lg-5 mg-t-20 mg-lg-t-0" id="num2" name ="returned_numberc" placeholder=" العدد الكلى بالقطعه" value=" {{$poor_items->curr_no_corrupted}}" min="1" required>

<!-- col-4 -select start--->


<label style ="margin:2px; padding:3px;">السعرالتقديري للقطعه</label>
<input input type="number"  onchange="calculateSum" id="num1" name="corr_price" min="0" step="0.01" placeholder="0.00"  value="{{ old('new_price') }}" style ="width:120px;">

<label style ="margin:2px; padding:3px;">السعر الاجمالى للقطع</label>


    <input  id="result" readonly style ="width:120px;">
<!--- حساب السعر الاجمالى للعدد المنتج المضاف
--strat--->
<script>
    // Get references
    const num1 = document.getElementById('num1');
    const num2 = document.getElementById('num2');
    const sumField = document.getElementById('result');

    // Function to calculate and display the sum
    function calculateSum() {
      const value1 = parseFloat(num1.value) || 0;
      const value2 = parseFloat(num2.value) || 0;
      const sum = value1 * value2;

      sumField.value = sum ;
    }

    // Use 'input' event for live updates
    num1.addEventListener('input', calculateSum);
    num2.addEventListener('input', calculateSum);
  </script>


<!--- حساب السعر الاجمالى للعدد المنتج المضاف
-end-->



<label style ="margin:10px; padding:8px;">يتم الحساب من ضمن  قيمه السعريه للمخزن</label>
<select name=" still_exitc">
<option  value="1" selected>yes</option>
<option value="0">no</option>
</select>




<!---////  حساب السعر لنقل العهدة المستعملend------>


<!-- col-4 -select start--->


<label>اسم المستخدم (طالب العهدة)</label>
<select class=" select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="users_loan">

    <option disabled  selected>--choose catogery from panel--</option>
    @if(!empty($users))
    @foreach ($users as $usersi)
<option value="{{$usersi->id}}"


>{{$usersi->name}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->



<!-- col-4 -select start--->

<label>اسماء طلاب العهدة المشتركةاوالتضامنية </label>
<select class=" select2 col-lg-8 mg-t-20 mg-lg-t-0 " name="users_name[]"  multiple="multiple">

    <option disabled  selected>--choose catogery from panel--</option>
    @if(!empty($users))
    @foreach ($users as $usersi)
<option value="{{$usersi->name}}"


>{{$usersi->name}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->


<br>
<label>الادارة</label>
<input style ="margin:10px; padding:10px;" type="" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="department" placeholder="اسم الادارة " value="{{ old('department') }}">




<br>
<label>تاريخ الاسترجاع</label>
<input style ="margin:8px; padding:8px;" type="date" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_date" placeholder="loan_date"  value="{{ $poor_items->returned_datec }}">


<label>حالة المسترجع</label>
<select  class="col-lg-4 mg-t-20 mg-lg-t-0 " id="mySelect" name="status_returned">
  <option value="corrupted" selected>تالف (كهنه)</option>
<option value="used" selected>مستعمل</option>
</select>

<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-11 mg-t-20 mg-lg-t-0" id="inputName" name ="notices" placeholder="ملاحظات " col="10" rows="5">{{ $poor_items->noticeisc}}</textarea>




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
		<!-- End return to used items modal - edit-alert end---->





	<!-- Basic modal -return button--start--->
</td>

                                                                                              <!-- Basic modal -return button to user--start--->
<td>
    <a  data-target="#more{{$poor_items->corr_id }}" data-toggle="modal" href="{{$poor_items->corr_id}}" class="btn btn-sm btn-info">اضافة الى مستخدم اخر</a>

<!-- Basic modal -return alert--start--->
<div class="modal" id="more{{$poor_items->corr_id}}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">returned data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">


<form class="form-horizontal"  method="POST" action=" {{ route('corrupted_storage_item.returntouser',$poor_items->corr_id) }}"  enctype="multipart/form-data" style="width:100%">
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




<label>تاريخ الاسترجاع</label>
<input style ="margin:4px; padding:5px;" type="date" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_dater" placeholder="loan_date"  value="{{old('returned_date')  }}">
<br>

   <label>العدد المسترجع</label>
<input  style ="width:120px;"  onchange="calculateSuma" type="number" class="col-lg-5 mg-t-20 mg-lg-t-0" id="numa2" name ="returned_numberc" placeholder=" العدد الكلى بالقطعه" value=" {{$poor_items->curr_no_corrupted}}" min="1" required>

<label style ="margin:2px; padding:3px;">السعرالتقديري للقطعه</label>
<input input type="number"  onchange="calculateSuma" id="numa1" name="corr_price" min="0" step="0.01" placeholder="0.00"  value="{{ old('new_price') }}" style ="width:120px;">

<label style ="margin:2px; padding:3px;">السعر الاجمالى للقطع</label>


    <input  id="resulta" readonly style ="width:120px;">
<!--- حساب السعر الاجمالى للعدد المنتج المضاف
--strat--->
<script>
    // Get references
    const numa1 = document.getElementById('numa1');
    const numa2 = document.getElementById('numa2');
    const sumFielda = document.getElementById('resulta');

    // Function to calculate and display the sum
    function calculateSuma() {
      const value1 = parseFloat(numa1.value) || 0;
      const value2 = parseFloat(numa2.value) || 0;
      const suma = value1 * value2;

      sumFielda.value = suma ;
    }

    // Use 'input' event for live updates
    numa1.addEventListener('input', calculateSuma);
    numa2.addEventListener('input', calculateSuma);
  </script>


<!--- حساب السعر الاجمالى للعدد المنتج المضاف
-end-->



<label style ="margin:10px; padding:8px;">يتم الحساب من ضمن  قيمه السعريه للمخزن</label>
<select name=" still_exitc">
<option  value="1" selected>yes</option>
<option value="0">no</option>
</select>




<!---////  حساب السعر لنقل العهدة المستعملend------>


<!-- col-4 -select start--->


<label>اسم المستخدم (طالب العهدة)</label>
<select class=" select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="users_loanc">

    <option disabled  selected>--choose catogery from panel--</option>
    @if(!empty($users))
    @foreach ($users as $usersi)
<option value="{{$usersi->id}}"


>{{$usersi->name}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->



<!-- col-4 -select start--->

<label>اسماء طلاب العهدة المشتركةاوالتضامنية </label>
<select class=" select2 col-lg-8 mg-t-20 mg-lg-t-0 " name="users_namec[]"  multiple="multiple">

    <option disabled  selected>--choose catogery from panel--</option>
    @if(!empty($users))
    @foreach ($users as $usersi)
<option value="{{$usersi->name}}"


>{{$usersi->name}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->


<br>
<label>الادارة</label>
<input style ="margin:10px; padding:10px;" type="" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="department" placeholder="اسم الادارة " value="{{ old('department') }}">




<br>
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
					<button>	<input type ="submit" class="btn ripple btn-primary"  value="move to user"></button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
					</form>
					</div>

				</div>
			</div>
		</div>
		<!-- End Basic modal - return -alert end---->
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
