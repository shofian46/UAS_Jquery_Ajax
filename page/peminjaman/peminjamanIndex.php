<div class="card">
    <div class="card-header bg-primary text-white" style="font-style: italic;">Daftar Peminjam</div>
    <div class="card-body">
        <form id="FormPeminjaman">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Peminjam </label>
                <div class="col-sm-4 ">
                    <select name="" class="form-control" id="nama_peminjam">
                        <option value="">0</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pinjam </label>
                <div class="col-sm-3">
                    <input type="text" name="tanggal" class="form-control datepicker" id="tglPinjam">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pengembalian </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control datepicker_dua" id="tglKembali">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Buku yang dipinjam </label>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <select name="" class="form-control" id="cmb_buku">
                            <option value="">0</option>
                        </select>
                        <input type="number" id="txt_jumlah" class="form-control " placeholder="Jml Pinjam">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" id="btn_add">Add Item</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">&nbsp;</label>
                <div class="col-sm-3">
                    <button id="proses_pinjam" class="btn btn-primary" type="button">Proses Pinjam</button>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">&nbsp; </label>
                <div class="col-sm-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col">Jumlah Pinjam</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="DataItem">
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">