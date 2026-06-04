
					<div class="col-md-4 col-sm-5" id="rightSidebar">
             <div class="right_bar">

                      <!-- beting slip  -->

                        <div class="beting_slip">
                          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <h3 style="margin: 0;">
                              <i class="fa fa-list-ul" style="margin-right: 8px; color: #1a3f72;"></i>Betslip
                            </h3>
                            <span class="clear" style="cursor: pointer; color: #d9534f; font-weight: 600; font-size: 12px;">
                              <i class="fa fa-trash"></i> CLEAR
                            </span>
                          </div>

                          <div id="betslip-container" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; border-radius: 8px; background: #f9fbfc;">
                              <!-- Betslip items will be added here dynamically -->
                              <div style="padding: 30px 20px; text-align: center; color: #999;">
                                <i class="fa fa-inbox" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
                                <p style="margin: 0; font-size: 13px;">No selections yet<br/>Click odds to add bets</p>
                              </div>
                          </div>
                          
                          <div class="bat_place_section" style="background: #fff; border-top: 1px solid #ddd; border-radius: 0 0 8px 8px; padding: 15px;">
                             <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                               <span id="bet-type-display" style="font-weight: 600; color: #333; font-size: 13px;">
                                 <i class="fa fa-check-circle" style="color: #1a3f72; margin-right: 5px;"></i>Single
                               </span>
                               <span style="color: #666; font-size: 12px;">
                                 <span id="selection-count">0</span> selections
                               </span>
                             </div>
                             
                             <div style="background: #f0f4f8; padding: 12px; border-radius: 6px; margin-bottom: 12px; border-left: 3px solid #1a3f72;">
                               <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 8px;">
                                 <span style="color: #666;">Total Odds:</span>
                                 <strong id="total-odds" style="color: #1a3f72; font-size: 14px;">0.00×</strong>
                               </div>
                               <div style="display: flex; justify-content: space-between; font-size: 12px;">
                                 <span style="color: #666;">Potential Win:</span>
                                 <strong id="potential-win" style="color: #27ae60;">$0.00</strong>
                               </div>
                             </div>

                             <div style="margin-bottom: 10px;">
                               <input type="text" id="stake-amount" placeholder="Enter stake amount ($)" class="form-control" style="border: 1px solid #ddd; padding: 10px; border-radius: 4px; font-size: 13px;">
                             </div>
                             
                             <a href="javascript:void(0);" class="bet_place" style="display: block; width: 100%; padding: 12px; background: linear-gradient(135deg, #1a3f72 0%, #0f2a48 100%); color: #fff; text-align: center; border-radius: 4px; font-weight: 600; text-decoration: none; transition: all 0.2s; margin-bottom: 8px;">
                               <i class="fa fa-check"></i> Place Bet
                             </a>
                             <select class="privacy form-control" style="border: 1px solid #ddd; padding: 8px; border-radius: 4px; font-size: 12px;">
                                <option>Public</option>
                                <option selected>Private</option>
                             </select>
                          </div>

                          <div class="betPlace_show" style="display:none; background: #fff; border-radius: 8px; padding: 20px; text-align: center; margin-top: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <i class="fa fa-check-circle" style="font-size: 48px; color: #27ae60; margin-bottom: 10px; display: block;"></i>
                            <h4 style="margin: 10px 0; color: #333;">Bet Placed!</h4>
                            <p style="margin: 0 0 15px; font-size: 13px; color: #666;">Your betslip has been added to<br/> your active bets</p>
                            <a class="Got_section" href="javascript:void(0);" style="display: inline-block; padding: 8px 16px; background: #1a3f72; color: #fff; text-decoration: none; border-radius: 4px; font-weight: 600;">Got it!</a>
                          </div>

                        </div>

                      <!-- beting slip end -->


                      <!-- Recommended  slip start -->
                       <div class="betingslip_main betingtab">
                           <ul class="nav nav-tabs " role="tablist">
                                <li role="presentation" class="active"><a href="#plays" aria-controls="plays" role="tab" data-toggle="tab">Recommended plays </a></li>
                                <li role="presentation"><a href="#betters" aria-controls="betters" role="tab" data-toggle="tab">Recommended Betters </a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="plays">
                                  <div class="plays_bet_wrap">
                                   
                                   <div class="place_bet">
                                     <div class="place_bet_img">
                                       <img src="{{asset('assets/front_end/images/football_color.png')}}">
                                     </div>
                                     <div class="place_bet_content">
                                      <h4>Javentus  <b>@1,45</b>  <span>matchday - 20th September</span></h4>
                                      <p>Matchodds 1x2</p>
                                      <p>Juventus vs AIK</p>
                                      <a href="#">Place bet</a>
                                     </div>
                                   </div>

                                   <div class="place_bet">
                                     <div class="place_bet_img">
                                       <img src="{{asset('assets/front_end/images/basketball_color.png')}}">
                                     </div>
                                     <div class="place_bet_content">
                                      <h4>Cavaliers <b>@1,45</b>  <span>matchday - 20th September</span></h4>
                                      <p>Matchodds 1x2</p>
                                      <p>Juventus vs AIK</p>
                                      <a href="#">Place bet</a>
                                     </div>
                                   </div>

                                   <div class="place_bet">
                                     <div class="place_bet_img">
                                       <img src="{{asset('assets/front_end/images/boxing_color.png')}}">
                                     </div>
                                     <div class="place_bet_content">
                                      <h4>Javentus  <b>@1,45</b>  <span>matchday - 20th September</span></h4>
                                      <p>mayweather  1x2</p>
                                      <p>Juventus vs AIK</p>
                                      <a href="#">Place bet</a>
                                     </div>
                                   </div>

                                  </div> 
                                </div>
                                <div role="tabpanel" class="tab-pane" id="betters">
                                   <div class="betters_bet_wrap">
                                    <div class="place_bet">
                                     <div class="place_bet_img">
                                       <img src="{{asset('assets/front_end/images/football_color.png')}}">
                                     </div>
                                     <div class="place_bet_content">
                                      <h4>Javentus  <b>@1,45</b>  <span>matchday - 20th September</span></h4>
                                      <p>Matchodds 1x2</p>
                                      <p>Juventus vs AIK</p>
                                      <a href="#">Place bet</a>
                                     </div>
                                   </div>

                                   <div class="place_bet">
                                     <div class="place_bet_img">
                                       <img src="{{asset('assets/front_end/images/basketball_color.png')}}">
                                     </div>
                                     <div class="place_bet_content">
                                      <h4>Cavaliers <b>@1,45</b>  <span>matchday - 20th September</span></h4>
                                      <p>Matchodds 1x2</p>
                                      <p>Juventus vs AIK</p>
                                      <a href="#">Place bet</a>
                                     </div>
                                   </div>

                                   <div class="place_bet">
                                     <div class="place_bet_img">
                                       <img src="{{asset('assets/front_end/images/boxing_color.png')}}">
                                     </div>
                                     <div class="place_bet_content">
                                      <h4>Javentus  <b>@1,45</b>  <span>matchday - 20th September</span></h4>
                                      <p>mayweather  1x2</p>
                                      <p>Juventus vs AIK</p>
                                      <a href="#">Place bet</a>
                                     </div>
                                   </div>
                                   </div>
                                </div>
                            </div>    
                       </div>
                       <!-- Recommended slip start -->


                       <!-- following section start -->


                        <div class="bestoffer_wrap">
                           <h3>Best Offer</h3>
                           <div class="offer_section">
                             <img src="{{asset('assets/front_end/images/offer1.png')}}">
                             <a href="">Explore</a>
                             <div class="clearfix"></div> 
                           </div>
                           <div class="offer_section">
                             <img src="{{asset('assets/front_end/images/offer2.png')}}">
                             <a href="">Explore</a>
                             <div class="clearfix"></div> 
                           </div>
                           <div class="offer_section">
                             <img src="{{asset('assets/front_end/images/offer3.png')}}">
                             <a href="">Explore</a>
                             <div class="clearfix"></div> 
                           </div>


                        </div>



                       <!-- following section start -->


              </div>
             </div>

            