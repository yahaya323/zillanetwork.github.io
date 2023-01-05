	<aside class="sidebar static">
										<div class="central-meta">
									<div class="editing-interest">
														<h5 class="f-title"><i class="ti-bell"></i>All Notifications </h5>
										<div class="notification-box">
											<ul>
												<?php 
													$id = $_SESSION['sign-in'];
												$user_result = mysqli_query($con, "SELECT * FROM fusers WHERE id ='$id'");
												while($row = mysqli_fetch_array($user_result)){
													$Note_id = $row['Updates']; 
												
												?>
												<?php if($Note_id == 0){ ?>
												<li>
													<div class="notifi-meta">
														<p>Please complete your profile, as it is very essential.
															<br>Go to <a href="settings"><i class="fa fa-cog"></i> Settings</a> and complete it !</p>
													</div>
													<i class="del fa fa-close"></i>
												</li>
													<?php }else{?>
														<li>
													<div class="notifi-meta">
														<p>No Any Notification now ): !</p>
													</div>
												</li>
											<?php } }?>
											</ul>
										</div>
										</div>
									</div>
								</aside>