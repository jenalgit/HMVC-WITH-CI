<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <?php
     
     echo  '<link rel="stylesheet" type="text/css" href="../www/admin/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../www/admin/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../www/admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>';
    ?>            
                  <h3 class="page-title">
       Stores<small>Lists</small>
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
                <a href="<?php echo base_url();?>store/create">Add New Stores</a>
              </li>
               <li>
                <a href="<?php echo base_url();?>collection/create">Add New Collection</a>
              </li>
              <li>
                <a href="<?php echo base_url();?>user/index">Stores Roles</a>
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
                                                <th>Store Name</th>
                                                <th>Store Admin</th>
                                                <th>Store Address</th>
                                                <th>Store State</th>
                                                <th>Store City</th>
                                                <th>Created On</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php   foreach($allStores as $key => $stores) :?>
                                            <tr class="odd gradeX">
                                                <td><?php   echo $stores["seller_name"]; ?></td>
                                                <?php  foreach($users as $user) :?>
                                                  <td><?php    echo $user->users_name; ?></td>
                                                  <?php break; ?>
                                                 <?php endforeach;?>
                                                <td><?php   echo $stores["address"]; ?></td>
                                                 <?php  foreach($states as $state) :?>
                                                  <td><?php    echo $state->state_name; ?></td>
                                                  <?php break; ?>
                                                 <?php endforeach;?>
                                                 <?php  foreach($cities as $city) :?>
                                                  <td><?php  echo $city->city_name; ?></td>
                                                  <?php break; ?>
                                                 <?php endforeach;?>
                                               <td><?php   echo $stores['created_at']; ?></td>
                                                <?php  if ($stores['deleted']== 1): ?>
                                                <td> Deleted </td>  
                                                <?php else : ?>
                                                <td><?php  if ($stores['status']== 1): ?>Active  <?php else : ?> Inactive<?php endif; ?></td>
                                                <?php endif; ?> 
                                                
                                                <td>
                                              <div class="btn-group">
                                              <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">Manage</a>
                                               <ul class="dropdown-menu">
                                               <?php  if ($stores['status']== 0): ?> 
                                               <li><a href="<?php echo base_url();?>store/activeStatus/<?php echo $stores['id'];?> ">
                                                <i class="icon-fixed-width icon-thumbs-up"></i> Active </a></li> 
                                                   <?php else : ?> 
                                                  <li><a href="<?php echo base_url();?>store/inactiveStatus/<?php echo $stores['id'];?> ">
                                                <i class="icon-fixed-width icon-thumbs-down"></i> Inactive</a></li>
                                                    <?php endif; ?>
                                              <li><a href="<?php echo base_url();?>store/update/<?php echo $stores['id'];?> "><i class="icon-fixed-width icon-thumbs-up"></i> Update</a></li>
                                               <?php  if ($stores['deleted']== 1): ?>
                                               <li><a href="<?php echo base_url();?>store/undelete/<?php echo $stores['id'];?>"><i class=" icon-fixed-width icon-trash"></i> UnDelete</a></li>
                                                <?php else : ?>
                                                <li><a href="<?php echo base_url();?>store/delete/<?php echo $stores['id'];?>"><i class=" icon-fixed-width icon-trash"></i> Delete</a></li>
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
    

           


            
