 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
            legal
              <small>Data legal</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-vehicicle"></i> </a></li>
              <li class="active">legal</li>
            </ol>
 </section>
   <section class="content">
   <div class="box-title"><?php  $this->view('messages')?></div>
        <div class ="box">
            <div class="box-header">
                <div class="pull-right">
                    <a href="<?php echo site_url('legal/add');?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-user-plus"></i> created data</a>
                </div>
                <h3 class="box-title"> data legal</h3>
            </div>
            
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Nama Doc </th>
                             <th>File</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                            foreach($row->result() as $test => $data) { ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $data->nama_doc?></td>
                            <td><a href="<?php echo base_url('uploads/legal/'.$data->file); ?>" target="_blank"><i class="fa fa-file"> Link File</i></a></td>
                            <td class="text-center" width="160px">
                            <a href="<?php echo site_url('legal/edit/'.$data->legal_id)?>" 
                            class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil">
                            </i>update</a>
                            <a href="<?=site_url('legal/del/'.$data->legal_id)?>" class="btn btn-danger btn-xs tombol-hapus">
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