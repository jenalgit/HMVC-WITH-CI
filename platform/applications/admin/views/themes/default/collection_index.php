<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <?php
     
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>';
     echo  '<link rel="stylesheet" type="text/css" href="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>';
    ?>            
                  <h3 class="page-title">
      Collections 
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
              <li>
                <a href="<?php echo base_url();?>collections/add">Add new collection</a>
              </li>
               <li>
                <a href="<?php echo base_url();?>stories/add">Add  new Story</a>
              </li>
              
            </ul>
          </div>
        </div>
        <style type="text/css">
		#c_id 
		{
	         width: 220px !important;
		}
	
		</style>
                               <div class="tools">
                           </div>
                               </div>
                                  
                                     <div class="portlet-body">
                                         <?php echo $this->session->flashdata('msg'); ?>
                              
                                   <table class="table table-striped table-bordered table-hover" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>URL</th>
                                                <th>Category</th>
                                                <th>Featured</th>
                                                <th>Tag Line</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Publish</th>
                                                <th id="c_id" >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php  foreach($collections as $cat) :?>
                                            <tr>
                                                 <td><?php   echo $cat->title; ?></td>
                                                 <td><?php   echo $cat->url_slug; ?></td>
                                                  <td><?php   echo $cat->name; ?></td>		        
                                                 <td><?php  if ($cat->is_featured== 1): ?>YES  <?php else : ?>  NO  <?php endif; ?></td>
                                                 <td><?php   echo $cat->tag_line; ?></td>
                                                <?php  if ($cat->deleted == 1): ?>
                                                <td> Deleted </td>  
                                               
                                                <?php else : ?>
                                                <td><?php  if ($cat->is_enable == 1): ?>Active  <?php else : ?> Inactive<?php endif; ?></td>
                                                <?php endif; ?> 
                                                <td><?php   echo $cat->created_at; ?></td>
                                                <td><?php   echo $cat->updated_at; ?></td>
                                                <td>
                                              <div class="btn-group">
                                              <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">Manage</a>
                                               <ul class="dropdown-menu">
                                               <?php  if ($cat->is_enable == 0): ?> 
                                               <li><a href="<?php echo base_url();?>collections/activeStatus/<?php echo $cat->id;?> ">
                                                <i class="icon-fixed-width icon-thumbs-up"></i> Active </a></li> 
                                                   <?php else : ?> 
                                                  <li><a href="<?php echo base_url();?>collections/inactiveStatus/<?php echo $cat->id;?> ">
                                                <i class="icon-fixed-width icon-thumbs-down"></i> Inactive</a></li>
                                                
                                                    <?php endif; ?>
                                                <li><a href="<?php echo base_url();?>collections/update/<?php echo $cat->id;?> "><i class="icon-fixed-width icon-thumbs-up"></i> Update</a></li>
                                               
                                                 <?php  if ($cat->deleted == 1): ?>
                                                <li><a href="<?php echo base_url();?>collections/undelete/<?php echo $cat->id;?>"><i class=" icon-fixed-width icon-trash"></i> UnDelete</a></li>
                                                <?php else : ?>
                                                <li><a href="<?php echo base_url();?>collections/delete/<?php echo $cat->id; ?>"><i class=" icon-fixed-width icon-trash"></i> Delete</a></li>
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
 <script type="text/javascript"><!--
$(document).ready(function() 
{
    localStorage.clear();
});

//--></script>   
 <script>
 $(document).ready(function() 
 {
				  $('#sample_2').DataTable( {
					  "scrollY": 900,
					  "order": [[ 6, "desc" ]],
					   "lengthMenu": [[50,75,100,125 ,-1], [50, 75, 100,125, "All"]],
					  "scrollX": true
				} );		
} );
 </script> 