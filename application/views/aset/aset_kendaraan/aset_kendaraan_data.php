 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
             Aset kendaraan
              <small>Data Aset Kendaraan</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-vehicicle"></i> </a></li>
              <li class="active">aset_kendaraan</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('aset_kendaraan/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
                </div>
                <h3 class="box-title"> data aset_kendaraan</h3>
            </div>
            
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nopol</th>
                            <th>Vehicle Name</th>
                            <th>Merk</th>
                            <th>Location</th>
                            <th>Pic</th>
                             <th>Description</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                            foreach($row->result() as $key => $data) { ?>

                            
                        <tr>
                           
                            <td><?php echo $no++?></td>
                            <td><?php echo $data->plat_kendaraan?></td>
                            <td><?php echo $data->nama_kendaraan?></td>
                            <td><?php echo $data->merek_kendaraan?></td>
                            <td><?php echo $data->lokasi_name?></td>
                        <td><?php echo $data->pic?></td>
                        <td><?php echo $data->keterangan?></td>
                            <td class="text-center" width="160px">
                            <a href="<?php echo site_url('aset_kendaraan/edit/'.$data->id_aset_kendaraan)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i>update</a>
                            <a href="<?=site_url('aset_kendaraan/del/'.$data->id_aset_kendaraan)?>" class="btn btn-danger btn-xs tombol-hapus">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                        </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            

            </div>


    
    </section>
    <!-- /.content -->