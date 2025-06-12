@extends('layout.template') @section('content') <main>
    <!-- Hero Area Start-->
    <div class="popular-items section-padding">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle text-center mt-100 mb-50">
                        <h1 class="judul-produk"> <span>Chat</span></h1>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent" style="margin: -20px;">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="whole-wrap">
                        <div class="container ml-20">
                            <div class="h-screen overflow-hidden">
                                <livewire:chat.chat-box :userId="$userId ?? null" />                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> @endsection
