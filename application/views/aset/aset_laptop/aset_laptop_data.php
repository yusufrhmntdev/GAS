 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
             Aset Laptop
              <small>Data Aset Laptop</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-vehicicle"></i> </a></li>
              <li class="active">aset_laptop</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('aset_laptop/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
                </div>
                <h3 class="box-title"> data aset_laptop</h3>
            </div>
            
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th> Item Laptop </th>
                            <th>Karyawan</th>
                            <th>Departement</th>
                            <th>Lokasi</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                     <tbody>
                        <?php $no = 1;
                            foreach($row->result() as $key => $data) { ?>
                        <tr>
                           
                            <td><?php echo $no++?></td>
                            <td><?php echo $data->tanggal?></td>
                            <td><?php echo $data->nama_item?></td>
                            <td><?php echo $data->nama_karyawan?></td>
                            <td><?php echo $data->nama_departement?></td>
                            <td><?php echo $data->lokasi_name?></td>
                            <td><?php echo $data->description?></td>
                            <td><?php if($data->status == 1) {
                                 echo "Di Pinjam";
                                } else if($data->status == 2) {
                                 echo "Sudah Di Kembalikan";
                                }?></td>
                             <td><a href="<?php echo base_url('uploads/file_aset/'.$data->file); ?>" target="_blank">Links</td>
                            <td class="text-center">
                            <a href="<?php echo site_url('aset_laptop/edit/'.$data->id_aset_laptop)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i>update</a>
                        </td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            

            </div>


    
    </section>
    <!-- /.content -->