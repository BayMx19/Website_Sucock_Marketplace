@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list single-page-breadcome" style="background-color: white;">
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-mailbox">
                            <h1>Semua Pesan</h1>
                            <div class="panel-heading hbuilt mailbox-hd">
                                <div class="text-center p-xs font-normal">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="Cari...">
                                        <span class="input-group-btn"> <button type="button" class="btn btn-sm btn-default">Cari
                                            </button> </span>
                                    </div>
                                </div>
                            </div>
                            <tbody>

                                <tr><td colspan=4>Data Kosong...</td></tr>                                            </tbody>
                        </table>
                    </div>
                </div>
                                                <div class="panel-footer">
                    <i class="fa fa-eye"> </i> 0 Belum dibaca
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
