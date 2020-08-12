<div class="card">
    <div class="card-header bg-secondary text-white" style="font-style: italic;">Laporan Peminjaman</div>
    <div class="card-body">
        <form>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Periode Peminjaman (Start)</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control date" id="tgl_pinjam_awal" placeholder="Date Start">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Periode Peminjaman (End)</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control date" id="tgl_pinjam_akhir" placeholder="Date End">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-3 col-form-label">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="button" id="proses" class="btn btn-success">Proses</button>
                    <button type="button" id="generate_pdf" class="btn btn-warning">Export Pdf</button>
                </div>
            </div>
        </form>

        <div id="content">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">TGL PINJAM</th>
                        <th scope="col">RENCANA PENGEMBALIAN</th>
                    </tr>
                </thead>
                <tbody id="row_data">

                </tbody>
            </table>
        </div>
        <div id="editor"></div>
    </div>
</div>