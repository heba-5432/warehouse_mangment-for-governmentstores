@extends('layouts.master')
<title>@yield('title')</title>
@section('title')
{{trans('transfile.library_system')}}
@endsection
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('transfile.library_system')}}</span>
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
					<div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
						<div class="card">
							<div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Category</div>
							<div class="card-body pb-0">
                            <form  action="{{ route('items_show.filter') }}" method="POST">
                            @csrf
                            @method ('POST')





                            <label class="p-1 mt-2 d-flex align-items-center">
									<span class="checkbox mb-0">
										<span class="check-box">
											<span class="ckbox"><input type="checkbox" name="excat_match"><span></span></span>
										</span>
									</span>
									<span class="ml-3 tx-16 my-auto">
                                    excat match
									</span>
								</label>

								<div class="form-group">

									<input type="text" value="" name="barcode" placeholder="barcode" class="form-control  nice-select ">
								</div>
                                <div class="form-group mt-2">
									<label class="form-label">catogery 1</label>
									<select name="filtercat2" id="select-beast1" class="form-control select2  nice-select  custom-select">
										<option value="0">--Select--</option>
                                        @foreach($Catogery as $cat1)
										<option value="{{  $cat1->id}}">{{ $cat1->ar_title }}</option>
										@endforeach
									</select>
								</div>


								<div class="form-group mt-2">
									<label class="form-label">catogery 2</label>
									<select name="filtercat2" id="select-beast1" class="form-control  nice-select  custom-select">
										<option value="0">--Select--</option>
                                        @foreach($Catogery2 as $cat2)
										<option value="{{  $cat2->id}}">{{ $cat2->ar_title }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group mt-2">
									<label class="form-label">keywords</label>
									<select name="keywords" id="select-beast2" class="form-control  nice-select  custom-select">
										<option value="0">--Select--</option>
										@foreach( $keies  as $key2)
										<option value="{{  $key2->id}}">{{ $key2->ar_title }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group mt-2">
<input type="text" value="" name="Authers" placeholder="  authors name" class="form-control  nice-select ">
                                </div>
                                <div class="form-group mt-2">
<input type="text" value="" name="summery" placeholder="summery or introduction" class="form-control  nice-select ">
                                </div>


								<button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>

							</div>
						</div>
					</div>
</form>
					<div class="col-xl-9 col-lg-9 col-md-12">
						<div class="card">
							<div class="card-body p-2">
								<div class="input-group">

                                    <form  action="{{ route('items_show.search') }}" method="POST" class=" col-lg-12 col-md-12">
                                        @csrf
                                        @method ('POST')

									<input type="text"  class=" col-lg-9" placeholder="Search ..." name="query">
<span class="btn btn-primary" style="height: 40px;" >
<input type="submit" class=" btn-primary"   value=" "  style="height: 20px;" >
<i class="fa fa-search " aria-hidden="true"></i>
</span>



                            </form>
                            </div>
                            <div class="card">
							<div class="card-body p-2">
								<div class="input-group">





                            <form  action="{{ route('items_show.search') }}" method="POST" class="col-lg-9"style="height:30px;float:left">
                                        @csrf
                                        @method ('POST')


									<select name="beast" id="select-beast4" class="  nice-select  custom-select col-lg-2" >
										<option value="0" disabled>--Select--</option>
										<option value="10" selected>10</option>
										<option value="30">30</option>
										<option value="50">50</option>
									</select>
									<input type="submit"class="btn btn-secondary col-lg-2"  value="show"  style="height:30px;margin:10px;">





                            </form>
                            <a href="{{ route('items_show') }}" class="btn btn-primary  col-lg-2"  style="height:30px;float:left" >show all </a>



                            <div class="row row-sm">

<!-----search result---start---------------->
@if(!empty($results['book_info']))
@foreach ($results['book_info'] as $book)
    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-success">New</div>
												<i class="mdi mdi-heart-outline ml-auto wishlist"></i>
											</div>
											<img class="w-100" src="{{URL::asset('library/'.$book->profil_impath)}}" alt="product-image" width="150" height="100">
											<a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $book->title_ara}}</h3>
											<span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">$25 <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">$59</span></h4>
										</div>
									</div>
								</div>
							</div>
                            @endforeach
                            @endif
                            @if(!empty($results['item_all_show']))
                            @foreach( $results['item_all_show'] as $item)



    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-success">New</div>
												<i class="mdi mdi-heart-outline ml-auto wishlist"></i>
											</div>
											<img class="w-100" src="{{URL::asset('library/'.$item->ver_impathv)}}" alt="product-image" width="150" height="100">
											<a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $item->title_arav}}</h3>
											<span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">$25 <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">$59</span></h4>
										</div>
									</div>
								</div>
							</div>





@endforeach


@endif


<!----------- search result-end------------->

<!-- show all--start-->
@if(empty($results['book_info']))


    @foreach($book_info as $book)
    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-success">New</div>
												<i class="mdi mdi-heart-outline ml-auto wishlist"></i>
											</div>
											<img class="w-100" src="{{URL::asset('library/'.$book->profil_impath)}}" alt="product-image" width="150" height="100">
											<a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $book->title_ara}}</h3>
											<span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">$25 <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">$59</span></h4>
										</div>
									</div>
								</div>
							</div>

                            @foreach($item_all_show as $item)


<!--@if($item->main_item_v1 == $book->id)-->
    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
												<div class="badge bg-success">New</div>
												<i class="mdi mdi-heart-outline ml-auto wishlist"></i>
											</div>
											<img class="w-100" src="{{URL::asset('library/'.$item->ver_impathv)}}" alt="product-image" width="150" height="100">
											<a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
											</a>
										</div>
										<div class="text-center pt-3">
											<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $item->title_arav}}</h3>
											<span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
											<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">$25 <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">$59</span></h4>
										</div>
									</div>
								</div>
							</div>
<!--@endif-->



@endforeach
@endforeach

@endif
<!-- show all--end->
							<ul class="pagination product-pagination mr-auto float-left">
								<li class="page-item page-prev disabled">
									<a class="page-link" href="#" tabindex="-1">Prev</a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item"><a class="page-link" href="#">5</a></li>
								<li class="page-item page-next">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
@endsection
