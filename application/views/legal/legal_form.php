 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              <?=ucfirst($page)?> Legal </h3>
              <small>Form legal</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">legal</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
                  <!-- Small boxes (Stat box) -->

        <div class ="box">
            <div class="box-header">
            <h1 class="box-title"> </h1>
                <div class="pull-right">
                    <a href="<?php echo site_url('legal');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
                
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php //echo validation_errors();?>

                    <form action="<?= site_url('legal/proses')?>" method="post" enctype="multipart/form-data">
                    	 <input type="hidden" name="legal_id" value="<?=$row->legal_id?>">
                        <div class="form-group">
                            <label> Nama Doc*</label>
                                <input class="form-control" type="text" name="nama_doc" value="<?php echo $row->nama_doc;?>" placeholder="nama_doc" required="">
                        </div>
                        <div class="form-group">
                            <label> File*</label>
                            <input class="form-control" type="file" name="file" value="<?php echo $row->file?>">
                            <input type="hidden" name="old_file" value="<?php echo $row->file ?> "> 
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-flat" type="submit" name="<?php echo $page?>">
                                <i class="fa fa-paper-plane">
                                Save</i></button>
                            <button class="btn btn-danger btn-flat" type="reset">
                            <i class="fa fa-trash">
                                Reset</i></button>

                    </div>
                </div>
            </div>
            </div>
    </section>
    <!-- /.content -->
    