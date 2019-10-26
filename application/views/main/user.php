<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> User
    <small>Validasi useraccount</small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Full Name </th>
                            <th> Email </th>
                            <th> No. HP </th>
                            <th> Address </th>
                            <th> Username </th>
                            <th> Password </th>
                            <th> Role </th>
                            <th> Status </th>
                            <th style="width:11%"> # </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($user->result() as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $i++ ?> </td>
                                <td> <?php echo $row->fullname ?> </td>
                                <td> <?php echo $row->email ?> </td>
                                <td> <?php echo $row->nohp ?> </td>
                                <td> <?php echo $row->address ?> </td>
                                <td> <?php echo $row->username ?> </td>
                                <td> <?php echo $row->password ?> </td>
                                <td>
                                    <?php
                                    switch ($row->role) {
                                        case 'admin':
                                            echo '<span class="label label-sm label-warning">' . strtoupper($row->role) . '</span>';
                                            break;
                                        case 'user':
                                            echo '<span class="label label-sm label-danger">' . strtoupper($row->role) . '</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    switch ($row->status) {
                                        case 'new':
                                            echo '<span class="label label-sm label-info">' . strtoupper($row->status) . '</span>';
                                            break;
                                        case 'active':
                                            echo '<span class="label label-sm label-success">' . strtoupper($row->status) . '</span>';
                                            break;
                                        case 'inactive':
                                            echo '<span class="label label-sm label-danger">' . strtoupper($row->status) . '</span>';
                                            break;
                                        case 'rejected':
                                            echo '<span class="label label-sm label-warning">' . strtoupper($row->status) . '</span>';
                                            break;
                                    }
                                    ?>

                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default dropdown-toggle btn-sm blue" data-toggle="dropdown" href="javascript:;" aria-expanded="false"> Action
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo site_url() . 'admin/manage_status?id=' . $row->id . '&mode=active   '; ?>"> Active </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url() . 'admin/manage_status?id=' . $row->id . '&mode=inactive   '; ?>"> Inactive </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url() . 'admin/manage_status?id=' . $row->id . '&mode=rejected   '; ?>"> Reject </a>
                                            </li>
                                            <li class="divider"> </li>
                                            <li>
                                                <a href="<?php echo site_url() . 'admin/manage_role?id=' . $row->id . '&role=user   '; ?>"> Set User </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url() . 'admin/manage_role?id=' . $row->id . '&role=admin   '; ?>"> Set Admin </a>
                                            </li>
                                            <li class="divider"> </li>
                                            <li>
                                                <a href="javascript:;" class="delete-user" dataId="<?php echo $row->id?>"> Delete </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<script>
$(".delete-user").click(function() {
    var id = $(this).attr("dataId");
    bootbox.confirm("Apakah anda yakin menghapus data ini?", function(result) {
        if(result == true){
            $.ajax({
                type: 'GET',
                url: '<?php echo site_url('admin/deleteUser') ?>',
                data: { 'id' : id },
                success: function() {
                    location.reload();
                }
            })
        }
    })
})
</script>