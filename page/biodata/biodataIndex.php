<div id="pesan"></div>

<div class="card">
    <div class="card-header bg-light" style="font-style: italic;">Master Data Biodata</div>
    <div class="card-body">
        <!-- <button id="loadData" class="btn btn-primary">Tampilkan data</button>
        <button id="removeData" class="btn btn-secondary">Remove All</button> -->

        <div class="btn-group" role="group">
            <button type="button" id="btn_reload" class="btn btn-secondary">
                <i class="fa fa-home"></i>Reload
            </button>
            <button type="button" id="btn_add_new" class="btn btn-success">Add New</button>
            <button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </div>

        <p>&nbsp;</p>
        <table class="table table-hover">
            <thead class="thead">
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody id='dispayData'></tbody>
        </table>
    </div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="tid">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nim</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tnim">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tnama">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telpon</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="ttelpon">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="talamat"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnProses" class="btn btn-primary">Proses Data</button>
            </div>
        </div>
    </div>
</div>