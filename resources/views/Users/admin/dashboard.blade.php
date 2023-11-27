

                    <link rel="stylesheet" href="{{ asset('web/css/dashboard.css') }}">

                    @extends('layouts.base')
                    @section('title','Dashboard')
                    @section('content')

<div class="container">
    <div class=" align-items-center  ms-2 mt-5 mb-3">

                                <div class="card" style="width: 100%">
                                    <div class="card-header">{{ __('Dashboard') }}</div>

                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif



                                        <section class="  w-100">
      <div class="col-xl-6 col-lg-6 d-flex align-items-center  ms-2 mt-5 mb-3">


 <div class="ms-5 col-xl-10 col-lg-10">
    <div class="card l-bg-orange-dark">
        <div class="card-statistic-3 p-4">
            <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
            <div class="mb-4">
                <h5 class="card-title mb-0">Le Prix Maximum : </h5>
            </div>
            <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                    <h2 class="d-flex align-items-center mb-0">
                        @if (@isset($productmax) )




                                     <strong><p>{{ $productmax }}</p></strong>


                                        @endif
                    </h2>
                </div>
                <div class="col-4 text-right">
                    <span><i class="fa fa-arrow-up"></i></span>
                </div>
            </div>
            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
            </div>
        </div>
    </div>
 </div>
 <div class=" ms-5 col-xl-10 col-lg-10">
    <div class="card l-bg-cherry">
        <div class="card-statistic-3 p-4">
            <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
            <div class="mb-4">
                <h5 class="card-title mb-0"> Le Prix Minimum :</h5>
            </div>
            <div class="row align-items-center mb-2 d-flex">
                <div class="col-8">
                    <h2 class="d-flex align-items-center mb-0">
                        @if (@isset($productmin))




                <strong><p>{{ $productmin }}</p></strong>


                   @endif

                                        </h2>
                </div>
                <div class="col-4 text-right">
                    <span> <i class="fa fa-arrow-up"></i></span>
                </div>
            </div>
            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
            </div>
        </div>
    </div>
 </div>
      </div>

      <div class="col-xl-6 col-lg-6 d-flex align-items-center  ms-2 mt-5 mb-3">
        <div class="ms-5  col-xl-10 col-lg-10">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                       <strong><h5 class="card-title mb-0">Total Produit: </h5></strong>
                    </div>

                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">

                            <h2 class="d-flex align-items-center mb-0">

                 @if (@isset($productcount))




                     <strong><p>{{ $productcount }}</p></strong>


                        @endif
                            </h2>

                        </div>

                        <div class="col-4 text-right">
                            <span> <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
             </div>
         </div>

    <div class="ms-5 col-xl-10 col-lg-10">
       <div class="card l-bg-orange-dark">
           <div class="card-statistic-3 p-4">
               <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
               <div class="mb-4">
                   <h5 class="card-title mb-0">Total Categorie</h5>
               </div>
               <div class="row align-items-center mb-2 d-flex">
                   <div class="col-8">
                       <h2 class="d-flex align-items-center mb-0">
                           @if (@isset($categorycount) )




                                        <strong><p>{{ $categorycount }}</p></strong>


                                           @endif
                       </h2>
                   </div>
                   <div class="col-4 text-right">
                       <span><i class="fa fa-arrow-up"></i></span>
                   </div>
               </div>
               <div class="progress mt-1 " data-height="8" style="height: 8px;">
                   <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
               </div>
           </div>
       </div>
    </div>


    </div>
      </div>
</div>






@endsection
