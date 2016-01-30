       <!--[if lt IE 9]>
<script src="../www/admin/assets/global/plugins/respond.min.js"></script>
<script src="../www/admin/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->     

               <div class="row margin-top-20">
				<div class="col-md-12">
					<div class="profile-sidebar">
						<div class="portlet light profile-sidebar-portlet">
							<div class="profile-userpic">
								<img src="../assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
							</div>
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									Store View
								</div>
								<div class="profile-usertitle-job">
									 Developer
								</div>
							</div>
							<div class="profile-userbuttons">
								<button type="button" class="btn btn-circle green-haze btn-sm">Follow</button>
								<button type="button" class="btn btn-circle btn-danger btn-sm">Message</button>
							</div>
							<div class="profile-usermenu">
								<ul class="nav">
									<li class="active">
										<a href="store_view.html">
										<i class="icon-home"></i>
										Overview </a>
									</li>
									<li>
										<a href="store_view_account_details.html">
										<i class="icon-settings"></i>
										Store Account Details </a>
									</li>                                    
                                    <li>
										<a id="dropdownmenu" data-toggle="collapse" aria-expanded="false" href="javascript:;" data-target="#storeul">
											<i class="fa fa-list-ul"></i>
											Store Analytics
                                            <span class="fa-stack fa-lg" id="change_this">
                                        	<i class="fa fa-plus fa-stack-1x"></i>
                                            </span>
                                        </a>
                                         <ul class="collapse" id="storeul" aria-labelledby="dropdownmenu">
                                         	<li><a href="store_view_analytics.html"><i class="fa fa-caret-right"></i>Visitors</a></li>
                                            <li><a href="store_view_analytics_sales.html"><i class="fa fa-caret-right"></i>Sales</a></li>
                                            <li><a href="store_view_analytics_refund.html"><i class="fa fa-caret-right"></i>Refunds</a></li>
                                            <li><a href="store_view_analytics_order.html"><i class="fa fa-caret-right"></i>Orders</a></li>
                                         </ul>
									</li>
									<li>
										<a href="store_report_analytics.html">
										<i class="fa fa-list-alt"></i>
										Reports & Analytics </a>
									</li>
									<li>
										<a href="extra_profile_help.html">
										<i class="icon-info"></i>
										Help </a>
									</li>
								</ul>
							</div>
							<!-- END MENU -->
						</div>
						<!-- END PORTLET MAIN -->
						<!-- PORTLET MAIN -->
						<div class="portlet light">
							<!-- STAT -->
							<div class="row list-separated profile-stat">
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 37
									</div>
									<div class="uppercase profile-stat-text">
										 Projects
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 51
									</div>
									<div class="uppercase profile-stat-text">
										 Tasks
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 61
									</div>
									<div class="uppercase profile-stat-text">
										 Uploads
									</div>
								</div>
							</div>
							<!-- END STAT -->
							<div>
								<h4 class="profile-desc-title">About Marcus Doe</h4>
								<span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-globe"></i>
									<a href="http://www.keenthemes.com">www.keenthemes.com</a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-twitter"></i>
									<a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-facebook"></i>
									<a href="http://www.facebook.com/keenthemes/">keenthemes</a>
								</div>
							</div>
						</div>
						<!-- END PORTLET MAIN -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
                        	<div class="col-lg-12 col-md-12 col-sm-12">
                            	<div class="portlet light">
                                	<div class="portlet-title tabbable-line">
                                	   <div class="caption">
                                       	<span class="caption-subject font-blue-madison bold uppercase">Visitors Overview</span>
                                       </div>
                                       <ul class="nav nav-tabs">
                                       	<li class="active"><a href="#overall" data-toggle="tab">Overall</a></li>
                                        <li><a href="#section_visitors" data-toggle="tab">Visitors By Section</a></li>
                                        <li><a href="#product_visitors" data-toggle="tab">Visitors By Product</a></li>
                                        <li><a href="#location_visitors" data-toggle="tab">Visitors By Location</a></li>
                                        <li><a href="#age_visitors" data-toggle="tab">Visitors By Age-Group</a></li>
                                       </ul>
                                	</div>
                                    <div class="portlet-body">
                                    	<div class="tab-content">
                                        <!--BEGIN Overall visitors Tab-1--> 
                                        	<div id="overall" class="tab-pane active">
                                            	<div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">                                                            	
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                    <div id="reportrange" class="btn default daterange_backcolor reportrange">
                                                                              <i class="fa fa-calendar"></i>
                                                                                &nbsp; <span>
                                                                                   </span>
                                                                                 <b class="fa fa-angle-down"></b>
                                                                     </div>                                                                                             
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                    <div class="caption inner_caption">
                                                                        <span class="caption-subject bold uppercase font-green-haze"> All Visitors</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                            	 <div id="visitor_OverAllGraph" class="chart" style="height: 500px; overflow: hidden; text-align: left;"></div>
                                                             </div>                                                                                                                   
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">
                                                            	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                        <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitOverAll">
                                                                                Report Dimensions <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu1</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu2</span>
                                                                                  </a>
                                                                             </li>                        
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-2</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent" id="getid"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu3</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu4</span>
                                                                                  </a>
                                                                             </li>  
                                                                             <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-2</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent" id="getid"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu5</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu6</span>
                                                                                  </a>
                                                                             </li>                                          
                                                                         </ul>
                                                             		</div>
                                                             	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                       <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitOverAll">
                                                                                Report Metrices <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu reportVisitOverAll">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent" id="getid"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu11</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu12</span>
                                                                                  </a>
                                                                             </li>                                          
                                                                         </ul>
                                                             		</div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="table-scrollable">
                                                                    <table class="table table-striped table-hover">
                                                                        <thead>
                                                                            <tr id="reportVisitOverAll">
                                                                                <th>Heading1</th>
                                                                                <th>Heading1</th>                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>     
                                            </div>
                                       	<!--END Overall visitors Tab-1-->
                                        <!--BEGIN Section-Visitors Tab-2-->
                                        	 <div id="section_visitors" class="tab-pane">
                                             	<div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">
                                                            	<div class="col-lg-6 col-md-6 col-sm-6">
                                                                	<div id="reportrange2" class="btn default daterange_backcolor reportrange">
                                                                    	<i class="fa fa-calendar"></i>
                                                                        &nbsp;<span></span>
                                                                        <b class="fa fa-angle-down"></b>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                	<div class="caption inner_caption">
                                                                    	<span class="caption-subject bold uppercase font-green-haze">Section Visitors</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                            	<div id="visitor_SectionGraph" class="chart" style="height: 400px; overflow: hidden; text-align: left;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">
                                                            	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                        <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitSection">
                                                                                Report Dimensions <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu reportVisitOverAll">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu1</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu2</span>
                                                                                  </a>
                                                                             </li>                                                        
                                                                         </ul>
                                                             		</div>
                                                             	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                       <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitSection">
                                                                                Report Metrices <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu reportVisitOverAll">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent" id="getid"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu11</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu12</span>
                                                                                  </a>
                                                                             </li>                                          
                                                                         </ul>
                                                             		</div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="table-scrollable">
                                                                    <table class="table table-striped table-hover">
                                                                        <thead>
                                                                            <tr id="reportVisitSection">
                                                                                <th>Heading1</th>
                                                                                <th>Heading1</th>                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                             </div>
                                        <!--END Section-Visitors Tab-2-->
                                        <!--BEGIN Product-Visitors Tab-3-->
                                        	<div id="product_visitors" class="tab-pane">
                                            	<div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">
                                                             
                                                            	<div class="col-lg-4 col-md-4 col-sm-4">
                                                                	<div id="reportrange3" class="btn default daterange_backcolor reportrange">
                                                                    	<i class="fa fa-calendar"></i>
                                                                        &nbsp;<span></span>
                                                                        <i class="fa fa-angle-down"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-sm-3">
                                                                	<div class="dropdown">
                                                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                                                        	All Products <i class="fa fa-angle-down"></i></button>
                                                                            <ul class="dropdown-menu scrollable-menu" id="menuSlide">
                                                                            	<li><input type="checkbox" class="checkAllClass" value="allSelect">Select ALL</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product1">Product-1</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product2">Product-2</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product3">Product-3</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product4">Product-4</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product3">Product-3</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product4">Product-4</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product3">Product-3</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product4">Product-4</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product3">Product-3</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product4">Product-4</li>
                                                                                <li><input type="checkbox" class="checkBoxClass" value="product4">Product-4</li>
                                                                            </ul>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-sm-3">
                                                               
                                                                	<div class="dropdown variantClass">
                                                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                                                        	Variants <i class="fa fa-angle-down"></i></button>
                                                                            
                                                                            <ul class="dropdown-menu scrollable-menu" id="menuSlide">
                                                                            	<li><input type="checkbox" class="checkboxAllClass" value="allSelect">Select ALL</li>
                                                                                <li><input type="checkbox" class="checkAllSubClass parentClass" value="yes">Product-1
                                                                                	<ul style="list-style:none;">
                                                                                    	<li><input type="checkbox" name="demo" class="childClass" value="variant1">Variant-1</li>
                                                                                        <li><input type="checkbox" name="demo" class="childClass" value="variant2">Variant-2</li>
                                                                                        <li><input type="checkbox" name="demo" class="childClass" value="variant2">Variant-3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                 <li><input type="checkbox" class="checkAllSubClass" value="product1" id="as2">Product-2
                                                                                	<ul style="list-style:none;">
                                                                                    	<li><input type="checkbox" class="checkAllSubClass" value="variant1" parent="as2">Variant-1</li>
                                                                                        <li><input type="checkbox" class="checkAllSubClass" value="variant1" parent="as2">Variant-2</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>                                                                      
                                                                        </button>
                                                                    </div>
                                                                 
                                                                </div>
                                                                 <div class="col-lg-2 col-md-2 col-sm-2">
                                                                	<div class="caption inner_caption">
                                                                    	<span class="caption-subject bold uppercase font-green-haze">Product Visitors</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                            	<div id="visitor_ProductGraph" class="chart" style="height: 400px; overflow: hidden; text-align: left;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">
                                                            	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                        <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitProduct">
                                                                                Report Dimensions <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu1</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu2</span>
                                                                                  </a>
                                                                             </li>                        
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-2</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent" id="getid"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu11</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu12</span>
                                                                                  </a>
                                                                             </li>  
                                                                             <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-2</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent" id="getid"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu3</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu4</span>
                                                                                  </a>
                                                                             </li>                                          
                                                                         </ul>
                                                             		</div>
                                                             	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                       <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitProduct">
                                                                                Report Metrices <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu reportVisitOverAll">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent" id="getid"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu5</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu6</span>
                                                                                  </a>
                                                                             </li>                                          
                                                                         </ul>
                                                             		</div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="table-scrollable">
                                                                    <table class="table table-striped table-hover">
                                                                        <thead>
                                                                            <tr id="reportVisitProduct">
                                                                                <th>Heading1</th>
                                                                                <th>Heading1</th>                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        <!--END Product-Visitors Tab-3-->                                         
                                        <!--BEGIN Location-Visitors Tab-4-->
                                        	<div id="location_visitors" class="tab-pane">
                                            	<div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">
                                                            	<div class="col-lg-6 col-md-6 col-sm-6">
                                                                	<div id="reportrange4" class="btn default daterange_backcolor reportrange">
                                                                    	<i class="fa fa-calendar"></i>
                                                                        &nbsp;<span></span>
                                                                        <i class="fa fa-angle-down"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                	<div class="caption inner_caption">
                                                                    	<span class="caption-subject bold uppercase font-green-haze">Location Visitors</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                            	<div id="visitor_LocationGraph" class="chart" style="height: 500px; overflow: hidden; text-align: left;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">
                                                            	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                        <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitLocation">
                                                                                Report Dimensions <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu report_locationVisitor">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu1</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu2</span>
                                                                                  </a>
                                                                             </li>                                                        
                                                                         </ul>
                                                             		</div>
                                                             	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                       <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitLocation">
                                                                                Report Metrices <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu report_locationVisitor">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent" id="getid"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu11</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu12</span>
                                                                                  </a>
                                                                             </li>                                          
                                                                         </ul>
                                                             		</div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="table-scrollable">
                                                                    <table class="table table-striped table-hover report_locationVisitor_Table">
                                                                        <thead>
                                                                            <tr id="reportVisitLocation">
                                                                                <th>Heading1</th>
                                                                                <th>Heading1</th>                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        <!--END Location-Visitors Tab-4-->
                                        <!--BEGIN Age-group-Visitors Tab-5-->
                                        	<div id="age_visitors" class="tab-pane">
                                            	<div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">
                                                            	<div class="col-lg-6 col-md-6 col-sm-6">
                                                                	<div id="reportrange4" class="btn default daterange_backcolor reportrange">
                                                                    	<i class="fa fa-calendar"></i>
                                                                        &nbsp;<span></span>
                                                                        <i class="fa fa-angle-down"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                                	<div class="caption inner_caption">
                                                                    	<span class="caption-subject bold uppercase font-green-haze">Age-Group Visitors</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                            	<div id="visitor_ageGraph" class="chart" style="height: 500px; overflow: hidden; text-align: left;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                	<div class="col-lg-12 col-md-12 col-sm-12">
                                                    	<div class="portlet light bordered">
                                                        	<div class="portlet-title">
                                                            	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                        <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitAge">
                                                                                Report Dimensions <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu report_ageVisitor">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu1</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu2</span>
                                                                                  </a>
                                                                             </li>                                                        
                                                                         </ul>
                                                             		</div>
                                                             	<div class="col-lg-3 col-md-3 col-sm-3 dropdown">
                                                                       <a class="btn green dropdown-toggle reportBtn" data-toggle="dropdown" rel="#reportVisitAge">
                                                                                Report Metrices <i class="caret"></i>
                                                                         </a>
                                                                        <ul class="dropdown-menu scrollable-menu report_ageVisitor">
                                                                            <li><a class="mainTitle disabled">
                                                                                    <span>Menu-Title-1</span>
                                                                                </a>
                                                                            </li>                                                                              
                                                                             <li class="menuContent" id="getid"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu3</span>
                                                                                  </a>
                                                                             </li>  
                                                                              <li class="menuContent"><a href="javascript:;">
                                                                             		<span class="keyword">ColumnMenu4</span>
                                                                                  </a>
                                                                             </li>                                          
                                                                         </ul>
                                                             		</div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="table-scrollable">
                                                                    <table class="table table-striped table-hover">
                                                                        <thead>
                                                                            <tr id="reportVisitAge">
                                                                                <th>Heading1</th>
                                                                                <th>Heading1</th>                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        <!--END Age-group-Visitors Tab-5-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>