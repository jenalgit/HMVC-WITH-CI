<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <style type="text/css">
  .error { 
    text-align: center;
    margin-top: 10px;
    color: red;
    font-size: 18px;
    }
    </style>    
               




                <!--/span-->
                <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Products</div>
                            </div>
                           <?php echo $this->session->flashdata('msg'); ?>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <?php
                                      echo form_open_multipart('products/add');
                                      ?>
                                      <fieldset>
                                        <legend>Product Details</legend>
                                          <div class="control-group">
                                         <label class="control-label">Store<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="store_id">
                                                <option value="1">Store 1 </option>
                                                <option value="2">Store 2</option>
                                            </select>
                                       </div>
                                  </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Title</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="title" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                         <label class="control-label">Category<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="category_id">
                                              <option value="0">Main Category</option>
                                             <?php  foreach($categories as $cat) :?>
                                                <option value="<?php echo $cat['id']; ?>"><?php  echo $cat['name']; ?></option>
                                                 <?php endforeach;?>
                                            </select>
                                       </div>
                                  </div>
                                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                        <div class="control-group">
                                          <label class="control-label" for="textarea2">Short Description</label>
                                          <div class="controls">
                                            <textarea class="input-xlarge textarea" placeholder="Enter Content Description ..." style="width: 90%; height: auto;" name="sdescription"></textarea>
                                          </div>
                                        </div>
                                         <div class="control-group">
                                          <label class="control-label" for="textarea2">Description</label>
                                          <div class="controls">
                                            <textarea class="input-xlarge textarea" placeholder="Enter Content Description ..." style="width: 90%; height: auto;" name="description"></textarea>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Meta Title</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="m_title" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Meta Description</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="m_description" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Meta Keyword</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="m_keywords" >
                                          </div>
                                        </div>
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Tags</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="tags" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Price</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="number" name="price" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Discounted Price</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="number" name="dprice" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Discount From</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="date" name="from" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Discount End</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="date" name="end" >
                                          </div>
                                        </div>
                                            <div class="control-group">
                                         <label class="control-label">Status<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                       </div>
                                  </div>
                                  <?php foreach ($allUsers as $users): ?>
                                   <input type="hidden" name="created_by" value="<?php echo $users['id']; ?>" />
                                   <?php endforeach;?>
                                       
                                      </fieldset>
                                      <fieldset>
                                        <legend>Shipping Details</legend>
                                        <div class="control-group">
                                         <label class="control-label">Shipping type<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="type">
                                                <option value="1">Courier</option>
                                                <option value="0">Self</option>
                                            </select>
                                       </div>
                                  </div>
                                   <div class="control-group">
                                         <label class="control-label">Country<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="country">
                                                <option value="1">India</option>
                                                <option value="0">Us</option>
                                            </select>
                                       </div>
                                  </div>
                                   <div class="control-group">
                                         <label class="control-label">State<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="state">
                                                <option value="1">Delhi</option>
                                                <option value="0">Haryana</option>
                                            </select>
                                       </div>
                                  </div>
                                   <div class="control-group">
                                         <label class="control-label">City<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="city">
                                                  <option value="1">Delhi</option>
                                                <option value="0">Gurgoan</option>
                                            </select>
                                       </div>
                                  </div>
                                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Location</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="location" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Pin code</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="code" >
                                          </div>
                                        </div>
                                       
                                            <div class="control-group">
                                         <label class="control-label">Status<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="shipping_status">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                       </div>
                                  </div>
                                      </fieldset>
                                       <fieldset>
                                        <legend>Stocks Details</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Stock Available</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="number" name="available_stock" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Baic Unit</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="basic_unit" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Min Qty</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="minium_qty" >
                                          </div>
                                        </div>
                                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Max Qty</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="max_qty" >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Back Order</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="back_order" >
                                          </div>
                                        </div>
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput">Order Text</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="text" name="order_text" >
                                          </div>
                                        </div>

                                       
                                            <div class="control-group">
                                         <label class="control-label">Status<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="stock_status">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                       </div>
                                  </div>
                                      </fieldset>
                                       <div class="form-actions">
                                          <?php echo form_submit('submit', 'Save changes',"class='btn btn-primary'"); ?>
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
           
        </div>
        <!--/.fluid-container-->

	<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="assets/form-validation.js"></script>
        <script>
	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	
        </script>
    </body>

</html>