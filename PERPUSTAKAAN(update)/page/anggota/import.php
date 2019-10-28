           
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Anggota
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <form method="POST" enctype="multipart/form-data" action="index.php?page=anggota&aksi=upload_aksi">
                                <div class="form-group">
                                    <label>File Excel</label>
                                    <input type="file" name="file" class="form-control" required="required">
                                </div>
                                <div class="form-group pull-left">
                                    <input type="submit" name="import" value="Import" class="btn btn-success">
                                </div>
                            </form>
                         </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>
