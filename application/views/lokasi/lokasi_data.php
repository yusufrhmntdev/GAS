 <!-- Content Header (Page header) -->

 <section class="content-header">
 
            <h1>
             Data lokasi
              <small>lokasi</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">lokasi</li>
            </ol>
 </section>


            <!-- Default box -->
         
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
            <h3 class="box-title"> data lokasi</h3>
                <div class="pull-right">
                    <a href="<?php echo site_url('lokasi/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>location Name</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                            foreach($row->result() as $key => $data) { ?>

                            
                        <tr>
                           
                            <td style="width:10%;"><?php echo $no++?></td>
                            <td class=""><?php echo $data->nama_lokasi?></td>
                            <td class="" width="160px">
                            <a href="<?php echo site_url('lokasi/edit/'.$data->lokasi_id)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i>update</a>
                            <a href="<?=site_url('lokasi/del/'.$data->lokasi_id)?>" class="btn btn-danger btn-xs tombol-hapus">
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