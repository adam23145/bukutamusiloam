<div class="row ">
    <div class="col-lg-12">
        <div class="panel panel-default card-view panel-refresh">
            <div class="refresh-container">
                <div class="la-anim-1"></div>
            </div>
            <div class="panel-heading">
                <div class="row">
                    <span class="weight-500 font-20 txt-success ml-25">Daftar Tamu</span>
                    <button data-toggle="modal" data-target="#form-tambah" class="btn btn-success btn-sm pull-right rounded-circle" id="btn-tambah" style="padding-right: 10px; padding-left: 10px; margin-right: 10px;">+</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="tabel" class="table table-hover display pb-10">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                    </tr>
                                </thead>
                                <tbody id="tampil_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include 'daftar_tamu_add.php';
?>
