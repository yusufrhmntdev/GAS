 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
            Sewa Kendaraan
              <small>Data Sewa Kendaraan</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-vehicicle"></i> </a></li>
              <li class="active">sewa_kendaraan</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('sewa_kendaraan/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
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
                             <th>Tanggal SewaAwal</th>
                             <th>Tanggal SewaAkhir</th>
                             <!-- <th> Periode </th> -->
                             <th> Masa Berlaku </th>
                             <th>File</th>
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
                             <td><?php echo $awal =  $dataa->tanggal_awalSewa?></td>
                             <td><?php echo $akhir = $dataa->tanggal_akhirSewa?></td>
                             <td> <?php echo $tgl = abs((strtotime(date('Y-m-d')) - strtotime($akhir))/(60*60*24))?> Hari</td>
                             <!--  -->
                             <td><a href="<?php echo base_url('uploads/sewa_kendaraan/'.$dataa->file); ?>" target="_blank">Links</td>
                            
                            <td class="text-center" width="160px">
                            <a href="<?php echo site_url('sewa_kendaraan/edit/'.$dataa->id_sewaKendaraan)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i>update</a>
                            <a href="<?=site_url('sewa_kendaraan/del/'.$dataa->id_sewaKendaraan)?>" class="btn btn-danger btn-xs tombol-hapus">
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
    <script>
        if($tgl < 1){
            alert('dikit lg abis');
        }
    </script>
    <!-- /.content -->