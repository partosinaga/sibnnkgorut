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
            <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
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
                    <tr role="row" class="filter">
                        <td>#</td>
                        <td>
                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                <input type="text" class="form-control form-filter input-sm" readonly name="filter_tgl_awal" placeholder="From">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                <input type="text" class="form-control form-filter input-sm" readonly name="filter_tgl_akhir" placeholder="To">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                        <td>
                            <input type="text" class="form-control form-filter input-sm" name="filter_nama"> 
                        </td>
                        <td>
                            <input type="text" class="form-control form-filter input-sm" name="filter_ttl"> 
                        </td>
                        <td>
                            <input type="text" class="form-control form-filter input-sm" name="filter_alamat"> 
                        </td>
                        <td>
                            <input type="text" class="form-control form-filter input-sm" name="filter_pekerjaan"> 
                        </td>
                        <td>
                            <input type="text" class="form-control form-filter input-sm" name="filter_agama"> 
                        </td>
                        <td>
                            <input type="text" class="form-control form-filter input-sm" name="filer_nohp"> 
                        </td>
                        <td>
                            <input type="text" class="form-control form-filter input-sm" name="filer_email"> 
                        </td>
                        <td>
                            <div class="margin-bottom-5">
                                <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                    <i class="fa fa-search"></i> Search</button>
                            </div>
                            <button class="btn btn-sm red btn-outline filter-cancel">
                                <i class="fa fa-times"></i> Reset</button>
                        </td>
                    </tr>
                </thead>
                <tbody> </tbody>
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
    var grid = new Datatable();
    var initPickers = function () {
        //init date pickers
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
    }
    var handleRecords = function () {
        grid.init({
            src: $("#datatable_ajax"),
            onSuccess: function (grid) {
                // execute some code after table records loaded
            },
            onError: function (grid) {
                // execute some code on network or other general error
            },
            onDataLoad: function(grid) {
                // execute some code on ajax data load
            },
            loadingMessage: 'Loading...',
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options
                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js).
                // So when dropdowns used the scrollable div should be removed.
                "dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                "aoColumns": [
                    {"sClass": "text-center" },
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    { "sClass": "text-center" },
                    null,
                    {"sClass": "text-center" }
                ],
                "aaSorting": [],
                "lengthMenu": [
                    [10, 20, 50, 100, 150, -1],
                    [10, 20, 50, 100, 150, "All"] // change per page values here
                ],
                "pageLength": 10, // default record count per page
                "ajax": {
                    "url": "<?php echo base_url('admin/ajax_pengaduan');?>" // ajax source
                },
                "fnDrawCallback": function( oSettings ) {
                    $('.tooltips').tooltip();
                }
            }
        });
        var tableWrapper = $("#datatable_ajax_wrapper");
    }
    handleRecords();
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
<style>
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
</style>