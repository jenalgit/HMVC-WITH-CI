<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <?php
     
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>';
   echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>';
    ?>            
                  <h3 class="page-title">
      Collections <small>Delete Products</small>
      </h3>
     
            <div class="row">
                        <!-- block -->
                        <div class="col-md-12">
                           
                           <div class="portlet box blue-hoki"> 
                                        <div class="portlet-title">
                                           <div class="page-toolbar">
                                            <?php foreach($titles as $product_title) :?>
                                    <span style="margin-left: 450px;font-size: 17px;"><b style="text-transform:capitalize;">DELETE PRODUCT FROM <?php echo $product_title->title ;?> </b></span>
                                     <?php endforeach;?>
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
            Actions <i class="fa fa-angle-down"></i>
            </button>
           <ul class="dropdown-menu pull-right" role="menu">
                <li>
                <a href="<?php echo base_url();?>products/add">Add new products</a>
              </li>
              <li>
                <a href="<?php echo base_url();?>collections/add">Add collection</a>
              </li>
               <li>
                <a href="<?php echo base_url();?>stories/add">Add Story</a>
              </li>
              
            </ul>
          </div>
        </div>
    
                               <div class="tools">
                           </div>
                               </div>
                                  
                                     <div class="portlet-body">
                                         <?php echo $this->session->flashdata('msg'); ?>
                              
                                   <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Product Image</th>
                                                <th>Product</th>
                                                <th>SKU </th>
                                                <th>Price</th>
                                                <th>Brand</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      <?php   if(!empty($product_collections_single)) { ?>
                                          <?php foreach($product_collections_single as $product) :?>
                                            <tr>
                                                 <td>
                                            <div class="variant_image">
                                            <img src="../upload/products/<?php echo $product->file_name; ?>" width="60px;" height="50px;">
                                            </div>
                                            </td>
                                            <td><b><?php echo $product->title_p; ?></b></td>
                                            <td><b><?php echo $product->sku_no; ?></b></td>
                                            <td><b><?php echo $product->price; ?></b></td>
                                            <td><b><?php echo $product->brand_name; ?></b></td>
                                                <td>
                                              <div class="btn-group">
                                              <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">Manage</a>
                                               <ul class="dropdown-menu">
      <li><a href="<?php echo base_url();?>products/update/<?php echo $product->id;?>"><i class="icon-fixed-width icon-thumbs-up"></i> Update</a></li>
    <li><a href="<?php echo base_url();?>collections/productdelete/?col_id=<?php echo $product->col_id;?>&prod_id=<?php echo $product->id;?>"><i class=" icon-fixed-width icon-trash"></i> Delete</a></li>                              </ul>
                                        </div>  
                                    </td>
                                            </tr>
                                       <?php endforeach;?>
                                       <?php } else { ?>
                                       <tr>
                                                
                                            </tr>
                                       
                                       <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>
   <script>
 $(document).ready(function() {
    $('#sample_2').DataTable( {
        "scrollY": 900,
		"destroy": true,
		"lengthMenu": [[50,75,100,125 ,-1], [50, 75, 100,125, "All"]],
        "scrollX": true
    } );
} );
 </script>             