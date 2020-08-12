<div class="card">
    <div class="card-header bg-primary">Master Data Buku</div>
    <div class="card-body">
        <div class="btn-group" role="group">
            <button type="button" id="btn_reload" class="btn btn-primary">
                <i class="fa fa-home"></i>Reload
            </button>
            <button type="button" id="btn_add" class="btn btn-warning">
                <i class="fa fa-home"></i>Add
            </button>
        </div>
        <hr>
        <table class="table table-condensed" id="example-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>GAMBAR</th>
                    <th>JUDUL</th>
                    <th>PENGARANG</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody id="row_data">

            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="buku_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="tid">
                    <input type="hidden" name="mod" id="mode">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pengarang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pengarang">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="gambar">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btnProses" class="btn btn-primary">Proses Data</button>
                </div>
            </form>
        </div>
    </div>
</div>