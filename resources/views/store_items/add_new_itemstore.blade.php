
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
								<p class="mb-2">{{trans('transfile.stores_system')}}</p>

اضافة عنصر جديد

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


<form class="form-horizontal"  method="POST" action=" {{route('items_store.store')  }}"  enctype="multipart/form-data">
								@csrf
								@method('POST')


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:2px">
									<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0" style ="margin:2px">
<!-- col-4 -select start--->

<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:3px;width:85% ; ">
<div class="card-header">
								<h4 class="card-title mb-1">
								<p class="mb-2">عملية الشراء</p>



                            </h4>
							</div>
<label>الشركه المورده</label>
<input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="seller" placeholder="اسم المورد " value="{{ old('seller') }}">
<input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="request_owner" placeholder="اسم طالب المنتج"  value="{{ old('request_owner') }}">
<input style ="margin-right:80px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="title_ara" placeholder="اسم المنتج" value="{{ old('title_ara')}}">


										<input style ="margin:20px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="title_eng" placeholder="english title"  value="{{ old('title_eng')}}">

<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-11 mg-t-20 mg-lg-t-0" id="inputName" name ="purpose" placeholder="الهدف من الطلب" col="10" rows="5">{{ old('purpose')}}</textarea>

<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:55px; ">
                                        <label>cover image</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="cover_impatha" placeholder="cover image" value="">

                                        <label>file upload</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="pdfa" placeholder="" value="">

                                    </div></div>
									<!-- col-4 -select start--->

</div>

<!-- col-4 -select start--->


                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="location" placeholder="مكان التخزين " value="{{ old('location')}}">


                                        <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style="margin:10px ;border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:55px; ">
            <div class="card-header">
								<h3 class="card-title mb-1">
								<p class="mb-2">التصنيف</p>



                            </h3>
							</div>
                                    <label>اكواد المعرفه للعناصر</label>
<select class=" select2 col-lg-3 mg-t-20 mg-lg-t-0 " name="items1_number2">

    <option disabled >--choose code from panel--</option>
    @if(!empty($code_list_items))
    @foreach ($code_list_items as $code)
<option value="{{$code->id}}"

>{{$code->serial_numcla}} -{{$code->ar_titlecla}} -{{  $code->id}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->

                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="barcode_number" placeholder="رقم  السيريال"  value="{{ old('item_number')}}">
<br>
<div style ="border:lightgray solid 1px;width:90%,padding :20px;">
<label style ="margin:2px; padding:3px;" style ="">العدد</label>
 <input  style ="width:120px;"  onchange="calculateSum" type="number" class="col-lg-5 mg-t-20 mg-lg-t-0" id="num2" name ="quantity" placeholder=" العدد الكلى بالقطعه" value="{{ old('quantity') }}" min="1" required>

<!-- col-4 -select start--->


<label style ="margin:2px; padding:3px;">السعر للقطعه</label>
<input input type="number"  onchange="calculateSum" id="num1" name="new_price" min="0" step="0.01" placeholder="0.00"  value="{{ old('new_price') }}" style ="width:120px;">

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
<select name=" still_exitsn">
<option  value="1" selected>yes</option>
<option value="0">no</option>
</select>
		</div>								<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-9 mg-t-20 mg-lg-t-0" id="inputName" name ="notice" placeholder="ملاحظات" col="10" rows="5">{{ old('notice')}}</textarea>



                                        </div> </div>
            <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style="margin:10px ;border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:55px; ">
            <div class="card-header">
								<h3 class="card-title mb-1">
								<p class="mb-2">التصنيف</p>



                            </h3>
							</div>
                                    <label>التصنيف (اجهزة-اوراق-ادوات كتابية..)</label>
<select class=" select2 col-lg-3 mg-t-20 mg-lg-t-0 " name="catogery_idi">

    <option disabled >--choose catogery from panel--</option>
    @if(!empty($ItemsCatogery))
    @foreach ($ItemsCatogery as $catgory)
<option value="{{$catgory->id}}"
@if(!empty($Catogery_title))
@if ($Catogery_title == $catgory->id) ? {{$catgory->id}} selected :''

@endif

@endif

>{{$catgory->ar_titlec}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->





                                        <label  style ="margin:4px; padding:2px;"> (جديد- مستعمل)الحاله</label>
                                        <select class=" select2 col-lg-3 mg-t-20 mg-lg-t-0 " name="status_idi">

<option disabled >--choose status from panel--</option>
@if(!empty($status_items))
    @foreach ($status_items as $status)
<option value="{{$status->id}}"
>{{$status->ar_titles}}</option>
@endforeach
@endif

</select>


<div style ="margin:10px; padding:20px;">

<!-- col-4 -select start--->


<label  style ="margin:4px; padding:4px;">نوع الحاله (دائم -مستهلك)</label>
                                        <select class=" select2 col-lg-3 mg-t-20 mg-lg-t-0 " name="status_idi2" style ="margin:4px; padding:20px;">

<option disabled >--choose status from panel--</option>
@if(!empty($status_items2))
    @foreach ($status_items2 as $status2)
<option value="{{$status2->id}}"
>{{$status2->ar_titles2}}</option>
@endforeach
@endif

</select>



<label style ="margin:10px; padding:3px;"> تاريخ الاضافه <input  style ="margin:10px; padding:3px;width:200px;" type="date" class="col-lg-6 mg-t-20 mg-lg-t-0 " id="inputPassword3" name ="add_date" placeholder=""value="">
</label>




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
  <th>التصنيف</th>
                                                <th class="border-bottom-0"  width="1%">  العدد الكلى &nbsp;</th>

                                                <th class="border-bottom-0"  width="1%">   الكميه الحالية&nbsp;</th>
<th class="border-bottom-0"  width="1%">  سعر القطعه &nbsp;</th>
												<th class="border-bottom-0" width=" auto" colspan="2" >action</th>
                                                <th></th><th></th>

<th>more</th>


										</thead>

										<tbody>
@if(!empty($all_stores_items))
@foreach($all_stores_items as $store_item)

											<tr>

                                            <td width="1%"><input type="checkbox" class="table-checkbox" name="itemselected[]" value=""></td>

											<td width=" ">{{$i=$i+1}}</td>



												<td width="">{{$store_item->title_arai }}</td>
<td>{{  $store_item->ar_titlec}}</td>
<td>{{  $store_item->qauntatyi}}</td>
<td>{{  $store_item->current_qauntaty}}</td>
<td>{{  $store_item->new_price}}</td>
												<td width="">
													<!-- Basic modal -edit button--start--->

													<a  data-target="#mo{{ $store_item->storeitid }}" data-toggle="modal" href="{{$store_item->storeitid}}" class="btn btn-sm btn-info"><i style="padding:8px;" class="las la-pen"></i></a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mo{{ $store_item->storeitid }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">


<form class="form-horizontal"  method="POST" action=" {{route('store_items.edit',$store_item->storeitid)  }}"  enctype="multipart/form-data">
								@csrf
								@method('POST')


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:2px">
									<div class="form-group col-lg- mg-t-20 mg-lg-t-0" style ="margin:2px">
<!-- col-4 -select start--->

<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:3px;width:100% ; ">
<div class="card-header">
								<h3 class="card-title mb-1">
								<p class="mb-2">عملية الشراء</p>



                            </h3>
							</div>
<label>الشركه المورده</label>
<input style ="margin:10px; padding:8px;" type="text" class="col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="seller" placeholder="اسم المورد " value="{{ $store_item->seller_infoi }}">
<input style ="margin:10px; padding:8px;" type="text" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="request_owner" placeholder="اسم طالب المنتج"  value="{{ $store_item->request_owneri }}">

<input style ="margin-right:80px; padding:8px;" type="text" class="col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="title_ara" placeholder="اسم المنتج" value="{{ $store_item->title_arai }}">


										<input style ="margin:20px; padding:8px;" type="text" class="col-lg-4 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="title_eng" placeholder="english title"  value="{{ $store_item->title_engi }}">
  <br>
                                        مكان التخزين:<input style ="margin:10px; padding:8px;" type="text"style ="width:100px;" id="inputName" name ="location" placeholder="مكان التخزين " value="{{ $store_item->locationi }}">


<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="purpose" placeholder="الهدف من الطلب" col="10" rows="5">{{ $store_item->descriptioni }}</textarea>

<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:55px; ">
                                        <label>cover image</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="cover_impatha" placeholder="cover image" value="">

                                        <label>file upload</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="pdfa" placeholder="" value="">

                                    </div></div>
									<!-- col-4 -select start--->

</div>

<!-- col-4 -select start--->


                                      <div style ="margin:5px; padding:3px; border: solid lightgrey 1px;">
<label style ="margin:2px; padding:3px;">كود الصنف </label>
<input style ="margin:3px; padding:3px;" type="text" class=" " id="inputPassword3" style ="width:100px;" name ="barcode_number" placeholder="كود الصنف"  value="{{ $store_item->barcode_numberi }}">

<label >رقم الصنف</label><input style ="margin:3px; padding:3px;" type="text" class=" " id="inputPassword3" style ="width:100px;" name="items1_number2"  placeholder="رقم الصنف"  value="{{ $store_item->items1_number }}">
<br>
 العدد الكلى :<input  style ="margin:5px; padding:3px;"  type="number" class="" id="number_items" name ="quantity" style ="width:100px;" placeholder=" العدد الكلى بالقطعه" value="{{ $store_item->qauntatyi }}" min="1" required>

المتواجد حاليا <span  disabled style ="margin:5px; padding:8px; color:red;" type="text" class="" id="inputPassword3" name ="cr_quantity" placeholder=" المتواجد بالمخازن العدد الحالى"> {{ $store_item->current_qauntaty }}</span>

</div>




                                       <div style ="margin:5px; padding:3px; border: solid lightgrey 1px;">
<label style ="margin:2px; padding:3px;">السعر للقطعه</label>
<input input type="number"   id="price" name="new_price" style ="width:100px;" min="0" step="0.01" placeholder="0.00"  value="{{ $store_item->new_price }}">

<label >اجمالى السعر للقطع</label><input  id="result" readonly style ="width:100px;" value="{{ $store_item->total_pricen}}">


<label style ="margin:2px; padding:3px;">يتم الحساب من ضمن  قيمه السعريه للمخزن</label>
<select name=" still_exitsn">

@if($store_item->still_exits2==1)
<option  value="1" selected>yes</option>
<option value="0" >no</option>
@endif
@if($store_item->still_exits2==0 )
<option  value="1" >yes</option>
<option value="0" selected>no</option>
@endif
@if(empty($store_item->still_exits2) )
<option  value=""  disabled>choose option</option>
<option  value="1" >yes</option>
<option value="0" >no</option>
@endif
</select>
		</div>

										<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-9 mg-t-20 mg-lg-t-0" id="inputName" name ="notice" placeholder="ملاحظات" col="10" rows="5">{{ $store_item->notice }}</textarea>



                                       </div> </div>
            <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style="margin:10px ;border:1px solid LightGrey ;padding:10px;width:92% ;margin-right:55px; ">
            <div class="card-header">
								<h4 class="card-title mb-1">
								<p class="mb-2">التصنيف</p>



                            </h4>
							</div>
                                    <label style="width:25%">التصنيف (اجهزة-ادوات كتابية..)</label>
<select class=" select2 col-lg-6 mg-t-20 mg-lg-t-0 " name="catogery_idi" style="width:25%">

    <option disabled >--choose catogery from panel--</option>
    @if(!empty($ItemsCatogery))
    @foreach ($ItemsCatogery as $catgory)
<option value="{{$catgory->id}}"
@if(!empty($store_item->catogery_idi))
@if ($store_item->catogery_idi == $catgory->id) ? {{$catgory->id}} selected :''

@endif

@endif

>{{$catgory->ar_titlec}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->





                                        <label  style ="margin:4px; padding:2px;"> (جديد- مستعمل)الحاله</label>
                                        <select class=" select2 col-lg-6 mg-t-20 mg-lg-t-0 " name="status_idi" style="width:25%">

<option disabled >--choose status from panel--</option>
@if(!empty($status_items))
    @foreach ($status_items as $status)
<option value="{{$status->id}}"
@if(!empty($store_item->status_idi))
@if ($store_item->status_idi == $status->id) ? {{$status->id}} selected :''

@endif

@endif

>{{$status->ar_titles}}</option>
@endforeach
@endif

</select>


<div style ="margin:10px; padding:20px;">

<!-- col-4 -select start--->


<label  style="">نوع الحاله (دائم -مستهلك)</label>
                                        <select class=" select2 col-lg-3 mg-t-20 mg-lg-t-0 " name="status_idi2" style ="margin:4px; padding:10px;width:25%">

<option disabled >--choose status from panel--</option>
@if(!empty($status_items2))
    @foreach ($status_items2 as $status2)

<option value="{{$status2->id}}"
@if(!empty($store_item->status2_idi))
@if ($store_item->status2_idi == $status2->id) ? {{$status2->id}} selected :''

@endif

@endif


>{{$status2->ar_titles2}}</option>
@endforeach
@endif

</select>







<label style ="margin:10px; padding:3px;"> تاريخ الاضافه  {{ $store_item->add_datei}}<input  style ="margin:6px; padding:3px;width:200px;" type="date" class="col-lg-4-t-20 mg-lg-t-0 " id="inputPassword3" name ="add_date" placeholder=""value="">
</label>



</div>




<!-- col-4 select end-->






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
  <a class="btn btn-sm btn-danger" data-target="#mod2" data-toggle="modal" href="{{$store_item->storeitid}}"><i  style="padding:8px;"class="las la-trash"></i></a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod{{ $store_item->storeitid }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href="{{ route('store_items.destroy', $store_item->storeitid ) }}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->

</div>


												 </td>

                                                <td> <a href="{{ route('store_items.add_user',$store_item->storeitid) }}"><button class="btn ripple btn-primary" type="button">صرف عهدة للموظف</button></a></td>

<td>
<td> <a href="{{ route('store_items.add_poorstorge',$store_item->storeitid) }}"><button class="btn ripple btn-primary" type="button">نقل الى مخزن تالف(سوء تخزين)</button></a></td>

<td>
													<!-- Basic modal -info button--start--->

													<a  data-target="#moi{{$store_item->storeitid  }}" data-toggle="modal" href="{{ $store_item->storeitid }}" class="btn ripple btn-primary">more details</a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="moi{{$store_item->storeitid }}">
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


<div style="" class="col-lg-12 mg-t-20 mg-lg-t-0">
@if(!empty($store_item->value('imgpathi')))
<img src="{{  asset('stores/'.$store_item->imgpathi) }}" alt="cover" width="150px" height="170px;">
@endif
</div>
<div style="" class="col-lg-12 mg-t-20 mg-lg-t-0">


</div>

</div></div>
<!--cover image--& file uploaded start-->


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style =" border:1px solid LightGrey ;padding:3px;width:100% ; ">
<div class="card-header">
								<h3 class="card-title mb-1">
								<p class="mb-2">عملية الشراء</p>



                            </h3>
							</div>
                            <br>
<label>الشركه المورده </label>
<input style ="margin:10px; padding:8px;" type="text" class="col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="seller" placeholder="اسم المورد " value="{{ $store_item->seller_infoi }}">
<div style="" class="col-lg-12 mg-t-20 mg-lg-t-0">
@if(!empty($store_item->value('files_pathi')))
<h6>file upload :&nbsp; <a href="{{  asset('stores/'.$store_item->files_pathi) }}" target="_blank" download="">{{$store_item->files_pathi}}</a></h6>
@endif

</div><br>
<label style=" width:160px;">اسم الطالب:</label>
<input style ="margin:10px; padding:8px;" type="text" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="request_owner" placeholder="اسم طالب المنتج"  value="{{ $store_item->request_owneri }}">
<br>
<label  style=" width:160px;">اسم المنتج:</label>
<input style ="margin-right:10px; padding:8px;" type="text" class="col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="title_ara" placeholder="اسم المنتج" value="{{ $store_item->title_arai }}">
<br>
<label  style=" width:160px;">اسم المنتج باللغة الانجليزية:</label>
										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-4 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="title_eng" placeholder="english title"  value="{{ $store_item->title_engi }}">
                                        <br>
                                        <label  style=" width:160px;">سبب الطلب</label>
<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-10 mg-t-20 mg-lg-t-0" id="inputName" name ="purpose" placeholder="الهدف من الطلب" col="10" rows="5">{{ $store_item->descriptioni }}</textarea>
</div>
									<!-- col-4 -select start--->

</div>

<!-- col-4 -select start--->


                                      <div style ="margin:5px; padding:3px; border: solid lightgrey 1px;">
                                       مكان التخزين:  <input style ="margin:2px; padding:3px;" type="text"style ="width:100px;" id="inputName" name ="location" placeholder="مكان التخزين " value="{{ $store_item->locationi }}">

<label style ="margin:2px; padding:3px;"> السيريال كود الصنف :</label>
<input style ="margin:3px; padding:3px;" type="text" class=" " id="inputPassword3" style ="width:100px;" name ="barcode_number" placeholder="كود الصنف"  value="{{ $store_item->barcode_numberi }}">
<br>
<label >رقم الصنف المعرف </label><input style ="margin:3px; padding:3px;" type="text" class=" " id="inputPassword3" style ="width:100px;"  placeholder=" المعرف رقم الصنف"
 value="{{  $store_item->serial_numcla}}- {{  $store_item->ar_titlecla}} ">

 العدد الكلى :<input  style ="margin:3px; padding:3px;"  type="number" class="" id="number_items" name ="quantity" style ="width:100px;" placeholder=" العدد الكلى بالقطعه" value="{{ $store_item->qauntatyi }}" min="1" required>


</div>




                                       <div style ="margin:5px; padding:3px; border: solid lightgrey 1px;">
<label style ="margin:2px; padding:3px;">السعر للقطعه</label>
<input input type="number"   id="price" name="new_price" style ="width:100px;" min="0" step="0.01" placeholder="0.00"  value="{{ $store_item->new_price }}">

<label >اجمالى السعر للقطع</label><input  id="result" readonly style ="width:100px;" value="{{ $store_item->total_pricen}}">


<label style ="margin:2px; padding:3px;">يتم الحساب من ضمن  قيمه السعريه للمخزن</label>
<select name=" still_exitsn">

@if($store_item->still_exits2==1)
<option  value="1" selected>yes</option>
<option value="0" >no</option>
@endif
@if($store_item->still_exits2==0 )
<option  value="1" >yes</option>
<option value="0" selected>no</option>
@endif
@if(empty($store_item->still_exits2) )
<option  value=""  disabled>choose option</option>
<option  value="1" >yes</option>
<option value="0" >no</option>
@endif
</select>
		</div>



										<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-9 mg-t-20 mg-lg-t-0" id="inputName" name ="notice" placeholder="ملاحظات" col="10" rows="5">{{ $store_item->notice }}</textarea>



                                    <input  style ="margin:10px; padding:8px;" type="number" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="quantity" placeholder=" العدد الكلى بالقطعه" value="{{ $store_item->qauntatyi }}" min="1" required>
                                    <input  disabled style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="cr_quantity" placeholder=" المتواجد بالمخازن العدد الحالى" value="{{ $store_item->current_qauntaty }}">
                                        </div> </div>
            <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style="margin:10px ;border:1px solid LightGrey ;padding:10px;width:92% ;margin-right:55px; ">
            <div class="card-header">
								<h4 class="card-title mb-1">
								<p class="mb-2">التصنيف</p>



                            </h4>
							</div>
                                    <label style="width:25%">التصنيف (اجهزة-ادوات كتابية..)</label>
<select class=" select2 col-lg-6 mg-t-20 mg-lg-t-0 " name="catogery_idi" style="width:25%">

    <option disabled >--choose catogery from panel--</option>
    @if(!empty($ItemsCatogery))
    @foreach ($ItemsCatogery as $catgory)
<option value="{{$catgory->id}}"
@if(!empty($store_item->catogery_idi))
@if ($store_item->catogery_idi == $catgory->id) ? {{$catgory->id}} selected :''

@endif

@endif

>{{$catgory->ar_titlec}}</option>
@endforeach
@endif
</select>


<!-- col-4 -select start--->





                                        <label  style ="margin:4px; padding:2px;"> (جديد- مستعمل)الحاله</label>
                                        <select class=" select2 col-lg-6 mg-t-20 mg-lg-t-0 " name="status_idi" style="width:25%">

<option disabled >--choose status from panel--</option>
@if(!empty($status_items))
    @foreach ($status_items as $status)
<option value="{{$status->id}}"
@if(!empty($store_item->status_idi))
@if ($store_item->status_idi == $status->id) ? {{$status->id}} selected :''

@endif

@endif

>{{$status->ar_titles}}</option>
@endforeach
@endif

</select>


<div style ="margin:10px; padding:20px;">

<!-- col-4 -select start--->


<label  style ="margin:4px; padding:4px;">نوع الحاله (دائم -مستهلك)</label>
                                        <select class=" select2 col-lg-6 mg-t-20 mg-lg-t-0 " name="status_idi2" style ="margin:4px; padding:20px;width:40%">

<option disabled >--choose status from panel--</option>
@if(!empty($status_items2))
    @foreach ($status_items2 as $status2)

<option value="{{$status2->id}}"
@if(!empty($store_item->status2_idi))
@if ($store_item->status2_idi == $status2->id) ? {{$status2->id}} selected :''

@endif

@endif


>{{$status2->ar_titles2}}</option>
@endforeach
@endif

</select>

<label style ="margin:10px; padding:3px;"> تاريخ الاضافه  {{ $store_item->add_datei}}</label>





</div>




<!-- col-4 select end-->




                                    </div>



</td>
       <!-- End Basic modal - edit-alert end---->



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
