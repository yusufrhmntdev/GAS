 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
             Data Karyawan
              <small>Karyawan</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">karyawan</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('karyawan/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
                </div>
                <h3 class="box-title"> data karyawan</h3>
            </div>
            
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped display nowrap" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nik</th>
                            <th>Name</th>
                            <th>Gender</th>    
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                            foreach($row->result() as $key => $data) { ?>

                            
                        <tr>
                           
                            <td><?php echo $no++?></td>
                            <td><?php echo $data->nik?></td>
                            <td><?php echo $data->name?></td>
                            <td><?php echo $data->gender?></td>
                            <td class="text-center" width="160px">
                            <a href="<?php echo site_url('karyawan/edit/'.$data->karyawan_id)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i>update</a>
                            <a href="<?=site_url('karyawan/del/'.$data->karyawan_id)?>" class="btn btn-danger btn-xs tombol-hapus">
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