@extends('layout.template2')
@section('contentadmin')

<div class="container-xl py-4">

    {{-- Cards Section --}}
    <div class="row g-4 mb-5">

        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card shadow-sm border-0" style="min-height: 120px; background: linear-gradient(135deg, #6fa8ba, #548c99); transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.2)';"
            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)';">
                <div class="card-body text-white text-center p-1" style="padding-top: 2 !important; padding-bottom: 2;">
                    <div class="row">
                        <div class="col-4">
                            <div class="icon-circle mb-3 mx-auto" style="background-color: rgba(255,255,255,0.15); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-solid  fa-xl"></i>
                            </div>
                        </div>
                        <div class="col-8" style="margin-top: -20px;">
                            <h6 class="text-uppercase fw-bold mb-1 mt-1" style="letter-spacing: 1px;"></h6>
                            <h2 class="fw-bold mb-2"></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h2 class="h2 fw-bold mb-4">Diagram Pemasukan</h2>
                    <canvas id="grafik_pemasukan"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h2 class="h2 fw-bold mb-4">Diagram Review Pelanggan</h2>
                    <canvas id="grafik_review"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
