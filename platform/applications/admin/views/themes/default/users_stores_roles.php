<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
      <style type="text/css">
  .error { 
    text-align: center;
    margin-top: 10px;
    color: red;
    font-size: 18px;
    }
    </style>  

      <h3 class="page-title">
      Stores <small>Roles &amp; Permissions</small>
      </h3>
   <?php    echo css('lib/onoff/onoff.css');  echo js('lib/aciTree/aciPlugin.min.js'); echo js('lib/aciTree/aciTree.min.js');  echo js('lib/onoff/onoff.js'); ?>
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
                <a href="<?php echo base_url();?>user/index">User</a>
                 <a href="<?php echo base_url();?>user/create">New User</a>
              </li>
            </ul>
          </div>
        </div>
                               </div>
                               <div class="portlet-body form">
                              <form class="form-horizontal" id="frmUsersStroresRoles">
                                <div class="form-body">
                                   <?php echo validation_errors('<p class="error">'); ?>
                                   <div class="form-group">
                                            <label class="control-label col-md-3" for="user_role" >Username </label>
                                                                      <div class="col-md-4">
                                                                        <?php   foreach($username as  $users) :?>
                                                                       <b style="font-size:16px;"><?php echo $users->username;?></b>
                                              <input type="hidden" value="<?php echo $users->id;?>" name="user_id" id="user_id" >                 
                                                                       <?php endforeach;?>
                                                                      </div>
                                                                    </div>
                                                                 <div class="form-group">
                                                   <label class="control-label col-md-3">Select Store<span class="required">* </span></label>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                         <select class="form-control" name="status" id="select_store" required>
                                                                                 <option value="-1">Select Store</option>
                                                                                    <option value="1">Store 1</option>
                                                                                    <option value="2">Store 2</option>
                                                                                    <option value="3">Store 3</option>
                                                                                    <option value="4">Store 4</option>
                                                                                    <option value="5">Store 5</option>
                                                          </select>
                                                             </div>
                                                          </div>       
                                                                    <div class="form-group">
                                                                      <label class="control-label col-md-3" for="user_role" >Assign Role Name <span class="required">
                                                                      * </span>
                                                                      </label>
                                                                      <div class="col-md-4">
                                                                       <input type="text" value="" name="user_role" id="user_role"  class="form-control"   placeholder="Role name according to permission"> 
                                                                      </div>
                                                                    </div>
                                                                       <div class="form-group">
                                                                      <label class="control-label col-md-3" for="user_role" >Assign Role Feature<span class="required">
                                                                      * </span>
                                                                      </label>
                                                                     <div class="col-md-4">
                                                                    <div class="control-group">
                                                                    <div class="controls">
                                                                    <div class="toggle toggle-modern">
                                                                    <div id="roles_tree" class="aciTree"><div>
                                                                    </div>   
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                    </div>
                    <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" class="btn green">Update</button>
                      <button type="button" class="btn default">Cancel</button>
                    </div>
                  </div>
                </div>

                                </form>
                               </div>
                                  
                              
                              
                          </div>
                        </div>
                      </div>

<?php    echo js('customize/stores.js');  ?>
    </body>

</html>