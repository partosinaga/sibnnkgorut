            
<script>
    var baseUrl = "<?php echo base_url() ?>";
</script>
                </div>
            <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> <?php echo date("Y")?> &copy; BNN Kabupaten Gorontalo Utara |&nbsp;
                    <a href="<?php echo site_url('operation')?>"  target="_blank">Website Pengaduan Masyarakat</a>
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!--[if lt IE 9]>
<script src="<?php echo base_url() ?>assets/admin/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/global/plugins/excanvas.min.js"></script> 
<script src="<?php echo base_url() ?>assets/admin/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/admin/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/admin/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->


        <!-- BEGIN PAGE LEVEL PLUGINS BOOTBOX-->
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/pages/scripts/ui-bootbox.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS BOOTBOX-->


        <!-- BEGIN PAGE LEVEL PLUGINS DATATABLE-->
        <script src="<?php echo base_url() ?>assets/admin/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
		
		
		
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- <script src="<?php echo base_url() ?>assets/admin/pages/scripts/table-datatables-ajax-pengaduan.js" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL SCRIPTS DATATABLE-->
    </body>

<script>
$(".delete-email").click(function() {
    var id = $(this).attr("dataId");
    bootbox.confirm("Apakah anda yakin menghapus data ini?", function(result) {
        if(result == true){
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/deleteEmail') ?>',
                data: { 'id' : id },
                success: function() {
                    location.reload();
                }
            })
        }
    })
})
</script>
</html>