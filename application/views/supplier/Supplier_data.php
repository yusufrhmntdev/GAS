 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
             Suppliers
              <small>Pemasok Barang</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> </a></li>
              <li class="active">Suppliers</li>
            </ol>
 </section>


            <!-- Default box -->
            <!-- Main content -->
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('supplier/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
                </div>
                <h3 class="box-title"> data supplier</h3>
            </div>
            
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Type</th>
                            <th>Area</th>
                            <th>Npwp</th>
                            <th>Email / Website</th>
                            <th>Description</th>
                            <th class="pull-right">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                            foreach($row->result() as $key => $data) { ?>

                            
                        <tr>
                           
                            <td><?php echo $no++?></td>
                            <td><?php echo $data->name?></td>
                            <td><?php echo $data->phone?></td>
                            <td width="500px"><?php echo $data->address?></td>
                            <td width="500px"><?php echo $data->typee?></td>
                            <td><?php echo $data->area?></td>
                            <td><?php echo $data->npwp?></td>
                            <td><?php echo $data->email_website?></td>
                        <td><?php echo $data->description?></td>

                            <td class="text-center" width="160px">
                            <a href="<?php echo site_url('supplier/edit/'.$data->supplier_id)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i></a>
                            <a href="<?=site_url('supplier/del/'.$data->supplier_id)?>" class="btn btn-danger btn-xs tombol-hapus">
                                <i class="fa fa-trash"></i>
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