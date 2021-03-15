 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
             sewa bangunan
              <small>Data sewa bangunan</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-vehicicle"></i> </a></li>
              <li class="active">sewa_bangunan</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('sewa_bangunan/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
                </div>
                <h3 class="box-title"> data sewa bangunan</h3>
            </div>
            
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>No Kontrak</th>
                            <th>Location</th>
                            <th>Vendor</th>
                            <th>Luas bangunan</th>
                             <th>Price</th>
                             <th>Tanggal Sewa Awal</th>
                             <th>Tanggal Sewa Akhir</th>
                             <th>Tanggal Kontrak</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                            foreach($row->result() as $test => $dataa) { ?>

                            
                        <tr>
                           
                            <td><?php echo $no++?></td>
                            <td><?php echo $dataa->status == 1? "aktif" :"tidak aktif"?></td>
                            <td><?php echo $dataa->no_kontrak?></td>
                            <td><?php echo $dataa->lokasi_name?></td>
                            <td><?php echo $dataa->nama_supplier?></td>
                             <td><?php echo $dataa->luas_bangunan?></td>
                               <td><?php echo indo_currency($dataa->price)?></td>
                             <td><?php echo $dataa->tanggal_awal_sewa?></td>
                             <td><?php echo $dataa->tanggal_akhir_sewa?></td>
                              <td><?php echo $dataa->tanggal_kontrak?></td>
                            <td class="text-center" width="160px">
                            <a href="<?php echo site_url('sewa_bangunan/edit/'.$dataa->id_sewa_bangunan)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i>update</a>
                            <a href="<?=site_url('sewa_bangunan/del/'.$dataa->id_sewa_bangunan)?>" class="btn btn-danger btn-xs tombol-hapus">
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