 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              <?=ucfirst($page)?> aset_laptop </h3>
              <small>Form aset laptop</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">aset_laptop</li>
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
                    <a href="<?php echo site_url('aset_laptop');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
                
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php //echo validation_errors();?>

                    <form action="<?= site_url('aset_laptop/proses')?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                            <label> Tanggal*</label>
                             <input type="hidden" name="id_aset_laptop" value="<?=$row->id_aset_laptop?>">
                                <input class="form-control" type="date" name="tanggal" value="<?php echo $row->tanggal;?>" placeholder="Tanggal" required="">
                        </div>
                         <div class="form-group">
                            <label>Item*</label>
                            <select name="item_id" class="form-control" required="" id="item">
                            <option value="">- Pilih Laptop -</option>
                                <?php foreach($item->result() as $key => $data) { ?>
                                    <option value="<?php echo $data->item_id?>"<?php echo $data->item_id == $row->item_id ? "selected" : null?>><?php echo $data->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Nama Karyawan *</label>
                            <select name="karyawan_id" class="form-control" required="" id="karyawan">
                            <option value="">- Pilih -</option>
                                <?php foreach($karyawan->result() as $key => $data) { ?>
                                    <option value="<?php echo $data->karyawan_id?>"<?php echo $data->karyawan_id == $row->karyawan_id ? "selected" : null?>><?php echo $data->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Departement*</label>
                            <select name="departement_id" class="form-control" required="" id="departement">
                            <option value="">- Pilih -</option>
                                <?php foreach($departement->result() as $key => $data) { ?>
                                    <option value="<?php echo $data->departement_id?>"<?php echo $data->departement_id == $row->departement_id ? "selected" : null?>><?php echo $data->nama_dept?></option>
                                <?php } ?>
                            </select>
                        </div>
                       <div class="form-group">
                            <label>Location *</label>
                            <select name="lokasi_id" class="form-control" required="" id="lokasi">
                            <option value="">- Pilih -</option>
                                <?php foreach($lokasi->result() as $key => $data) { ?>
                                    <option value="<?php echo $data->lokasi_id?>"<?php echo $data->lokasi_id == $row->lokasi_id ? "selected" : null?>><?php echo $data->nama_lokasi?></option>
                                <?php } ?>
                            </select>
                        </div>
                      <div class="form-group">
                        <label> description Laptop *</label>
                                <textarea name="description" class="form-control" placeholder="description" required="" autocomplete="on"><?php echo $row->description?></textarea>
                        </div>
                        <div class="form-group">
                            <label> Status *</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="">Pilih Status</option>
                                    <option value="1"<?php echo $row->status == 1 ? "selected" : null?>>Di Pinjam</option>
                                    <option value="2"<?php echo $row->status == 2 ? "selected" : null?>>Sudah Di Kembalikan</option>
                                </select>
                        </div>
                          <div class="form-group">
                            <label> File*</label>
                                <input class="form-control" type="file" name="file">
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
<script>
    $(document).ready(function () {
        $("#item").select2({
            placeholder: "Pilih Laptop",
            allowClear: true
            
        });
    });
    $(document).ready(function () {
        $("#karyawan").select2({
            placeholder: "Pilih Karyawan",
            allowClear: true 
        });
    });
     $(document).ready(function () {
        $("#departement").select2({
            placeholder: "Pilih Departement",
            allowClear: true 
        });
    });
     $(document).ready(function () {
        $("#lokasi").select2({
            placeholder: "Pilih Lokasi",
            allowClear: true 
        });
    });
     $(document).ready(function () {
        $("#status").select2({
            placeholder: "Pilih Status",
            allowClear: true 
        });
    });
</script>