
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


<form class="form-horizontal"  method="POST" action="{{ route('Itemscreate.store') }}"  enctype="multipart/form-data">
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
										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="title_ara" placeholder="arabic title" value="{{ old('title_ara') }}">


										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="title_eng" placeholder="english title"  value="{{ old('title_eng') }}">


										<input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="auther1a" placeholder="auther name"  value="{{ old('auther1a') }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther2a" placeholder="co-auther name"  value="{{ old('coauther2a') }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther3a" placeholder="co-auther name"  value="{{ old('"coauther3a') }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther4a" placeholder="co-auther name"  value="{{ old('coauther4a') }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther5a" placeholder="co-auther name"  value="{{ old('coauther5a') }}">


                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="barcode_numbera" placeholder="barcode number"  value="{{ old('barcode_numbera')}}">

                                            <textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="introductiona" placeholder="introduction" col="10" rows="5">{{ old('introductiona')}}</textarea>

										<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="summerya" placeholder="summery" col="10" rows="5">{{ old('summerya')}}</textarea>

                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="locationa" placeholder="location for hard copy" value="{{ old('locationa') }}">
                                        <input  style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="copies_numbera" placeholder="copies number" value="{{ old('copies_numbera') }}">
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
@if(!empty($Cato2))
@foreach ($Cato2 as $cat2)
<option value="{{$cat2->id}}"

>{{$cat2->ar_title}}</option>
@endforeach
@endif
</select>



                                    </div>
<!-- col-4 -select start--->
                                    <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px LightGrey solid ;padding:10px;width:85% ;margin-right:55px; ">
                                    <p class="form-group" >Multiple Select to key words</p>
                                        <select class="form-control select2 col-lg-6 mg-t-20 mg-lg-t-0" multiple="multiple"name="keyword_ida[]">
                                        <option disabled >--choose --</option>
                                        @if(!empty($keywords))
                                        @foreach ($keywords as $word)
                                        <option selected value="{{$word->id}}">
                                        {{$word->ar_title}}
											</option>
											@endforeach
                                            @endif
										</select>
                                        <!-- col-4 -select start--->
                                      <!--div--->

<span style="margin-right:100px; border:1px solid LightGrey ;padding:15px;width:100% ">

<label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-lock-open"></i></label>
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
<th>auther</th>
												<th class="border-bottom-0" width=" auto" colspan="1" >action</th>
                                                <th>  <i style="font-size:20px" class="las la-eye"></i></th>
                                             <th>
<i style="font-size:20px" class="las la-lock-open"></i></th>


                                                <th>add details</th>

<th>info</th>

<th>info</th>

			</thead>

										<tbody>

                                        @if(!empty($Itemscreated))
                                        @foreach($Itemscreated as $item)
											<tr>

                                            <td width="1%"><input type="checkbox" class="table-checkbox" name="itemselected[]" value=""></td>

											<td width=" ">{{$i=$i+1}}</td>



												<td width="">{{  $item->title_ara }}</td>
<td>{{ $item->title_eng }}</td>
<td>{{ $item->auther1 }}</td>

												<td width="">
													<!-- Basic modal -edit button--start--->

													<a  data-target="#mo{{ $item->id }}" data-toggle="modal" href="{{ $item->id }}" class="btn btn-sm btn-info"><i style="padding:8px;" class="las la-pen"></i></a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="mo{{ $item->id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">edit user data</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<form class="form-horizontal"  method="POST" action="{{ route('Itemscreate.edit',$item->id ) }}" enctype="multipart/form-data">

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
                                    <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="title_ara" placeholder="arabic title" value="{{ $item->title_ara }}">


										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="title_eng" placeholder="english title" value="{{ $item->title_eng }}">


										<input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="auther1a" placeholder="auther name" value="{{ $item->auther1 }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther2a" placeholder="co-auther name" value="{{ $item->coauther2 }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther3a" placeholder="co-auther name" value="{{ $item->coauther3 }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther4a" placeholder="co-auther name" value="{{ $item->coauther4}}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther5a" placeholder="co-auther name" value="{{ $item->coauther5 }}">


                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="barcode_numbera" placeholder="barcode number" value="{{ $item->barcode_number }}">

                                        <textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="introductiona" placeholder="introduction" col="10" rows="5">{{ $item->introduction }}</textarea>

										<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="summerya" placeholder="summery" col="10" rows="5">{{ $item->summery }}</textarea>

                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="locationa" placeholder="location for hard copy" value="{{ $item->location }}">
                                        <input  style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="copies_numbera" placeholder="copies number" value="{{ $item->copies_number }}">
                                        </div> </div>
<div>
                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:55px; ">
                                        <label>cover image</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="item_img" placeholder="cover image">

                                        <label>file upload</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="item_file" placeholder="file upload" value="">


									<!-- col-4 -select start--->


                                    <label>catogery</label>
<select class=" select2" name="catogery_ida" style="width:30%">

    <option disabled >--choose catogery from panel--</option>
    @if(!empty($ItemsCatogery))
    @foreach ($ItemsCatogery as $catgory)
<option value="{{$catgory->id}}"
@if(!empty($Catogery_title))
@if ($Catogery_title == $catgory->id) ? {{$catgory->id}} selected :''

@endif
@if ($item->catogery_id == $catgory->id) ? {{$catgory->id}} selected :''

@endif


@endif

>{{$catgory->ar_title}}</option>
@endforeach
@endif
</select>








                                        <label  style ="margin:2px; padding:2px;">item type</label>
                                        <select class=" select2 " name="catogery2_ida" style="width:30%">

<option disabled >--choose catogery from panel--</option>
@if(!empty($Cato2))
@foreach ($Cato2 as $cat2)
<option value="{{$cat2->id}}"
@if ($item->catogery2_id == $cat2->id) ? {{$cat2->id}} selected :''

@endif

>{{$cat2->ar_title}}</option>
@endforeach
@endif
</select>



                                    </div>

                                <!-- col-4 select end-->


<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px LightGrey solid ;padding:10px;width:100% ;margin-right:55px; ">
                                    <p class="form-group" >Multiple Select to key words</p>
                                        <select class="form-control select2 col-lg-8 mg-t-20 mg-lg-t-0" multiple="multiple"name="keyword_ida[]"  style="width:200px;>
                                        <option disabled  >--choose --</option>
                                        @if(!empty($keywords))
                                        @foreach ($keywords as $word)
                                        <option selected value="{{$word->id}}">
                                     @php  ($g[]=explode(',',$item->keyword_id))
                                     @endphp
                                        @foreach($g as $k)
                                        @if ($k == $cat2->id) ? {{$cat2->id}} selected :''

@endif
@endforeach
                                        {{$word->ar_title}}
											</option>
											@endforeach
                                            @endif
    </select>
                                      <!--div--->

<span style="margin-right:100px; border:1px solid LightGrey ;padding:15px;width:100% ">

<label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-lock-open"></i></label>
  <input type="checkbox"  class="main-secondary" name="lockeda"
@if($item->locked== 'on')

  checked
@endif
  >
  <label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-eye" ></i></label>

  <input type="checkbox" id="main-toggle" class="main-secondary" name="visiblea"

@if($item->visible== 'on')

  checked
@endif



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
  <a class="btn btn-sm btn-danger" data-target="#mod{{ $item->id }}" data-toggle="modal" href="{{ $item->id }}"><i  style="padding:8px;"class="las la-trash"></i></a>
					<!-- Basic modal -delete button--end--->
<!-- Basic modal -delete alert--start--->
<div class="modal" id="mod{{ $item->id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">delete confirm</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">

						<p>are you sure you want to delete this item</p>
					</div>
					<div class="modal-footer">
						<a href="{{  route('Itemscreate.destroy',$item->id)}}"><button class="btn ripple btn-primary" type="button">confirm delete</button></a>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Basic modal - delete-alert end---->


</div>


												 </td>

                                                 <td>
@if ( $item->visible=='on') <i style="font-size:20px" class="las la-eye"></i>
@endif
@if ( $item->visible !='on')
<i style="font-size:20px" class="las la-eye-slash"></i>
@endif



</td>

<td>
@if ( $item->locked=='on') <i style="font-size:20px" class="las la-lock-open"></i>
@endif
@if ( $item->locked !='on')
<i style="font-size:20px" class="las la-lock"></i>
@endif



</td>

                                                <td>
                                             <!-- drop down menue1 start--->


<div class="dropdown" style="float:left">

<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
data-toggle="dropdown" id="dropdownMenuButton" type="button"> <i class="fas fa-caret-down ml-1"> </i></button>
<div  class="dropdown-menu tx-13">
    <a class="dropdown-item"  style="float:left ;direction:ltr;text-align:left;color:blue" href="{{  route('chapter.add', $item->id)}}">add chapters</a></a>
    <a style="float:left;direction:ltr;text-align:left;color:blue;" class="dropdown-item " href="{{  route('itemversion.add', $item->id)}}">add version</a>

</div>
</div>

</div>

<!-- drop down menue1 end--->

          </td>





  <!---show info start---------->

<td>
													<!-- Basic modal -info button--start--->

													<a  data-target="#moi{{ $item->id }}" data-toggle="modal" href="{{ $item->id }}" class="btn ripple btn-primary">more details</a>

<!-- Basic modal -edit alert--start--->
<div class="modal" id="moi{{ $item->id }}">
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
<!-- col-4 -select start--->




<div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px;padding:8 px;width:auto"></div>
<label>store owner</label>
<select class=" select2 col-lg-8 mg-t-20 mg-lg-t-0 " name="catogery_iday"  style ="margin-left:100px;padding:8 px;width:200px">

<option disabled >--choose catogery from panel--</option>

<option></option>

</select>

<!-- col-4 -select start--->

<!--cover image--& file uploaded start-->
<div class="form-group col-lg-4 mg-t-20 mg-lg-t-0"  style ="margin:10px;padding:8 px ;float:left;direction:ltr">


<div style="" class="col-lg-12 mg-t-20 mg-lg-t-0">
@if(!empty($item->value('profil_impath')))
<img src="{{ asset('library/'.$item->value('profil_impath'))}}" alt="cover" width="150px" height="200px;">
@endif
</div>
<div style="" class="col-lg-12 mg-t-20 mg-lg-t-0">
@if(!empty($item->value('files_path')))
<h6>file upload : <a href="{{  asset('library/'.$item->value('files_path')) }}" target="_blank">{{$item->value('files_path')}}</a></h6>
@endif
</div>
</div></div>
<!--cover image--& file uploaded start-->

                                    <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputName"  name ="title_arav" placeholder="arabic title" value="{{$item->title_ara  }}">


										<input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="title_engv" placeholder="english title" value="{{  $item->title_eng}}">


										<input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="auther1av" placeholder="auther name" value="{{   $item-> auther1}}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther2av" placeholder="co-auther name" value="{{ $item-> coauther2 }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther3av" placeholder="co-auther name" value="{{  $item->coauther3 }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther4av" placeholder="co-auther name" value="{{ $item->coauther4 }}">
                                        <input style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0 " id="inputEmail3" name ="coauther5av" placeholder="co-auther name" value="{{ $item->coauther5  }}">


                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="barcode_numberav" placeholder="barcode number" value="{{ $item->barcode_number}}">

                                        <textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="introductionav" placeholder="introduction" col="10" rows="5">{{ $item->introduction}}</textarea>

										<textarea style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="summeryav" placeholder="summery" col="10" rows="5">{{ $item->summeryv}}</textarea>

                                        <input style ="margin:10px; padding:8px;" type="text" class=" col-lg-5 mg-t-20 mg-lg-t-0" id="inputName" name ="locationav" placeholder="location for hard copy" value="{{ $item->location}}">
                                        <input  style ="margin:10px; padding:8px;" type="text" class="col-lg-5 mg-t-20 mg-lg-t-0" id="inputPassword3" name ="copies_numberav" placeholder="copies number" value="{{ $item->copies_number}}">
                                        </div> </div>
<div>
                                <div class="form-group col-lg-12 mg-t-20 mg-lg-t-0"  style ="margin:10px ;border:1px solid LightGrey ;padding:10px;width:85% ;margin-right:55px; ">
                                        <!--<label>cover image</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="profil_impathav" placeholder="cover image">

                                        <label>file upload</label>
										<input type="file" class=" col-lg-4 mg-t-20 mg-lg-t-0" id="inputName"  name ="pdfav" placeholder="file upload" value="">

    -->
									<!-- col-4 -select start--->


                                    <label>catogery</label>
<select class=" select2" name="catogery_idav" style="width:30%">


    <option disabled >--choose catogery from panel--</option>
    @if(!empty($ItemsCatogery))
    @foreach ($ItemsCatogery as $catgory)
<option value="{{$catgory->id}}"
@if(!empty($Catogery_title))
@if ($item->catogery_id == $catgory->id) ? {{$catgory->id}} selected :''

@endif

@endif

>{{$catgory->ar_title}}</option>
@endforeach
@endif
</select>









                                        <label  style ="margin:2px; padding:2px;">item type</label>
                                        <select class=" select2 " name="catogery2_idav" style="width:30%">

<option disabled >--choose catogery2 from panel--</option>


@foreach ($Cato2 as $cat2)
<option value="{{$cat2->id}}"
@if ($item->catogery2_id == $cat2->id) ? {{$cat2->id}} selected :''

@endif

>{{$cat2->ar_title}}</option>
@endforeach

</select>



                                    </div>

                                <!-- col-4 select end-->


<div class="form-group col-lg-12 "  style =" border:1px LightGrey solid ;width:95% ;margin-right:20px;padding:20px; ">
<label  style ="margin:2px; padding:2px;">choose multiple keywords</label>
<select class=" select2 col-lg-12 " multiple="multiple"name="keyword_idav[]"  style="width:200px;">

                                        <option disabled >--choose -key words-</option>
                                        @if(!empty($keywords))
                                        @foreach ($keywords as $word)
                                        <option selected value="{{$word->id}}"

                                        @if ($item->keyword_id == $word->id) ? {{$word->id}} selected :''

@endif


                                        >
                                        {{$word->ar_title}}
											</option>
											@endforeach
                                            @endif
    </select>
                          <!--div--->

<span style="margin-right:100px; border:1px solid LightGrey ;padding:15px;width:100% ">

<label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-lock-open"></i></label>
<input type="checkbox"  class="main-secondary" name="lockedav"
@if($item->locked== 'on')

  checked
@endif
  >
  <label class="btn btn-sm btn-danger"><i style="font-size:20px" class="las la-eye" ></i></label>

  <input type="checkbox" id="main-toggle" class="main-secondary" name="visibleav"

@if($item->visible== 'on')

  checked
@endif



>
  </span>
<!--div-->
</p>
                 </div>



<!-- col-4 select end-->












                                    </div>

									<div class="form-group mb-0 mt-3 justify-content-end">

									</div>
    </td>
								</div>

					</div>

				</div>

		<!-- End Basic modal - edit-alert end---->




<td></td>




<!---------- show info end------------->




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
