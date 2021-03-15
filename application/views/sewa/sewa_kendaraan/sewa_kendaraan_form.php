 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h3>
              <?=ucfirst($page)?> sewa_kendaraan </h3>
              <small>Form Sewa Kendaraan</small>
            </h3>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">Sewa Bangunan</li>
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
                    <a href="<?php echo site_url('sewa_kendaraan');?>" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-undo"></i> back</a>
                </div>
                
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php //echo validation_errors();?>

                    <form action="<?= site_url('sewa_kendaraan/proses')?>" method="post" enctype="multipart/form-data">
                    	 <input type="hidden" name="id_sewaKendaraan" value="<?=$row->id_sewaKendaraan?>">
                         <div class="form-group">
                            <label> Status *</label>
                                <select name="status" class="form-control">
                                    <option value="">Pilih Status</option>
                                   <option value="1"<?php echo $row->status == '1'?'selected' :''?>>Aktif</option>
                                    <option value="2"<?php echo $row->status == '2'?'selected' :''?>>Tidak Aktif</option>
                                </select>
                              
                        </div>
                        <div class="form-group">
                            <label> No Kontrak*</label>
                           
                                <input class="form-control" type="text" name="no_kontrak" value="<?php echo $row->no_kontrak;?>" placeholder="nomor_kontrak" required="">
                        </div>
                        <div class="form-group">
                            <label>Location *</label>
                            <select name="lokasi_name" class="form-control" required="" id="lokasi">
                            <option value="">- Pilih Lokasi -</option>
                                <?php foreach($lokasi->result() as $key => $data) { ?>
                                    <option value="<?php echo $data->lokasi_id?>"<?php echo $data->lokasi_id == $row->lokasi_id ? "selected" : null?>><?php echo $data->nama_lokasi?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Vendor *</label>
                            <select name="supplier_name" class="form-control" required="" id="supplier">
                            <option value="">- Pilih Vendor -</option>
                                <?php foreach($supplier->result() as $supp => $dataa) { ?>
                                    <option value="<?php echo $dataa->supplier_id?>"<?php echo $dataa->supplier_id == $row->supplier_id ? "selected" : null?>><?php echo $dataa->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label> Tanggal Awal Sewa*</label>
                                <input class="form-control" type="date" name="tanggal_awalSewa" value="<?php echo $row->tanggal_awalSewa;?>" placeholder="tanggal awal sewa" required="">
                               
                        </div>
                         <div class="form-group">
                            <label> Tanggal Akhir Sewa*</label>
                                <input class="form-control" type="date" name="tanggal_akhirSewa" value="<?php echo $row->tanggal_akhirSewa;?>"required="">
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
     <script>
            $(document).ready(function () {
                $("#lokasi").select2({
                    placeholder: "Pilih Lokasi",
                    allowClear: true
                    
                });
                
                
            });
            $(document).ready(function () {
                $("#supplier").select2({
                    placeholder: "Pilih Supplier",
                    allowClear: true
                    
                });
                
                
            });
      </script>