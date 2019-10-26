<?php $this->load->view('template/header'); ?>

<div class="<?php echo $this->session->flashdata('flash_message_class');?> <?php echo ($this->session->flashdata('flash_message') != '' ? '' : 'display-hide');?>">
    <button class="close" data-close="alert"></button>
    <span class="login-msg"><?php echo $this->session->flashdata('flash_message');?></span>
</div>

<?php $this->load->view($page); ?>

<?php $this->load->view('template/footer'); ?>