                                             <?php foreach ($single_product as $products): ?>                                                  
                                                  <td colspan="8">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                     <button class="close closeBtn" type="button" data-dismiss="modal">x</button>
                                                     <h3 class="modal-title variant_title"><?php echo $products->title_p; ?> </h3>
                                                        </div>
                                                        <div class="modal-body add_Variants">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 add_variantModal">
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                          <div class="form-group">
                            <label class="control-label">Product Title<span class="required">
                                  * </span></label>
                    <input class="form-control" type="text"   name="title_p" id="title_p_model"   value="<?php echo $products->title_p; ?>" >
                        </div>       
                 <input class="form-control" type="hidden"  name="product_id" id="product_id"   value="<?php echo $product_id; ?>" >                
                                                                    <div class="form-group">
                            <label class="control-label">Product URL <span class="required">
                                  * </span></label>
                            <input class="form-control" type="text" pattern="https?://.+"  name="product_url_model" id="product_url_model"   value="<?php echo $products->product_url; ?>"  >
                        </div>      
                                                                      
                                                                    </div>
                                                                   <div class="col-lg-6 col-md-6 col-sm-6 mostOuter_ImageDiv">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="outer_newImageDiv">
                                                                                <div class="col-lg-8 col-md-8 col-sm-8 upload_newImages">
                                                                           <img src="../upload/products/<?php echo $products->file_name; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>                                                                    
                                                                </div>
                                                                </div>                                                       
                                                                <div class="col-lg-6 col-md-6 col-sm-6 add_pricing">
                                                                    <h4>Pricing</h4> 
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 pricing">
                                                                        <div class="form-group">
                                                       <label class="control-label">Currency(<b><?php echo $products->currency; ?></b>)</label>
                                                                            <select class="form-control" id="currency_model">
                                                                            <option value="INR">Select Currency</option>
                                                                             <option value="INR">India Rupees - INR</option>
                                                                                <option value="JPY">Japan Yen - JPY</option>
                                                                                <option value="NZD">New Zealand Dollars - NZD</option>
                                                                                <option value="CHF">Switzerland Francs - CHF</option>
                                                                                <option value="ARS">Argentina Pesos - ARS</option>
                                                                                <option value="AUD">Australia Dollars - AUD</option>
                                                                                <option value="BRL">Brazil Reais - BRL</option>
                                                                                <option value="CAD">Canada Dollars - CAD</option>
                                                                                <option value="CNY">China Yuan Renminbi - CNY</option>
                                                                                <option value="COP">Colombia Pesos - COP</option>
                                                                                <option value="CRC">Costa Rica Colones - CRC</option>
                                                                                <option value="DKK">Denmark Kroner - DKK</option>
                                                                                <option value="DOP">Dominican Republic Pesos - DOP</option>
                                                                                <option value="EGP">Egypt Pounds - EGP</option>
                                                                                <option value="EEK">Estonia Krooni - EEK</option>
                                                                                <option value="EUR">Euro - EUR</option>
                                                                                <option value="HKD">Hong Kong Dollars - HKD</option>
                                                                                <option value="ISK">Iceland Kronur - ISK</option>
                                                                                <option value="IDR">Indonesia Rupiahs - IDR</option>
                                                                                <option value="ILS">Israel New Shekels - ILS</option>
                                                                                <option value="JMD">Jamaica Dollars - JMD</option>
                                                                                <option value="JPY">Japan Yen - JPY</option>
                                                                                <option value="JOD">Jordan Dinars - JOD</option>
                                                                                <option value="KES">Kenya Shillings - KES</option>
                                                                                <option value="KRW">Korea (South) Won - KRW</option>
                                                                                <option value="KWD">Kuwait Dinars - KWD</option>
                                                                                <option value="LBP">Lebanon Pounds - LBP</option>
                                                                                <option value="MYR">Malaysia Ringgits - MYR</option>
                                                                                <option value="MUR">Mauritius Rupees - MUR</option>
                                                                                <option value="MXN">Mexico Pesos - MXN</option>
                                                                                <option value="MAD">Morocco Dirhams - MAD</option>
                                                                                <option value="NZD">New Zealand Dollars - NZD</option>
                                                                                <option value="NOK">Norway Kroner - NOK</option>
                                                                                <option value="OMR">Oman Rials - OMR</option>
                                                                                <option value="PKR">Pakistan Rupees - PKR</option>
                                                                                <option value="PEN">Peru Nuevos Soles - PEN</option>
                                                                                <option value="PHP">Philippines Pesos - PHP</option>
                                                                                <option value="PLN">Poland Zlotych - PLN</option>
                                                                                <option value="QAR">Qatar Riyals - QAR</option>
                                                                                <option value="RON">Romania New Lei - RON</option>
                                                                                <option value="RUB">Russia Rubles - RUB</option>
                                                                                <option value="SAR">Saudi Arabia Riyals - SAR</option>
                                                                                <option value="SGD">Singapore Dollars - SGD</option>
                                                                                <option value="SKK">Slovakia Koruny - SKK</option>
                                                                                <option value="ZAR">South Africa Rand - ZAR</option>
                                                                                <option value="KRW">South Korea Won - KRW</option>
                                                                                <option value="LKR">Sri Lanka Rupees - LKR</option>
                                                                                <option value="SEK">Sweden Kronor - SEK</option>
                                                                                <option value="CHF">Switzerland Francs - CHF</option>
                                                                                <option value="TWD">Taiwan New Dollars - TWD</option>
                                                                                <option value="THB">Thailand Baht - THB</option>
                                                                                <option value="TTD">Trinidad and Tobago Dollars - TTD</option>
                                                                                <option value="TND">Tunisia Dinars - TND</option>
                                                                                <option value="TRY">Turkey Lira - TRY</option>
                                                                                <option value="AED">United Arab Emirates Dirhams - AED</option>
                                                                                <option value="GBP">United Kingdom Pounds - GBP</option>
                                                                                <option value="USD">United States Dollars - USD</option>
                                                                                <option value="VEB">Venezuela Bolivares - VEB</option>
                                                                                <option value="VND">Vietnam Dong - VND</option>
                                                                                <option value="ZMK">Zambia Kwacha - ZMK</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                  <div class="col-lg-12 col-md-12 col-sm-12 pricing">
                                <div class="form-group">
                                    <label class="control-label">Price <span class="required">
                                  * </span></label>
                                    <div class="input-group">
                                      
       <input class="form-control" type="text" placeholder="0.00"  pattern="0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?" value="<?php echo $products->price; ?>"  name="price_model" id="price_model" >
                                    </div>
                                </div> 
                            </div>
                                                                  <div class="col-lg-12 col-md-12 col-sm-12 pricing">
                                <div class="form-group">
                                    <label class="control-label">Compare at price <span class="required">
                                  * </span></label>
                                    <div class="input-group">
                                        
                  <input class="form-control" type="text"  pattern="0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?" value="<?php echo $products->sale_price; ?>"  name="sale_price_model"   id="sale_price_model" >
                                    </div>
                                </div> 
                            </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 price_input">
                            <div class="form-group">
                                <label class="control-label">Select Category</label>
                                 <label class="control-label"></label>
                                  <select class="form-control" name="category_id_model" id="category_id_model" >
                                   <?php  foreach($categories as $cat) :?>
   <option value="<?php  echo $cat['id']; ?>" <?php if($cat['id']== $products->cat_id) echo 'selected'; ?>><?php  echo $cat['name']; ?></option>
                                   <?php endforeach;?>
                                   </select>
                            </div>
                        </div> 
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 brand_name">   
                                                                        <div class="form-group">
                                                                        <label class="control-label">Company / Brand Name <span class="required">
                                  * </span></label>
                                  <div class="text-core">
         <input type="text" class="form-control" name="brand_name_model"  id="brand_name_model"  value="<?php echo $products->brand_name; ?>"  />
                                                                              </div>
                                                                        </div> 
                                                                    </div>       
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-group">
                                                  <label class="control-label">Industry </label>
         <input type="text" class="form-control" name="industry_model" id="industry_model"   value="<?php echo $products->industry; ?>"   />
                                                                        </div> 
                                                                    </div>   
                                                                </div> 
                                                            </div>                                                                           
                                                        </div>
                                            <?php endforeach;?>            
                                                        <div class="modal-footer">                                	
                                         <button type="button" class="btn btn-success" id="update_product_model">Update</button>             
                                    <button type="button" class="btn btn-default default_btn" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </td>
  <script>
               $("#sale_price").change(function(e)
		   { 
		           price_compare  =    Number($('#sale_price_model').val());
                   price          =       Number($('#price_model').val());

			if ((price_compare > price) || (price_compare == price ))
			{
				alert("compare price value is always less than the price value");
				$("#sale_price_model").attr("value",'');
			}
			                              
		   });
		   
		      $("#price").change(function(e)
		   { 
		           price_compare  =    Number($('#sale_price_model').val());
                   price          =       Number($('#price_model').val());

			if ((price_compare > price) || (price_compare == price ))
			{
				alert("compare price value is always less than the price value");
				$("#sale_price_model").attr("value",'');
			}
			                              
		   });
	   
  </script> 
                                      