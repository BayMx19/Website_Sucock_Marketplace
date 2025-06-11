@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-12 table_inside">
                    <h4 style="margin-left: 15px;">Data Produk</h4>
                    <div class="h-screen overflow-hidden">
                            @livewire('chat.chat-box')
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
