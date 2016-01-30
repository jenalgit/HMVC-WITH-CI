  <!--====== Share Product Popup Start ======-->     
    
    
     <?php //trace($res); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Share This Thing</h4>
          </div>
          <div class="modal-body">
            <div class="share-things pop-body">
              <div class="pop-body-top common-new">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 pro-left">
                  <div class="pop-pro-image"> <img src="<?php echo $res['image_path']; ?>" alt=""></div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 pro-left pro-right">
                  <h4><?php echo $res['title_p']; ?> <a href="javascript:;"><span><?php echo $res['collection_title']; ?></span></a></h4>
                  <div class="price"><?php echo $res['currency']; ?> 
                    <?php if($res['sale_price']!=''){?>
                    <del><?php echo $res['price']; ?></del> <?php echo $res['sale_price']; ?>
                    <?php }else{?>
                    <?php echo $res['price']; ?>
                      <?php }?>
                     </div>
                  <p class="link"><?php echo $res['share_url']; ?></p>
                </div>
              </div>
              <div class="pop-body-mid common-new">
                <div class="social-sharing-pop common-new">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pro-left">
                    <ul>
                      <?php $url=$res['share_url'];?>
                     <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url;?>&t=<?php echo $res['title_p'];?>" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/share?url=<?php echo $url;?>&text=<?php echo $res['title_p'];?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url;?>&title=<?php echo $res['title_p'];?>&source=<?php echo $url;?>" target="_blank" ><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://plus.google.com/share?url=<?php echo $url;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://pinterest.com/pin/create/button/?url=<?php echo $url;?>&media=<?php echo $res['image_path'];?>" target="_blank" ><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $url;?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="http://www.stumbleupon.com/submit?url=<?php echo $url;?>&title=<?php echo $res['title_p'];?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                          <!--   <li><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
                              <li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-yelp"></i></a></li> -->
                      <a href="javascript:;" class="last"><i class="fa fa-caret-right"></i></a>
                    </ul>
                  </div>
                </div>
               


                <div class="share-common common-new reviews_css ">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pro-left">
                    <span id="share_thanks_msg"></span>
                    <div class="tabbing-panel">

                      <ul class="nav">
                        <li class="active"><a href="#sendto" data-toggle="tab">Send To</a> <span class="indicator indicator-reviews"></span></li>
                        <li><a href="#product_embed" data-toggle="tab">Embed</a> <span class="indicator indicator-faq"></span></li>
                        <!-- <li><a href="#product_anywhere" data-toggle="tab">99bazaars Anywhere</a> <span class="indicator indicator-faq"></span></li> -->
                      </ul>
                    </div>
                  </div>
                  <div class="tab-content">
                    <div class="common-new tab-pane fade active in" id="sendto">
                      <ul>
                        <li>
                          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pro-left">To</div>
                         <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 pro-right input-box">
                                  <div class="btn-group"> <a href="javascript:;" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">On Friend's Email<b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu">
                                     <!--  <li class="active"><a href="javascript:;" class="own-wall">On your own wall</a> </li> -->
                                      <li class="active"><a href="javascript:;" data-text="Friend's Name">On Friend's Email</a> </li>
                                      <!-- <li><a href="javascript:;" data-text="Followers">To Followers</a> </li> -->
                                      <!-- <li><a href="javascript:;" data-text="Community Name">In a community</a> </li> -->
                                    </ul>
                                  </div>
                                  <input type="text" placeholder="Friend's Email" name="data_value" id="data_value">
                                </div>
                        </li>
                       <li>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pro-left">Subject</div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 pro-right tag-box">
                                  <input type="text" placeholder="subject" name="subject" id="subject">
                                </div>
                              </li>
                          <li>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 pro-left">Message</div>
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 pro-right">
                                  <textarea name="message" placeholder="Write a Message" id="message"></textarea>
                                </div>
                              </li>
                      </ul>
                        <div class="common-new">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <a class="button btn-color" id="share_send_pro">Send</a>
                                <a class="button btn-green" id="share_cancel_pro" >Reset</a>
                              </div>
                            </div>
                    </div>
                    <div class="common-new widget-contents tab-pane fade" id="product_embed">
                            <ul>
                              <li>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                  <label>Widget size</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                  <input type="text" placeholder="width" name="width" id="width"  onkeyup="getCustomValue(this);" >
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                  <input type="text" placeholder="height" name="height" id="height"  onkeyup="getCustomValue(this);" >
                                </div>
                              </li>
                              <!-- <li>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                  <label>Contents</label>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6">
                                  <input type="checkbox" name="">
                                  Title </div>
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6">
                                  <input type="checkbox" name="">
                                  Price </div>
                              </li> 
                              <li>
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6">
                                  <input type="checkbox" name="">
                                  Username </div>
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6">
                                  <input type="checkbox" name="">
                                  99bazaars it </div>
                              </li>-->
                              <li>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                  <p>Add this to your website by copying the code below.</p>
                                  <textarea id="custom_textarea"> <iframe src="<?php echo $url;?>" width="200" height="259" allowtransparency="true"  frameborder="0" style="width:200px;height:259px;margin:0 auto;border:0" ></iframe>
</textarea>
                                </div>
                              </li>
                            </ul>
                          </div>
                          
                    <div class="common-new tab-pane fade" id="product_anywhere">
                      <ul>
                        <li>
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <p> Fancy Anywhere enables your visitors to buy things on Fancy directly from your own blogs and websites. You will earn Fancy credits when they complete a purchase. For more information. </p>
                            <textarea><a href="http://fancy.to/0g7lok?ref=priyarai6483"&gt;&lt;img src="" width="" height="" class="" alt=""></a></textarea>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>




              </div>
            </div>
          </div>
  