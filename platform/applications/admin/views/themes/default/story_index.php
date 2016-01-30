<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <?php
     
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>';
    ?>            
                  <h3 class="page-title">
      Stories 
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
                                    <a href="<?php echo base_url();?>products/add">Add new product</a>
                                  </li>
                                </ul>
          </div>
        </div>
                              
                               </div>
                                  
                                     <div class="portlet-body">
                                         <?php echo $this->session->flashdata('msg'); ?>
                              
                                   <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Username</th>
                                                <th>Featured</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Publish</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php  foreach($stories as $cat) :?>
                                            <tr>
                                                <td><?php   echo $cat->title; ?></td>
                                                <td><?php   echo $cat->name; ?></td>
                                                <td><?php   echo $cat->username; ?></td>
                                             <td><?php  if ($cat->is_featured== 1): ?>Featured  <?php else : ?> Normal <?php endif; ?></td>
                                                <?php  if ($cat->deleted== 1): ?>
                                                <td> Deleted </td>  
                                                <?php else : ?>
                                                <td><?php  if ($cat->is_approved== 1): ?>Active  <?php else : ?> Inactive<?php endif; ?></td>
                                                <?php endif; ?> 
                                                <td><?php   echo $cat->created_date; ?></td>
                                                <td><?php   echo $cat->updated_at; ?></td>
                                                <td>
                                              <div class="btn-group">
                                              <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">Manage</a>
                                               <ul class="dropdown-menu">
                                               <?php  if ($cat->is_approved== 0): ?> 
                                               <li><a href="<?php echo base_url();?>stories/activeStatus/<?php echo $cat->id;?> ">
                                                <i class="icon-fixed-width icon-thumbs-up"></i> Active </a></li> 
                                                   <?php else : ?> 
                                                  <li><a href="<?php echo base_url();?>stories/inactiveStatus/<?php echo $cat->id;?> ">
                                                <i class="icon-fixed-width icon-thumbs-down"></i> Inactive</a></li>
                                                    <?php endif; ?>
                                              <li><a href="<?php echo base_url();?>stories/update/<?php echo $cat->id;?> "><i class="icon-fixed-width icon-thumbs-up"></i> Update</a></li>
                                               <?php  if ($cat->deleted == 1): ?>
                                               <li><a href="<?php echo base_url();?>stories/undelete/<?php echo $cat->id;?>"><i class=" icon-fixed-width icon-trash"></i> UnDelete</a></li>
                                                <?php else : ?>
                                                <li><a href="<?php echo base_url();?>stories/delete/<?php echo $cat->id;?>"><i class=" icon-fixed-width icon-trash"></i> Delete</a></li>
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
		"order": [[ 6, "desc" ]],
		"lengthMenu": [[50,75,100,125 ,-1], [50, 75, 100,125, "All"]],
        "scrollX": true
    } );
} );
 </script>          
    