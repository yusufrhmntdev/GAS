 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              <small> Edit lokasi //</small>
              <small>Control Panel</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active"> Edit lokasi</li>
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
                    <a href="<?php echo site_url('lokasi');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
        
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                       <!--  <?php //echo validation_errors();?> -->

                    <form action="" method="post">
                        <div class="form-group <?php echo form_error('nama_lokasi') ? 'has-error' : null?>">
                            <label> name</label>
                                <input type="hidden" name="lokasi_id" value="<?php echo $row->lokasi_id?>">
                                <input class="form-control" type="text" name="nama_lokasi" value="<?php echo $this->input->post('nama_lokasi') ?? $row->nama_lokasi?> " placeholder="fullname">
                               <?php echo form_error('nama_lokasi');?></span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-flat" type="submit">
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