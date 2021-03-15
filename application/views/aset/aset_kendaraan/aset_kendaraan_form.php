 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              <?=ucfirst($page)?> aset_kendaraan </h3>
              <small>Form aset kendaraan</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">aset_kendaraan</li>
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
                    <a href="<?php echo site_url('aset_kendaraan');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
                
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php //echo validation_errors();?>

                    <form action="<?= site_url('aset_kendaraan/proses')?>" method="post">
                         <div class="form-group">
                            <label> Nopol*</label>
                             <input type="hidden" name="id_aset_kendaraan" value="<?=$row->id_aset_kendaraan?>">
                                <input class="form-control" type="text" name="plat_kendaraan" value="<?php echo $row->plat_kendaraan;?>" placeholder="Nopol" required="">
                               
                        </div>
                        <div class="form-group">
                            <label> Vehicle Name*</label>
                           
                                <input class="form-control" type="text" name="nama_kendaraan" value="<?php echo $row->nama_kendaraan;?>" placeholder="Vehicle Name" required="">
                        </div>
                        <div class="form-group">
                            <label> Merk*</label>
                                <input class="form-control" type="text" name="merek_kendaraan" value="<?php echo $row->merek_kendaraan;?>" placeholder="merk" required="">
                               
                        </div>
                        <div class="form-group">
                            <label>Location *</label>
                            <select name="lokasi" class="form-control" required="" id="lokasi">
                            <option value="">- Pilih -</option>
                                <?php foreach($lokasi->result() as $key => $data) { ?>
                                    <option value="<?php echo $data->lokasi_id?>"<?php echo $data->lokasi_id == $row->lokasi_id ? "selected" : null?>><?php echo $data->nama_lokasi?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label> Pic*</label>
                                <input class="form-control" type="text" name="pic" value="<?php echo $row->pic;?>" placeholder="Pic" required="">
                               
                        </div>
                      <div class="form-group">
                        <label> description *</label>
                                <textarea name="keterangan" class="form-control" placeholder="description" required="" autocomplete="on"><?php echo $row->keterangan?></textarea>
                               
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