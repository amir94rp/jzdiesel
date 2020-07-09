@extends('layouts.admin')

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Top Report Wrap Start -->
        <div class="row">

            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>سفارش دریافتی</h4>
                        <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>امروز</h5>
                    </div>


                </div>
            </div><!-- Top Report End -->

            <!-- Top Report Start -->
            <div class="col-xlg-3 col-md-6 col-12 mb-30">
                <div class="top-report">

                    <!-- Head -->
                    <div class="head">
                        <h4>مجموع سود</h4>
                        <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h5>امروز</h5>
                    </div>

                </div>
            </div><!-- Top Report End -->
        </div><!-- Top Report Wrap End -->
    </div><!-- Content Body End -->
@endsection

@section('scripts')
    <script src="{{asset('/assets/js/plugins/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/chartjs/chartjs.active.js')}}"></script>
@endsection
