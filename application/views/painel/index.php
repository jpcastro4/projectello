<!-- Start Contain Section -->
    <div class="main-content">
      <div class="page-header">
        <div class="header-left-panel">
          <!-- Title Page -->
          <h1 class="page-title">Profile</h1>
          <!-- Breadcrumb Section -->
          <ol class="breadcrumb">
            <li><a href="../dashboard_v1.html">Home</a></li>
            <li class="text-info">General Pages</li>
            <li class="active">Profile</li>
          </ol>
        </div>
      </div>
      <div class="page-content container-fluid page">
        <div class="row">
          <div class="col-md-8">
            <!-- Start Profile Tab Section -->
            <div class="nav-tabs nav-tabs-animate border-profile">
              <ul class="nav nav-tabs nav-profile">
                <li role="presentation" class="active"><a data-toggle="tab" href="#profiles" aria-controls="profiles" role="tab">Profile</a></li>
                <li class="" role="presentation"><a data-toggle="tab" href="#activities" aria-controls="activities" role="tab">Activities <span class="badge badge-danger count-activity">5</span></a></li>
              </ul>
              <div class="tab-content padding-top-0">
                <div class="tab-pane active" id="profiles" role="tabpanel">
                  <div class="panel top-profile">
                    <div class="profile-bottom">
                      <div class="name-profile">Munaro Jacob</div>
                      <div class="post-profile">Project Manager</div>
                    </div>
                    <div class="profile-image"><img src="<?php base_url()?>assets/bo/assets/images/blog/img_890x593.jpeg" alt="profile image" /></div>
                    <div class="col-md-12">
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="twitter-box">
                          <div class="text-tweet text-info">Likes</div>
                          <span class="icon_like social-icon-profile text-info" aria-hidden="true"></span>
                          <div class="follower-tweet">1400</div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="twitter-box">
                          <div class="text-tweet text-info">Share</div>
                          <span class="social_share social-icon-profile text-info" aria-hidden="true"></span>
                          <div class="follower-tweet">1487</div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="twitter-box">
                          <div class="text-tweet text-info">Tweets</div>
                          <span class="social_twitter social-icon-profile text-info" aria-hidden="true"></span>
                          <div class="follower-tweet">1799</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel top-profile skill-profile">
                    <div class="panel-body">
                      <!-- Start Skill Section -->
                      <h4 class="list-title">Entradas</h4>
                      <div class="row">

                      <?php $usuarios =  $this->painel_model->usuariosContas();

                        if( $usuarios != false): 

                        foreach($usuarios as $usuario ): ?>
                        
                        <div class="col-lg-4 col-sm-4 col-xs-6 box-userlist">
                          <div class="row">
                            <div class="col-lg-4 col-sm-12 col-xs-12">
                              <img class="img-size" src="<?php echo base_url()?>assets/bo/assets/images/global/img_240x265.png" alt="user image">
                            </div>
                            <div class="col-lg-8 col-sm-12 col-xs-12">
                              <div class="user-details">
                                <h4><?php echo $usuario->login ?></h4>
                                <p>Status</p>
                                <div class="btn-userlist">
                                  <button type="button" class="btn btn-sm btn-flat waves-effect waves-light btn-view" data-target="#view-modal" data-toggle="modal" <?php if($usuario->block == 1){ echo 'btn-danger';}?>" name="idUser" value="<?php echo $usuario->id ?>" > <?php if($usuario->block == 1){ echo 'Bloqueado';}else{ echo 'Acessar';}?> </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      <?php endforeach;
                       else: ?>
                        <p class="alert alert-info">Você não tem logins ativos</p>
                      <?php endif;?>

                      </div>
                      <!-- End Skill Section -->
                    </div>
                  </div>
                  <div class="panel top-profile skill-profile margin-bottom-25">
                    <div class="panel-body">
                      <!-- Start Personal Information Section -->
                      <h4 class="list-title">Personal Information</h4>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="first-name-profile">
                            <span class="text-name-profile text-info">Name : </span>
                            <span class="detail-profile">Munaro Jacob</span>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="first-name-profile">
                            <span class="text-name-profile text-info">Address : </span>
                            <span class="detail-profile">4109 HT Amsterdam, Saifi District, USA</span>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="first-name-profile">
                            <span class="text-name-profile text-info">Phone No : </span>
                            <span class="detail-profile">123 456 7890</span>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="first-name-profile profile-email">
                            <span class="text-name-profile text-info">Email : </span>
                            <span class="detail-profile">munaro@example.com</span>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="first-name-profile padding-0">
                            <span class="text-name-profile text-info">Post : </span>
                            <span class="detail-profile">Project Manager</span>
                          </div>
                        </div>
                      </div>
                      <!-- End Personal Information Section -->
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="activities" role="tabpanel">
                  <!-- Start Activities Section -->
                  <ul class="list-group">
                    <li class="bottom-box-footer comment-profile">
                      <div class="media media-lg">
                        <div class="media-left">
                          <a class="profile-pic small-profile-pic" href="#">
                          <img class="img-responsive" src="<?php base_url()?>assets/bo/assets/images/blog/img_890x593.jpeg" alt="profile image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="title-post">
                            <h4 class="media-heading">Tirzah Jacob<span>posted a new blog</span></h4>
                          </div>
                          <div class="dis">
                            <div class="media mobile-media">
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="row">
                                  <img class="pic-uploaded padding-right-15" src="<?php base_url()?>assets/bo/assets/images/profile/img_400x266.png" alt="image">
                                </div>
                              </div>
                              <div class="media-body">
                                <h4 class="media-heading">Getting Started</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscingelit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                              </div>
                            </div>
                          </div>
                          <div class="post-time">active 10 minutes ago</div>
                        </div>
                      </div>
                    </li>
                    <li class="bottom-box-footer comment-profile">
                      <div class="media">
                        <div class="media-left">
                          <a class="profile-pic small-profile-pic" href="#">
                          <img class="img-responsive" src="<?php base_url()?>assets/bo/assets/images/blog/img_890x593.jpeg" alt="profile image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="title-post">
                            <h4 class="media-heading">Tirzah Jacob<span>posted a new blog</span></h4>
                          </div>
                          <div class="dis">“Check if it can be corrected with overflow : hidden”</div>
                          <div class="post-time">active 10 minutes ago</div>
                        </div>
                      </div>
                    </li>
                    <li class="bottom-box-footer comment-profile">
                      <div class="media">
                        <div class="media-left">
                          <a class="profile-pic small-profile-pic" href="#">
                          <img class="img-responsive" src="<?php base_url()?>assets/bo/assets/images/profile/img_400x266.png" alt="post image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="title-post">
                            <h4 class="media-heading">Tirzah Jacob<span>posted a 2 image blog</span></h4>
                          </div>
                          <div class="row dis">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <img class="pic-uploaded" src="<?php base_url()?>assets/bo/assets/images/profile/img_400x266.png" alt="post image">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <img class="pic-uploaded" src="<?php base_url()?>assets/bo/assets/images/profile/img_400x266.png" alt="post image">
                            </div>
                          </div>
                          <div class="post-time">active 10 minutes ago</div>
                        </div>
                      </div>
                    </li>
                    <li class="bottom-box-footer comment-profile">
                      <div class="media">
                        <div class="media-left">
                          <a class="profile-pic small-profile-pic" href="#">
                          <img class="img-responsive" src="<?php base_url()?>assets/bo/assets/images/blog/img_890x593.jpeg" alt="profile image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="title-post">
                            <h4 class="media-heading">Tirzah Jacob<span>posted a new blog</span></h4>
                          </div>
                          <div class="dis">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa.</div>
                          <div class="post-time">active 10 minutes ago</div>
                        </div>
                      </div>
                    </li>
                    <li class="bottom-box-footer comment-profile">
                      <div class="media">
                        <div class="media-left">
                          <a class="profile-pic small-profile-pic" href="#">
                          <img class="img-responsive" src="<?php base_url()?>assets/bo/assets/images/blog/img_890x593.jpeg" alt="profile image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="title-post">
                            <h4 class="media-heading">Tirzah Jacob<span>posted a new blog</span></h4>
                          </div>
                          <div class="dis">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus</div>
                          <div class="post-time">active 10 minutes ago</div>
                        </div>
                      </div>
                    </li>
                    <li class="bottom-box-footer comment-profile">
                      <div class="media">
                        <div class="media-left">
                          <a class="profile-pic small-profile-pic" href="#">
                          <img class="img-responsive" src="<?php base_url()?>assets/bo/assets/images/blog/img_890x593.jpeg" alt="profile image">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="title-post">
                            <h4 class="media-heading">Tirzah Jacob<span>posted a new blog</span></h4>
                          </div>
                          <div class="dis">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</div>
                          <div class="post-time">active 10 minutes ago</div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <!-- End Activities Section -->
                  <a class="btn btn-block btn-info readmore readmore-profile" href="javascript:void(0)" role="button">Show more</a>
                </div>
              </div>
            </div>
            <!--  End Profile Tab Section -->
          </div>
          <div class="col-md-4">
            <div class="right-box-profile">
              <h4 class="skill-title">Achievements</h4>
              <div class="panel">
                <div class="panel-body">
                  <!-- Start Education Section -->
                  <h4 class="list-title">Education</h4>
                  <div class="master-degree">
                    <span class="degree-name text-info">Master of philosophy in computer science</span>
                    <div class="univer-profile">Slippery rock university of pennsylvania, USA</div>
                    <div class="univer-profile">USA, july 2005 through May 2010</div>
                  </div>
                  <div class="master-degree">
                    <span class="degree-name text-info">Bachelor of science in computer science</span>
                    <div class="univer-profile">Slippery rock university of pennsylvania, USA</div>
                    <div class="univer-profile">USA, July 2001 through May 2004</div>
                  </div>
                  <!-- End Education Section -->
                </div>
              </div>
              <div class="panel">
                <div class="panel-body">
                  <!-- Start Experience Section -->
                  <h4 class="list-title">Experience</h4>
                  <div class="master-degree">
                    <span class="degree-name text-info">Proit inc.</span>
                    <div class="univer-profile">2010-2013</div>
                    <div class="univer-profile">Web designer/developer</div>
                  </div>
                  <div class="master-degree">
                    <span class="degree-name text-info">Rockland inc.</span>
                    <div class="univer-profile">2013-Present</div>
                    <div class="univer-profile">SR. Web designer/developer</div>
                  </div>
                  <!-- End Experience Section -->
                </div>
              </div>
              <div class="panel">
                <div class="panel-body">
                  <!-- Start Accomplishments Section -->
                  <h4 class="list-title">Accomplishments</h4>
                  <div class="master-degree">
                    <span class="degree-name text-info">Shopping cart wordpress template</span>
                    <div class="univer-profile">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum gravida nisi ut sagittis. Phasellus mattis nisl ut ipsum tempus semper. Curabitur dapibus ipsum sed eros cursus, a posuere diam consectetur.</div>
                  </div>
                  <div class="master-degree">
                    <span class="degree-name text-info">Education system template</span>
                    <div class="univer-profile">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum gravida nisi ut sagittis. Phasellus mattis nisl ut ipsum tempus semper. Curabitur dapibus ipsum sed eros cursus, a posuere diam consectetur.</div>
                  </div>
                  <!-- End Accomplishments Section -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Contain Section -->

