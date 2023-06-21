@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">{{ $rejectCount }} Rejected Slider
                        @if ($rejectCount > 0)
                            <div class="fas fa-bell float-end"></div>
                        @else
                            <div class="fas fa-check float-end"></div>
                        @endif
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('slider.index', ['approve' => '0']) }}">You have {{ $rejectCount }} rejected Slider</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">{{ $approveCountS }} Approved Slider
                        @if ($approveCountS > 0)
                            <div class="fas fa-bell float-end"></div>
                        @else
                            <div class="fas fa-check float-end"></div>
                        @endif
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('slider.index', ['approve' => '1']) }}">You have {{ $approveCountS }} approved Slider</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">{{ $rejectCountP }} Rejected Product
                        @if ($rejectCountP > 0)
                            <div class="fas fa-bell float-end"></div>
                        @else
                            <div class="fas fa-check float-end"></div>
                        @endif
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('product.index', ['approve' => '0']) }}">You have {{ $rejectCountP }} rejected Product</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">{{ $approveCountC }} Approved Product
                        @if ($approveCountC > 0)
                            <div class="fas fa-bell float-end"></div>
                        @else
                            <div class="fas fa-check float-end"></div>
                        @endif
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('product.index', ['approve' => '1']) }}">You have {{ $approveCountC }} approved Product</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection