<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

     <?php
     
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>';
    ?>         
                  <h3 class="page-title">
      Products <small>Home page</small>
      </h3>
     
            <div class="row">
                        <!-- block -->
                        <div class="col-md-12">
                           
                           <div class="portlet box blue-hoki"> 
                                        <div class="portlet-title">
                                           <div class="page-toolbar">
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
            Actions <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
              <li>
                <a href="<?php echo base_url();?>products/add">Add New Products</a>
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
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>SKU</th>
                                                <th>Brand_name</th>
                                                <th>Status</th>
                                                <th>created</th>
                                                <th>Publish</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php  foreach($products as $product) :?>
                                            <tr class="odd gradeX">
                                                 <td><?php   echo $product->title_p; ?></td>
                                                 <td><?php  echo $product->name; ?></td>
                                             
                                                 <td><?php  echo $product->price; ?></td>
                                                 <td><?php  echo $product->sku_no; ?></td>
                                                 <td><?php  echo $product->brand_name; ?></td>
                                                
                                                <?php  if ($product->deleted == 1): ?>
                                                <td> Deleted </td>  
                                                <?php else : ?>
                                                <td><?php  if ( $product->is_enable == 1): ?>Active  <?php else : ?> Inactive<?php endif; ?></td>
                                                <?php endif; ?> 
                                                <td><?php   echo $product->product_created_at; ?></td>
                                                 <td><?php   echo $product->updated_at; ?></td>
                                                <td>
                                              <div class="btn-group">
                                              <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">Manage</a>
                                               <ul class="dropdown-menu">
                                               <?php  if ($product->is_enable == 0): ?> 
                                               <li><a href="<?php echo base_url();?>products/activeStatus/<?php echo $product->id; ?> ">
                                                <i class="icon-fixed-width icon-thumbs-up"></i> Active </a></li> 
                                                   <?php else : ?> 
                                                  <li><a href="<?php echo base_url();?>products/inactiveStatus/<?php echo $product->id; ?> ">
                                                <i class="icon-fixed-width icon-thumbs-down"></i> Inactive</a></li>
                                                    <?php endif; ?>
                                              <li><a href="<?php echo base_url();?>products/update/<?php echo $product->id; ?> "><i class="icon-fixed-width icon-thumbs-up"></i> Update</a></li>
                                               <?php  if ($product->deleted == 1): ?>
                                               <li><a href="<?php echo base_url();?>products/undelete/<?php echo $product->id; ?>"><i class=" icon-fixed-width icon-trash"></i> UnDelete</a></li>
                                                <?php else : ?>
                                                <li><a href="<?php echo base_url();?>products/delete/<?php echo $product->id; ?>"><i class=" icon-fixed-width icon-trash"></i> Delete</a></li>
                                                <?php endif; ?> 
                                            
                                          </ul>
                                        </div>  
                                    </td>
                                            </tr>
                                       <?php endforeach;?>
                                        </tbody>
                                    </table>
                            </div>
                          </div>
                        </div>
                      </div>
           
        <!--/.fluid-container-->
 <script>
 $(document).ready(function() {
    $('#sample_2').DataTable( {
        "scrollY": 900,
		"destroy": true,
		"order": [[ 7, "desc" ]],
		 "lengthMenu": [[50,75,100,125 ,-1], [50, 75, 100,125, "All"]],
        "scrollX": true
    } );
} );
 </script> 