
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
				<div class="row row-sm">

					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body p-2">
								<div class="input-group">

                                    <form  action="{{ route('store_items.search') }}" method="POST" class=" col-lg-12 col-md-12">
                                        @csrf
                                        @method ('POST')

									<input type="text"  class=" col-lg-4" placeholder="Search ..." name="query">


                                    <span class="btn btn-primary-gradient mt-2 mb-2 pb-2" style="height: 40px;" >
<input type="submit" class=" btn btn-primary-gradient mt-2 mb-2 pb-2"   value=" "  style="height: 20px;" >
<i class="fa fa-search " aria-hidden="true"></i>
</span>



                            </form>
                   <form  action="{{ route('store_items.filter2') }}" method="POST">
                            @csrf
                            @method ('POST')





									<label>اسم صاحب العهدة الحالى</label>
											<select name="users_info" id="select-beast2" class=" col-lg-3  nice-select  select2" >
										<option value="0" disable>--Select--</option>
                                        @if(!empty($users))
										@foreach(  $users as $user)
										<option value="{{  $user->id}}">{{ $user->name }}</option>
										@endforeach
                                        @endif
									</select>

 <label>اسم فى العهدة التضامنيه</label>
										<input type="text" class=" col-lg-3" id="inputName"   placeholder="Search ..." name="query2" value="{{old('query2')}}">



         <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>


 <button class="btn btn-primary-gradient mt-2 mb-2 pb-2"  name="exportusers" value="1">export to excel</button>



						</div>

</form>


                            </div>
                            <div class="card">
							<div class="card-body p-2">
								<div class="input-group">


<!---//// user loan start--- items-///////////////////////////////////////--->





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

                                                <th class="border-bottom-0"  width="1%">  اسم صاحب العهدة &nbsp;</th>
                                                <th class="border-bottom-0"  width="1%">  اصحاب عهدة التضامنية&nbsp;</th>

                                                <th class="border-bottom-0"  width="1%"> الادارة  &nbsp;</th>
                                                <th>نوع العهدة</th>
                                               <th>الكميه المستعارة الاصليه </th>
                                                <th>الكميه المستعارة الحالى</th>
												<th class="border-bottom-0" width=" auto" colspan="2" >action</th>

<th></th>
<th>more</th>
<th>صاحب العهده المنقول له</th>
<th>صاحب العهدة المنقوله منه </th>
<th>العدد المنقول</th>

										</thead>

										<tbody>
@if(!empty($users_loan))
@foreach($users_loan as $ur_item)

											<tr>

                                            <td width="1%"><input type="checkbox" class="table-checkbox" name="itemselected[]" value=""></td>

											<td width=" ">{{$i=$i+1}}</td>



												<td width="">{{$ur_item->title_arai }}</td>
<td>{{  $ur_item->name}}</td>
<td>{{  $ur_item->parteners}}</td>
<td>{{  $ur_item->departmentis}}</td>
<td>{{  $ur_item->ar_titles2}}</td>
<td>{{  $ur_item->number_itemsi}}</td>

<td>{{  $ur_item->number_currentis}}</td>


												<td width="">
													<!-- Basic modal -edit button--start--->

													<a  data-target="#mo{{$ur_item->loanid }}" data-toggle="modal" href="{{$ur_item->loanid}}" class="btn btn-sm btn-info"><i style="padding:8px;" class="las la-pen"></i></a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mo{{ $ur_item->loanid }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">


<form class="form-horizontal"  method="POST" action=" {{route('items_users_store.edit',$ur_item->loanid)  }}"  enctype="multipart/form-data" style="width:100%">
								@csrf
								@method('POST')


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:2px">
									<div class="form-group col-lg- mg-t-20 mg-lg-t-0" style ="margin:2px">
<!-- col-4 -select start--->

<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:3px;width:100% ; ">
<div class="card-header">
								<h3 class="card-title mb-1">
								<h4 class="card-title mb-1">
								<p class="mb-2">عملية الاستعاره</p>
                                @if(!empty($sum))
                                @php $d=$single_item->value('title_arai');
@endphp
<span style="color:red;"> {{  "ما تم استعارته  حتى الان" }}&nbsp;{{ "المستعار:" }}&nbsp; {{ $sum['item_loaned'] }} &nbsp;{{ "الكهنة:" }}&nbsp; {{  $sum['corrupt_item']}}
&nbsp;{{ "المستعمل وصالح للاستخدام:" }}&nbsp; {{  $sum['used_items4']}} </span>
<br>
@if($single_item->value('current_qauntaty') <= 0)
 <span style="color:red;">{{ $d }}  &nbsp;{{ ":" }}&nbsp; {{  "غير متوافر بالمخزن" }}</span>
@endif

@if($single_item->value('current_qauntaty') == 1)

 <span style="color:red;">{{$d}} &nbsp;{{":" }}&nbsp;{{ " بالمخزن تبقى عنصر 1 فقط" }}</span>
@endif

@if($single_item->value('current_qauntaty') ==2)
 <span style="color:red;">{{ $d }} &nbsp;{{ ":" }}&nbsp;{{ " بالمخزن تبقى 2  عنصر فقط" }}</span>
@endif

@if($single_item->value('current_qauntaty') >2)
 <span style="color:red;">{{ $d }} &nbsp;{{ "العدد المتبقى" }}&nbsp;{{ $single_item->value('current_qauntaty') }}</span>
@endif
</h4>
							</div>
@endif
                            <label>العناصر  (العهدة)</label>
<select class=" select2 col-lg-6 mg-t-20 mg-lg-t-0 " name="store_items" style="width:30%">

    <option disabled >--choose catogery from panel--</option>
    @if(!empty($all_stores_items))
    @foreach ($all_stores_items as $store_items)
<option value="{{$store_items-> storeitid}}"
@if(!empty($ur_item->item_store_id))
@if ($ur_item->litem_store_id ==$store_items->storeitid) ? {{$store_items-> storeitid}} selected :''

@endif

@endif

>{{$store_items->title_arai}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->


<label>اسم المستخدم (طالب العهدة)</label>
<select class=" select2 col-lg-6 mg-t-20 mg-lg-t-0 " name="users_loan" style="width:30%">

    <option disabled  selected>--choose catogery from panel--</option>
    @if(!empty($users))
    @foreach ($users as $usersi)
<option value="{{$usersi->id}}"
@if(!empty($ur_item->userloan_id))
@if ($ur_item->userloan_id == $usersi->id) ? {{ $usersi->id}} selected :''

@endif

@endif

>




{{$usersi->name}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->

<label>العدد المطلوب </label>
<input style ="margin:10px; padding:10px;" type="number" id ="input1c" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="items_number" placeholder="العدد المطلوب"  value="{{ $ur_item->number_itemsi }}" min="0" required>

<input style ="margin:10px; padding:10px;" type="" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="department" placeholder="اسم الادارة " value="{{ $ur_item->departmentis }}">
<label>تاريخ الاستلام</label>
<input style ="margin:10px; padding:10px;" type="date" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="recieved_date" placeholder="loan_date"  value="{{  $ur_item->loan_date }}">
</div>
<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" style ="margin:2px">
<!-- col-4 -select start--->







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





	<!-- Basic modal -return button--start--->
</td>
<td>
    <a  data-target="#mor{{$ur_item->loanid }}" data-toggle="modal" href="{{$ur_item->loanid}}" class="btn btn-sm btn-info">استرجاع العهدة</a>

<!-- Basic modal -return alert--start--->
<div class="modal" id="mor{{ $ur_item->loanid }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">returned data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">


<form class="form-horizontal"  method="POST" action=" {{route('items_users_store.return',$ur_item->loanid)  }}"  enctype="multipart/form-data" style="width:100%">
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
<input style ="margin:8px; padding:10px;" type="number" id= "input2c"class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_number" placeholder=" العدد تم استرجاعه"  value="{{ $ur_item->number_returnedis}}" min="0" required>

<label>تاريخ الاسترجاع</label>
<input style ="margin:4px; padding:5px;" type="date" class=" col-lg-3 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_date" placeholder="loan_date"  value="{{ $ur_item->returned_date }}">
<br>
<label >حالة المسترجع</label>
<select  class="col-lg-3 mg-t-20 mg-lg-t-0 " id="mySelect" name="status_returned" >
  <option value="corrupt" selected>تالف (كهنه)</option>
  <option value="usedf">مستعمل</option>
  <option value="add_to_user2">نقل الى مستفيد اخر (نقل عهدة)</option>
</select>


<label>اسم المستخدم (المنقول له العهدة)</label>
<select class="select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="user2_loan" id="myInput" >

    <option disabled  selected>--choose catogery from panel--</option>
    @if(!empty($users))
    @foreach ($users as $usersi)
<option value="{{$usersi->id}}"
@if(!empty($ur_item->user2_loan_id))
@if ($ur_item->user2_loan_id == $usersi->id) ? {{ $usersi->id}} selected :''

@endif

@endif

>{{$usersi->name}}</option>
@endforeach
@endif
</select>
<div style="padding:5px;margin:10px;">
<label>حالة المسترجع عند نقل العهدة </label>
<select  class="col-lg-4 mg-t-20 mg-lg-t-0 " id="mySelect2" name="status_returned2">

@if(!empty($ur_item->status_to_user2))
@if ($ur_item->status_to_user2 == "new")
<option value="new" selected> new جديد</option>
<option value="used">مستعمل used</option>
@endif

@endif


  @if(!empty($ur_item->status_to_user2))
@if ($ur_item->status_to_user2 == "used")
<option value="new" > new جديد</option>
<option value="used" selected>مستعمل used</option>
@endif

@endif
@if(empty($ur_item->status_to_user2))
<option value="new" selected> new جديد</option>
<option value="used" selected>مستعمل used</option>
@endif
</select>

</div>
<!--
<label style="color:red">العدد الحالى الذي لم يتم استرجاعه للعهدة    <input type="number" value="0"  style="color:red" id="resultc" name="number_current" > </label>
 to enable items when choose option script start
<script >

document.getElementById("mySelect").addEventListener("change", function() {
  var selectValue = this.value;
  var inputField = document.getElementById("myInput");
  var inputField2 = document.getElementById("mySelect2");
  inputField.disabled = true;
  inputField2.disabled = true;
  if (selectValue == "3d") {
    inputField.disabled = false; // Enable the input
    inputField2.disabled = false; // Enable the input
  } else {
    inputField.disabled = true; // Disable the input
  }
});



</script>

<!-- to enable items when choose option script end
<script >
// Get references to the input fields
let input1c = document.getElementById('input1');
let input2c = document.getElementById('input2');
let resultc = document.getElementById('result');

// Add event listeners to both input fields to listen for changes
input1.addEventListener('input', updateSum);
input2.addEventListener('input', updateSum);

// Function to update the sum in the result field
function updateSum() {
  let num1 = parseFloat(input1.value) || 0; // Default to 0 if input is empty
 let num2 = parseFloat(input2.value) || 0; // Default to 0 if input is empty
 if (num2 > num1) {
    input2.setCustomValidity("Input 2 must not be greater than Input 1");
    input2.reportValidity();  // Show validation message
  } else {
    input2.setCustomValidity("");  // Clear the validation message
  }



 let sum = num1 - num2; // Calculate the sum
  result.value = sum; // Display the sum in the result field
  result.innerHTML = sum;
}





</script>

--->
<!-- to enable items when choose option script end-->
<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-11 mg-t-20 mg-lg-t-0" id="inputName" name ="notices" placeholder="ملاحظات " col="10" rows="5"></textarea>
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


<td>

 <!-- Basic modal -delete button--start--->
  <a class="btn btn-sm btn-danger" data-target="#mod2{{ $ur_item->loanid }}" data-toggle="modal" href="{{$ur_item->loanid}}"><i  style="padding:8px;"class="las la-trash"></i></a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod2{{ $ur_item->loanid }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">


                        <p>العناصر التى تم طلبها سيتم استعادتها بالعدد الموجود بالمخزن</p>
                        <p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href="{{ route('items_users_store.destroy',$ur_item->loanid ) }}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->

</div>


												 </td>


													<!-- Basic modal -info button--start--->
<td>
													<a  data-target="#moi{{$ur_item->id  }}" data-toggle="modal" href="{{ $ur_item->id }}" class="btn ripple btn-primary">more details</a>

<!-- Basic modal -info alert--start--->
<div class="modal" id="moi{{$ur_item->id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">show details information</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">


                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px">
									<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" style ="margin:10px">
									<!-- col-4 -select start--->
<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px;padding:8 px;">


<!--cover image--& file uploaded start-->
<div class="form-group col-lg-4 mg-t-20 mg-lg-t-0"  style ="margin:10px;padding:8 px ;float:left;direction:ltr">



</div></div>
<!--cover image--& file uploaded start-->


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:3px;width:100% ; ">
<div class="card-header">
								<h3 class="card-title mb-1">
								<h4 class="card-title mb-1">
								<p class="mb-2">عملية الاستعاره</p>
                                @if(!empty($single_item))
                                @php $d=$single_item->value('title_arai');
@endphp

@if($single_item->value('current_qauntaty') <= 0)
 <span style="color:red;">{{ $d }}  &nbsp;{{ ":" }}&nbsp; {{  "غير متوافر بالمخزن" }}</span>
@endif

@if($single_item->value('current_qauntaty') == 1)

 <span style="color:red;">{{$d}} &nbsp;{{":" }}&nbsp;{{ " بالمخزن تبقى عنصر 1 فقط" }}</span>
@endif

@if($single_item->value('current_qauntaty') ==2)
 <span style="color:red;">{{ $d }} &nbsp;{{ ":" }}&nbsp;{{ " بالمخزن تبقى 2  عنصر فقط" }}</span>
@endif

@if($single_item->value('current_qauntaty') >2)
 <span style="color:red;">{{ $d }} &nbsp;{{ "العدد المتبقى" }}&nbsp;{{ $single_item->value('current_qauntaty') }}</span>
@endif
</h4>

						</div>

                            <label>العناصر  (العهدة)</label>
<select class=" select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="store_items">

    <option disabled >--choose catogery from panel--</option>
    @if(!empty($all_stores_items))
    @foreach ($all_stores_items as $store_items)
<option value="{{$store_items-> storeitid}}"
@if(!empty($single_item->value('id')))
@if ($single_item->value('id') ==$store_items->storeitid) ? {{$store_items-> storeitid}} selected :''

@endif

@endif

>{{$store_items->title_arai}}</option>
@endforeach
@endif
</select>


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
@endif
<label>العدد المطلوب </label>
<input style ="margin:10px; padding:10px;" type="number" id ="input1b" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="items_number" placeholder="العدد المطلوب"  value="1" min="0" required>

<input style ="margin:10px; padding:10px;" type="" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="department" placeholder="اسم الادارة " value="{{ old('department') }}">
<label>تاريخ الاستلام</label>
<input style ="margin:10px; padding:10px;" type="date" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="recieved_date" placeholder="loan_date"  value="{{ old('recieved_date') }}">
</div>
<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" style ="margin:2px">
<!-- col-4 -select start--->

<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:3px;width:85% ; ">
<div class="card-header">
								<h4 class="card-title mb-1">
								<p class="mb-2">عملية الاسترجاع</p>



                            </h4>
							</div>



                            <label>العدد المسترجع</label>
<input style ="margin:8px; padding:10px;" type="number" id= "input2b"class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_number" placeholder=" العدد تم استرجاعه"  value="0" min="0" required>

<label>تاريخ الاسترجاع</label>
<input style ="margin:8px; padding:8px;" type="date" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="returned_date" placeholder="loan_date"  value="{{ old('returned_date') }}">

<label>حالة المسترجع</label>
<select  class="col-lg-4 mg-t-20 mg-lg-t-0 " id="mySelect" name="status_returned">
  <option value="1d" selected>تالف (كهنه)</option>
  <option value="2d">مستعمل</option>
  <option value="3d">نقل الى مستفيد اخر (نقل عهدة)</option>
</select>


<label>اسم المستخدم (المنقول له العهدة)</label>
<select class="select2 col-lg-4 mg-t-20 mg-lg-t-0 " name="user2_loan" id="myInput" disabled>

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
<select  class="col-lg-4 mg-t-20 mg-lg-t-0 " id="mySelect2" name="status_returned2" disabled>
  <option value="new" >جديد</option>
  <option value="used" selected>مستعمل used</option>

</select>

</div>
<!-- to enable items when choose option script start
<label style="color:red">العدد الحالى الذي لم يتم استرجاعه للعهدة    <input type="number" value="0"  style="color:red" id="resultb" name="number_current" > </label>

<script >

document.getElementById("mySelect").addEventListener("change", function() {
  var selectValue = this.value;
  var inputField = document.getElementById("myInput");
  var inputField2 = document.getElementById("mySelect2");
  inputField.disabled = true;
  inputField2.disabled = true;
  if (selectValue == "3d") {
    inputField.disabled = false; // Enable the input
    inputField2.disabled = false; // Enable the input
  } else {
    inputField.disabled = true; // Disable the input
  }
});



</script>

<!-- to enable items when choose option script start
<script >
// Get references to the input fields
let input1a = document.getElementById('input1');
let input2b = document.getElementById('input2');
let resultb = document.getElementById('result');

// Add event listeners to both input fields to listen for changes
input1.addEventListener('input', updateSum);
input2.addEventListener('input', updateSum);

// Function to update the sum in the result field
function updateSum() {
  let num1 = parseFloat(input1.value) || 0; // Default to 0 if input is empty
 let num2 = parseFloat(input2.value) || 0; // Default to 0 if input is empty
 if (num2 > num1) {
    input2.setCustomValidity("Input 2 must not be greater than Input 1");
    input2.reportValidity();  // Show validation message
  } else {
    input2.setCustomValidity("");  // Clear the validation message
  }



 let sum = num1 - num2; // Calculate the sum
  result.value = sum; // Display the sum in the result field
  result.innerHTML = sum;
}





</script>


 to enable items when choose option script end-->
<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-11 mg-t-20 mg-lg-t-0" id="inputName" name ="notices" placeholder="ملاحظات " col="10" rows="5"></textarea>
</div>
									<!-- col-4 -select start--->


<!-- col-4 -select start--->







                                    </div>



<!-- col-4 select end-->




                                    </div>



</td>
    <!-- End Basic modal-info-alert end---->
<td>
    @foreach($users as $ur)
@if(!empty($ur_item->user2_loan_id))

@if($ur->id == $ur_item->user2_loan_id )
{{ $ur->name }}

@endif
@endif
@endforeach
</td>
<td>
    @foreach($users as $ur)
@if(!empty($ur_item->item_owner))

@if($ur->id == $ur_item->item_owner )
{{ $ur->name }}

@endif
@endif
@endforeach
</td>
<td>{{  $ur_item->owner_itm_no}}</td>




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








<!----/////////////////////////////////////-user loan items end--/////------>
<!----/////////////////////////////////////-user loan items end--/////------>
<!----/////////////////////////////////////-user loan items end--/////------>






								</div>
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
        	</div>
            	</div>	</div>	</div>
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
