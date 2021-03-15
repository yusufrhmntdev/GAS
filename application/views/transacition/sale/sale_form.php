 <!-- Content Header (Page header) -->
 <section class="content-header">
            <h1>
           ATK
              <small>stock out</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
              <li> Transacition</li>
              <li class="active">ATK</li>
            </ol>
 </section>

 <section class="content">
     <div class="row">
         <div class="col-lg-4">
             <div class="box box-widget">
                 <div class="box-body">
                     <table width="100%"> 
                         <tr>
                             <td style="vertical-align:top;">
                                 <label for="date">Date:</label>
                             </td>
                             <td>
                                 <div class="form-group">
                                     <input type="date" id="date" value="<?php date('Y-m-d')?>" class="form-control">
                                 </div>
                             </td>
                         </tr>
                         <tr>
                             <td style="vertical-align:top; width:30%">
                                 <label for="date">User:</label>
                             </td>
                             <td>
                                 <div class="form-group">
                                     <input type="text" id="user" value="<?php echo $this->fungsi->user_login()->username;?>" class="form-control" readonly>
                                 </div>
                             </td>
                         </tr>
                         <tr>
                             <td style="vertical-align:top; width:30%">
                                 <label for="date">Karyawan:</label>
                             </td>
                             <td>
                                 <div>
                                    <select id="karyawan" class="form-control" require>
                                        <option value="">--Pilih Karyawan--</option>
                                        <?php foreach($karyawan as $cust => $value){

                                                echo '<option value="'.$value->karyawan_id.'">'.$value->name.'</option>';

                                        } ?>
                                            
                                        
                                    </select>
                                 </div>
                             </td>
                         </tr>
                          <tr>
                             <td style="vertical-align:top; width:30%">
                                <br>
                                 <label for="date">Departement:</label>
                             </td>
                             <td>
                                <br>
                                 <div>
                                    <select id="departement" class="form-control">
                                        <option value="">--Pilih Departement--</option>
                                        <?php foreach($departement as $dept => $value){

                                                echo '<option value="'.$value->departement_id.'">'.$value->nama_dept.'</option>';

                                        } ?>
                                            
                                        
                                    </select>
                                 </div>
                             </td>
                         </tr>
                     </table>
                 </div>
             </div>
         </div>
         <div class="col-lg-4">
             <div class="box box-widget">
                 <div class="box-body">
                     <table width="100%"> 
                         <tr>
                             <td style="vertical-align:top; width:30%">
                                 <label for="date">Barcode:</label>
                             </td>
                             <td>
                                 <div class="form-group input-group">
                                     <input type="hidden" id="item_id">
                                     <input type="hidden" id="price">
                                     <input type="hidden" id="stock">
                                     <input type="text" id="barcode" class="form-control" autofocus>
                                     <span class="input-group-btn">
                                         <button type="button" class="btn btn-info btn flat" data-toggle="modal" data-target="#modal-item">
                                             <i class=" fa fa-search"></i>
                                         </button>
                                     </span>
                                 </div>
                             </td>
                         </tr>
                         <tr>
                             <td style="vertical-align:top;">
                                 <label for="date">Qty:</label>
                             </td>
                             <td>
                                 <div class="form-group">
                                     <input type="number" id="qty" value="1" min="1" class="form-control">
                                 </div>
                             </td>
                         </tr>
                         <tr>
                             <td></td>
                             <td>
                                 <div>
                                    <button type="button" id="add_cart" class="btn btn-primary col-lg-12">
                                        <i class=" fa fa-cart-plus"></i>
                                        add
                                    </button>
                                 </div>
                             </td>
                         </tr>
                     </table>
                 </div>
             </div>
         </div>
         <div class="col-lg-4">
             <div class="box box-widget">
                 <div class="box-body">
                     <div align="right">
                         <h4>No: <b><span id="invoice"><?php echo $invoice; ?></span></b></h4>
                         <h1><b><span id="subtotal" style="font-size:25pt">Store Room Requestion</span></b></h1>
                     </div>
                 </div>
             </div>
        </div>
     </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="box box-widget">
                     <div class="box-body table-responsive">
                         <table class=" table table-bordered table-striped text-center">
                             <thead>
                                 <tr>
                                     <th>No.</th>
                                     <th>Barcode</th>
                                     <th>Product Item</th>
                                      <th>Price</th>
                                     <th> Qty</th>
                                      <th> Total</th>
                                     <th> Actions</th>
                                 </tr>
                             </thead>
                             <tbody id="cart_table">
                                <?php $this->view('transacition/sale/cart_data')?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         
         
         <div class="col-lg-7">
             <div class="box box-widget">
                 <div class="box-body">
                     <table width="100%"> 
                         <tr>
                             <td style="vertical-align:top; width:30%">
                                 <label for="date">Sub Total:</label>
                             </td>
                             <td>
                                 <div class="form-group">
                                     <input type="number" id="sub_total" value="" class="form-control" readonly="">

                                 </div>
                             </td>
                         </tr>
                          <tr>
                             <td style="vertical-align:top;">
                                 <label for="note">Note:</label>
                             </td>
                             <td>
                                 <div>
                                     <textarea id="note" rows="4" class="form-control"></textarea>
                                 </div>
                             </td>
                         </tr>
                       <!--   <tr>
                             <td style="vertical-align:top;">
                                 <label for="date">Grand Total:</label>
                             </td>
                             <td>
                                 <div class="form-group">
                                   <input type="number" id="grand_total" class="form-control" readonly>
                                 </div>
                             </td>
                         </tr> -->
                     </table>
                 </div>
             </div>
         </div>
         
         <!-- <div class="col-lg-4">
             <div class="box box-widget">
                 <div class="box-body">
                     <table width="100%"> 
                         <tr>
                             <td style="vertical-align:top; width:30%">
                                 <label for="date">Cash:</label>
                             </td>
                             <td>
                                 <div class="form-group">
                                     <input type="number" id="cash" value="0" min="0" class="form-control">
                                 </div>
                             </td>
                         </tr>
                         <tr>
                             <td style="vertical-align:top;">
                                 <label for="change">Change:</label>
                             </td>
                             <td>
                                 <div class="form-group">
                                     <input type="number" id="change" value="0" min="0" class="form-control">
                                 </div>
                             </td>
                         </tr>
                     </table>
                 </div>
             </div>
         </div> -->
      <!--    <div class="col-lg-4">
             <div class="box box-widget">
                 <div class="box-body">
                     <table width="100%"> 
                         <tr>
                             <td style="vertical-align:top;">
                                 <label for="note">Note:</label>
                             </td>
                             <td>
                                 <div>
                                     <textarea id="note" rows="4" class="form-control"></textarea>
                                 </div>
                             </td>
                         </tr>
                     </table>
                 </div>
             </div>
         </div> -->
         <div class="col-lg-3">
                 <button id="cancel_payment" class="btn btn-flat btn-lg btn-danger col-lg-10">
                     <i class="fa fa-refresh"></i> Cancel
                 </button><br><br><br>
                 <button id="process_payment" class="btn btn-flat btn-lg btn-success col-lg-10">
                     <i class="fa fa-paper-plane-o"></i> Success
                 </button>
             </div>
         </div>  
     </div>
 </section>
     <!-- <modal edit> -->
     <div class="modal fade" id="modal-item-edit">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Update Product Item</h4>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="cartid_item">
                    <div class="form-group">
                        <label for="product_item"> Product Item</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="barcode_item" class="form-control" readonly="">
                            </div>
                             <div class="col-md-6">
                                <input type="text" id="product_item" class="form-control" readonly="">
                            </div>
                    </div>
              </div>
                      <div class="form-group">
                           <label for="qty_item"> Qty</label>
                           <input type="number"  id="qty_item" min="0" class="form-control">
                      </div>
                       
              </div>

              <div class="modal-footer">
                  <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success">
                        <i class="fa fa-paper-plane"></i> Save
                    </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <!-- < end modal edit> -->
<!-- < modal add > -->
   <div class="modal fade" id="modal-item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Select Product Item</h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th> Barcode</th>
                                <th> Name </th>
                                <th> Unit </th>
                                <th> Price </th>
                                <th> Stock </th>
                                <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                                 <?php foreach($item as $i => $data) { ?>
                            <tr>
                                <td><?=$data->barcode?></td>
                                <td><?=$data->name?></td>
                                <td><?=$data->unit_name?></td>
                                <td><?=indo_currency($data->price)?>.</td>
                                <td class="text-center"><?=$data->stock?></td>
                                <td>
                                    <button class="btn btn-xs btn-info" id="select" 
                                            data-item_id="<?=$data->item_id?>"
                                            data-barcode="<?=$data->barcode?>"
                                            data-price="<?=$data->price?>"
                                            data-stock="<?=$data->stock?>" >
                                        <i class="fa fa-check"></i>Select
                                    </button>
                                    
                                </td>
                            </tr>
                            <?php } ?> 

                        </tbody>
     
                </table>
            </div>
        </div>
    </div>

<!-- <end modal add> -->


<!-- <end modal add> -->




<script>

    $(document).on('click','#select', function(){
        $('#item_id').val($(this).data('item_id'))
         $('#barcode').val($(this).data('barcode'))
          $('#price').val($(this).data('price'))
           $('#stock').val($(this).data('stock'))
           $('#modal-item').modal('hide')
    })


    $(document).on('click', '#add_cart', function(){
        var item_id= $('#item_id').val()
        var price= $('#price').val()
        var stock= $('#stock').val()
        var qty= $('#qty').val()

        if (item_id == '') {

            alert('Product belom di pilih')
            $('#barcode').focus()

        } else if( stock < 1){
            alert('Stock tidak mencukupi')
            $('#item_id').val('')
            $('#barcode').val('')
            $('#barcode').focus()

        } else{
            $.ajax({

                type :'POST',
                url: '<?=site_url('sale/process')?>',
                data : {'add_cart' : true, 'item_id' : item_id, 'price' :price, 'qty' :qty},
                dataType :'json',

                success :function(result){
                    if (result.success == true) {
                        $('#cart_table').load('<?php echo site_url('sale/cart_data')?>',function(){
                            calculate()
                        })
                        $('#item_id').val('')
                        $('#barcode').val('')
                        $('#qty').val(1)
                        $('#barcode').focus()
                    } else{

                        alert('gagal di tambah')
                    }
                }
            })
        }


    })

$(document).on('click','#del_cart',function(){
    if(confirm('apakah anda yakin untuk menghapus data ini?')){
         var cart_id = $(this).data('cartid')

         $.ajax({

                type:'POST',
                url :'<?php echo site_url('sale/cart_del')?>',
                dataType:'json',
                data:{'cart_id' : cart_id},
                success: function(result){

                    if(result.success == true){
                          $('#cart_table').load('<?php echo site_url('sale/cart_data')?>',function(){
                          
                        })
                      } else{
                        alert('gagal hapus data');
                      }

                }

            })
    }
})

$(document).on('click','#update_cart', function(){
        $('#cartid_item').val($(this).data('cartid'))
         $('#barcode_item').val($(this).data('barcode'))
         $('#product_item').val($(this).data('product'))
          $('#qty_item').val($(this).data('qty'))
          $('#price').val($(this).data('price'))
    })
    

    // function count_edit_modal(){
    //     var price = $('#price_item').val()
    //     var qty = $('#qty_item').val()
    //     var discount = $('#discount_item').val()

    //     total_before = price * qty
    //     $('#total_before').val(total_before)

    //     total = (price - discount) * qty
    //     $('#total_item').val(total)
    //     if(discount == ''){
    //     	$('#discount_item').val(0)
    //     }
    // }
 

    // $(document).on('keyup mouseup','#price_item,#qty_item,#discount_item',function(){
    //     count_edit_modal()

    // })

// <edit cart>

        $(document).on('click', '#edit_cart', function(){
        var cart_id= $('#cartid_item').val()
        var qty= $('#qty_item').val()

         if( qty == '' || qty < 1 ){
            alert('Qty minimal 1 ')
            $('#qty_item').focus()

        } else{       
           $.ajax({

                type :'post',
                url: '<?=site_url('sale/process')?>',
                data : {'edit_cart' : true, 'cart_id' : cart_id,  'qty' :qty},
                dataType :'json',

                success :function(result){
                    if (result.success == true) {
                        $('#cart_table').load('<?php echo site_url('sale/cart_data')?>',function(){
                        	
                        })
                       
                       $('#modal-item-edit').modal('hide')
                       alert('Item cart berhasil terupdate')
                    } else{
 						// $('#modal-item-edit').modal('show')
       //                 alert('Item cart berhasil terupdate')
                    }
                }
            })
        }

    })

   function calculate() {
    var subtotal = 0;
      //dalert()
      $('#cart_table tr').each(function(){
        var n = $(this).find('.total').attr('totall');
        subtotal += Number(n);
      })
    isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

    var discount = $('#discount').val()
    var grand_total = subtotal - discount
    if(isNaN(grand_total)) {
        $('#grand_total').val(0)
        $('#grand_total2').text(0)
    } else {
        $('#grand_total').val(grand_total)
        $('#grand_total2').text(grand_total)
    }

    var cash = $('#cash').val();
    cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

    if(discount == '') {
        $('#discount').val(0)
    }
}
$(document).on('keyup mouseup', '#discount, #cash', function() {
    calculate()
})

$(document).ready(function () {
    calculate()
})

// process payment
$(document).on('click', '#process_payment', function() {
    var karyawan_id = $('#karyawan').val()
    var departement = $('#departement').val()
    var note = $('#note').val()
    var date = $('#date').val()
    var user = $('#user').val()
    var sub_total = $('#sub_total').val()
     // var not_click = 

    if(date == ''){
        alert('tanggal belom disi')

        $('#date').focus()
    }
    else if( karyawan_id == ''){
         alert('karyawan belom disi')

        $('#karyawan').focus()
    }
     else if( departement == ''){
         alert('departement belom disi')

        $('#departement').focus()
    }

    else if( sub_total ==''){
        alert('sub total masih kosong');
    }

    // else if ( click !=  $('#add_cart').onclick() )
    //     alert('gagal');
    else{

    if(confirm('Yakin proses transaksi ini?')) {
            $.ajax({
                type: 'POST',
                url: '<?=site_url('sale/process')?>',
                data: {'process_payment': true, 
                       'karyawan_id': karyawan_id, 
                       'departement': departement, 
                        'note': note, 
                        'date': date,
                        'user': user,
                        'sub_total' : sub_total
                    },
                dataType: 'json',
                success: function(result) {
                    if(result.success) {
                        alert('Transaksi berhasil');
                        
                    } else {
                        alert('Transaksi gagal');
                        
                    }
                    location.href='<?=site_url('sale')?>'
                }
            })
        }
    }
})




</script>