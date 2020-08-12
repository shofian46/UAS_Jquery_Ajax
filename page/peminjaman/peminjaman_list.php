<div class="card">
  <div class="card-header bg-warning">Daftar Peminjam</div>
  <div class="card-body">
    <div class="btn-group" role="group">
      <button type="button" id="reload_data" class="btn btn-success">
        <i class="fa fa-home"></i>Reload
      </button>
    </div>
    <br></br>
    <table id="tbl_peminjaman" class="display" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>NIM</th>
          <th>NAMA PEMINJAM</th>
          <th>TANGGAL PINJAM</th>
          <th>ASUMSI PENGEMBALIN</th>
          <th>ACTION</th>
        </tr>
      </thead>
    </table>
  </div>
</div>


<div id="dialog-form-detail" title="Detail Peminjaman">
  <table class="table">
    <tr>
      <td>ID Peminjaman</td>
      <td id="id_peminjaman">: </td>
    </tr>
    <tr>
      <td>NIM</td>
      <td id="nim">: </td>
    </tr>
    <tr>
      <td>Nama Peminjam</td>
      <td id="nama_pinjam">: </td>
    </tr>
    <tr>
      <td>Tanggal Pinjam</td>
      <td id="tgl_pinjam">: </td>
    </tr>
    <tr>
      <td>Asumsi Pengembalian</td>
      <td id="tgl_asumsi">: </td>
    </tr>
    <tr>
      <td>Status Peminjaman</td>
      <td id="status">: </td>
    </tr>
  </table>
</div>


<!--Modal untuk form pengembalian-->
<div class="modal fade" id="form_pengembalian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pengembalian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_kembali">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">ID PINJAM</label>
            <div class="col-sm-9">
              <input type="text" id="idpinjam" readonly class="form-control" placeholder="Id Pinjam">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">NIM</label>
            <div class="col-sm-9">
              <input type="text" id="nim" readonly class="form-control" placeholder="Id Pinjam">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">NAMA PEMINJAM</label>
            <div class="col-sm-9">
              <input type="text" id="nama" readonly class="form-control" placeholder="Id Pinjam">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tgl Planing</label>
            <div class="col-sm-9">
              <input type="text" id="asumsi" readonly class="form-control" placeholder="Id Pinjam">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">TGL Realisisasi</label>
            <div class="col-sm-9">
              <input type="text" id="tgl_realisasi" class="form-control" placeholder="Tgl Realissi">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Denda</label>
            <div class="col-sm-9">
              <input type="number" id="denda" class="form-control" placeholder="Denda">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn_proses_kembalikan" class="btn btn-primary">Save Data</button>
      </div>
    </div>
  </div>
</div>