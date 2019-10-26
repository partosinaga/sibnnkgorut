<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Setup
    <small>Daftar email penerima notifikasi pengaduan</small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->


<div class="col-md-6">

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-settings font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> Daftarkan email disini</span>
            </div>
        </div>
        <div class="portlet-body">
            <form method="POST" action="<?php echo site_url("admin/addEmail") ?>">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $id > 0 ? $rowEdit->id : '' ?>" required>
                        <input type="email" name="email" class="form-control" placeholder="sample@mail.com" value="<?php echo $id > 0 ? $rowEdit->email : '' ?>" required>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> <?php echo $id > 0 ? "Edit" : "Save" ?></button>
                        </span>
                    </div>

                </div>
            </form>

            <div class="mt-comments">
                <span class="mt-comment-author">DAFTAR EMAIL</span>

                <?php
                foreach ($emailList->result_array() as $row) {
                    ?>
                    <div class="mt-comment">
                        <div class="mt-comment-body">
                            <div class="mt-comment-info">
                                <!-- <span class="mt-comment-author">Michael Baker</span> -->
                                <span class="mt-comment-date"><i>Di tambahkan pada: <?php echo $row['date_created'] ?></i></span>
                            </div>
                            <div class="mt-comment-author"><?php echo $row['email'] ?></div>
                            <div class="mt-comment-details">
                                <ul class="mt-comment-actions">
                                    <li>
                                        <a href="<?php echo site_url("admin/setup?id=") . $row['id'] ?>">Edit</a>
                                    </li>
                                    <li>
                                        <a href="Javascrupt:;" class="delete-email" dataId ="<?php echo $row['id'] ?>" >Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
