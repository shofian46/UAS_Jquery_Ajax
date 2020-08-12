<div class="card">
    <div class="card-header bg-danger text-white" style="font-style: italic;">Daftar Pengembalian</div>
    <div class="card-body">
        <div class="btn-group" role="group">
            <button type="button" id="reload_data" class="btn btn-dark">
                <i class="fa fa-home"></i>Reload
            </button>
        </div>
        <br></br>
        <table id="tbl_pengembalian" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID PENGEMBALIAN</th>
                    <th>ID PINJAM</th>
                    <th>NIM</th>
                    <th>TANGGAL KEMBALI</th>
                    <th>TANGGAL REALISASI</th>
                    <th>DENDA</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                    <th>PELUNASAN</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal" id="modal_bayar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Pembayaran Denda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormBayarDenda">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Total Denda </label>
                        <div class="col-sm-9 ">
                            <input type="text" readonly class="form-control datepicker" id="denda_balance">
                        </div>
                    </div>
                    <input type="hidden" id="item_id">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Bayar </label>
                        <div class="col-sm-9 ">
                            <input type="text" name="denda" class="form-control datepicker" id="denda">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_prosesbayar">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>