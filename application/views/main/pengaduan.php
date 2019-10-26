<style>
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
</style>
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Pendaduan
    <small></small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- Begin: Demo Datatable 1 -->
<div class="portlet light portlet-fit portlet-datatable bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase">Daftar pengaduan</span>
        </div>
        <div class="actions">
            <div class="btn-group btn-group-devided" data-toggle="buttons">
            <button class="btn btn-sm green btn-outline filter-submit margin-bottom convert" data-toggle="modal" href="#basic"> <i class="fa fa-file"></i> Export to .pdf</button>
            </div>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-container">
            <table class="table table-hover">       
                <thead>
                    <tr role="row" class="heading">
                        <th width="2%">No. </th>
                        <th width="10%">Tanggal</th>
                        <th width="10%">Nama</th>
                        <th width="10%">TTL</th>
                        <th width="12%">Alamat</th>
                        <th width="7%">Pekerjaan</th>
                        <th width="7%">Agama</th>
                        <th width="7%">No. HP</th>
                        <th width="7%">Email</th>
                        <th width="5%"> Actions </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    foreach ($pengaduan->result() as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $i++ ?> </td>
                            <td><?php echo $row->tanggal?></td>
                            <td><?php echo $row->nama?></td>
                            <td><?php echo $row->ttl?></td>
                            <td><?php echo $row->alamat?></td>
                            <td><?php echo $row->pekerjaan?></td>
                            <td><?php echo $row->agama?></td>
                            <td><?php echo $row->nohp?></td>
                            <td><?php echo $row->email?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo site_url('admin/detail?id=').$row->id ?>" target="_blank" class="btn green-meadow btn-xs detail">
                                        Detail <i class="fa fa-search"></i></a>
                                </div>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End: Demo Datatable 1 -->

<!-- modal -->
<div class="modal fade period" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Export to .pdf</h4>
            </div>
            <div class="modal-body"> 
                <form id="form-filter" action="javascript:;" target="_blank"
                    <label>Periode : </label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                <input type="text" class="form-control form-filter input-sm" readonly name="date_from" placeholder="From">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                <input type="text" class="form-control form-filter input-sm" readonly name="date_to" placeholder="To">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <span class="alert" style="color:red"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green btn-export">Export</button>
            </div>
        </div>
    </div>
</div>
<!-- end of modal -->
<script>
    
$(document).ready(function(){
    var initPickers = function () {
        //init date pickers
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
    }
    initPickers();
})


$(".btn-export").click(function(){

var dateFrom = $("input[name='date_from']").val();
var dateTo = $("input[name='date_to']").val();

if(dateFrom == "" || dateTo == ""){
    $(".alert").html("Pastikan semua form terisi");
} else {
    var url = '<?php echo site_url("admin/export")?>';
    $("#form-filter").attr("method", "get");
    $('#form-filter').attr('action', url).submit();

}


})
</script>
