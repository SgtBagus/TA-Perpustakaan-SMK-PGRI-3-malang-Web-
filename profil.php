<?php $page="PROFIL"; ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('script/head_script.php') ?>
  <body class="layout layout-header-fixed layout-left-sidebar-fixed">
    <?php include('menu/header.php') ?>
    <div class="site-main">
      <?php include('menu/sidebar.php') ?>

      <div class="site-content">
        <div class="profile">
          <div class="row gutter-sm">
            <div class="col-md-4 col-sm-5">
              <div class="p-about m-b-20">
                <div class="pa-padding">
                  <div class="pa-avatar">
                    <img src="img/avatars/<?php echo $foto_user ?>" alt="Foto Profil" width="100" height="100">
                  </div>
                  <div class="pa-name"><?php echo $username ?>
                    <i class="zmdi zmdi-check-circle text-success m-l-5"></i>
                  </div>
                </div>
              </div>
              <div class="p-info m-b-20">
                <h4 class="m-y-0">Contact info</h4>
                <hr>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-phone"></i>
                  </div>
                  <div class="pii-value">+<?php echo $no_hp?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-email"></i>
                  </div>
                  <div class="pii-value"><?php echo $email ?></div>
                </div>
                <div class="pi-item">
                  <div class="pii-icon">
                    <i class="zmdi zmdi-home"></i>
                  </div>
                  <div class="pii-value">1600 Amphitheatre Parkway, Mountain View, CA 94043, United States</div>
                </div>
              </div>
              <div class="p-skills m-b-20 m-sm-0">
                <h4 class="m-y-0">Current progress</h4>
                <hr>
                <div class="clearfix m-b-5">
                  <small class="pull-left">PHP</small>
                  <small class="pull-right">80%</small>
                </div>
                <div class="progress progress-xs">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80% Complete (success)</span>
                  </div>
                </div>
                <div class="clearfix m-b-5">
                  <small class="pull-left">HTML</small>
                  <small class="pull-right">50%</small>
                </div>
                <div class="progress progress-xs">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">50% Complete (success)</span>
                  </div>
                </div>
                <div class="clearfix m-b-5">
                  <small class="pull-left">JavaScript</small>
                  <small class="pull-right">80%</small>
                </div>
                <div class="progress progress-xs m-b-0">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    <span class="sr-only">60% Complete (success)</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 col-sm-7">
              <div class="p-content">
                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                  <li class="active">
                    <a href="#tab-timeline" data-toggle="tab" role="tab">Tasks <span class="badge badge-primary m-l-5">7</span></a>
                  </li>
                  <li>
                    <a href="#tab-timeline" data-toggle="tab" role="tab">History <span class="badge badge-primary m-l-5">2</span></a>
                  </li>
                  <li>
                    <a href="#tab-timeline" data-toggle="tab" role="tab">Notes</a>
                  </li>
                  <li class="pull-sm-right hidden-xs">
                    <a href="#" data-toggle="tab" role="tab">
                      <i class="zmdi zmdi-chevron-right"></i>
                    </a>
                  </li>
                  <li class="pull-sm-right hidden-xs">
                    <a href="#" data-toggle="tab" role="tab">
                      <i class="zmdi zmdi-chevron-left"></i>
                    </a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab-timeline" role="tabpanel">
                    <div class="clearfix p-y-20 p-x-30">
                      <h4 class="pull-sm-left">Tasks (7)</h4>
                      <button type="button" class="btn btn-outline-primary pull-sm-right">
                        <i class="zmdi zmdi-plus"></i> New task</button>
                    </div>
                    <div class="pc-task">
                      <a href="#">
                        <div class="pct-avatar">
                          <img src="img/avatars/3.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="pct-name">Jonathan Mel
                          <span class="label label-danger m-l-5">new</span>
                        </div>
                        <div class="pct-time">
                          <i class="zmdi zmdi-alarm-check"></i> 17 Jun</div>
                        <div class="pct-text">Nam nisl enim, elementum at dolor quis, pharetra dignissim nisl. Nunc at viverra ex. Phasellus pharetra, leo ut interdum tincidunt, turpis arcu egestas nibh, non ultricies lectus mauris hendrerit diam.</div>
                        <div class="clearfix">
                          <button type="button" class="btn btn-outline-success btn-xs pull-left">
                            <i class="zmdi zmdi-comment-text-alt"></i> Message</button>
                          <button type="button" class="btn btn-default btn-xs pull-right m-l-10">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                          <button type="button" class="btn btn-default btn-xs pull-right">
                            <i class="zmdi zmdi-edit"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                    <div class="pc-task">
                      <a href="#">
                        <div class="pct-avatar">
                          <img src="img/avatars/4.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="pct-name">Landon Graham
                          <span class="label label-info m-l-5">in progress</span>
                        </div>
                        <div class="pct-time">
                          <i class="zmdi zmdi-alarm-check"></i> 14 Jun</div>
                        <div class="pct-text">Nam nisl enim, elementum at dolor quis, pharetra dignissim nisl. Nunc at viverra ex. Phasellus pharetra, leo ut interdum tincidunt, turpis arcu egestas nibh, non ultricies lectus mauris hendrerit diam.</div>
                        <div class="clearfix">
                          <button type="button" class="btn btn-outline-success btn-xs pull-left">
                            <i class="zmdi zmdi-comment-text-alt"></i> Message</button>
                          <button type="button" class="btn btn-default btn-xs pull-right m-l-10">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                          <button type="button" class="btn btn-default btn-xs pull-right">
                            <i class="zmdi zmdi-edit"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                    <div class="pc-task">
                      <a href="#">
                        <div class="pct-avatar">
                          <img src="img/avatars/5.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="pct-name">Ron Carran
                          <span class="label label-success m-l-5">done</span>
                        </div>
                        <div class="pct-time">
                          <i class="zmdi zmdi-alarm-check"></i> 25 Jun</div>
                        <div class="pct-text">Nam nisl enim, elementum at dolor quis, pharetra dignissim nisl. Nunc at viverra ex. Phasellus pharetra, leo ut interdum tincidunt, turpis arcu egestas nibh, non ultricies lectus mauris hendrerit diam.</div>
                        <div class="clearfix">
                          <button type="button" class="btn btn-outline-success btn-xs pull-left">
                            <i class="zmdi zmdi-comment-text-alt"></i> Message</button>
                          <button type="button" class="btn btn-default btn-xs pull-right m-l-10">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                          <button type="button" class="btn btn-default btn-xs pull-right">
                            <i class="zmdi zmdi-edit"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                    <div class="pc-task">
                      <a href="#">
                        <div class="pct-avatar">
                          <img src="img/avatars/6.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="pct-name">Vance Osborn
                          <span class="label label-danger m-l-5">new</span>
                        </div>
                        <div class="pct-time">
                          <i class="zmdi zmdi-alarm-check"></i> 17 Jun</div>
                        <div class="pct-text">Nam nisl enim, elementum at dolor quis, pharetra dignissim nisl. Nunc at viverra ex. Phasellus pharetra, leo ut interdum tincidunt, turpis arcu egestas nibh, non ultricies lectus mauris hendrerit diam.</div>
                        <div class="clearfix">
                          <button type="button" class="btn btn-outline-success btn-xs pull-left">
                            <i class="zmdi zmdi-comment-text-alt"></i> Message</button>
                          <button type="button" class="btn btn-default btn-xs pull-right m-l-10">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                          <button type="button" class="btn btn-default btn-xs pull-right">
                            <i class="zmdi zmdi-edit"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                    <div class="pc-task">
                      <a href="#">
                        <div class="pct-avatar">
                          <img src="img/avatars/7.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="pct-name">Wolfe Stevie
                          <span class="label label-info m-l-5">in progress</span>
                        </div>
                        <div class="pct-time">
                          <i class="zmdi zmdi-alarm-check"></i> 14 Jun</div>
                        <div class="pct-text">Nam nisl enim, elementum at dolor quis, pharetra dignissim nisl. Nunc at viverra ex. Phasellus pharetra, leo ut interdum tincidunt, turpis arcu egestas nibh, non ultricies lectus mauris hendrerit diam.</div>
                        <div class="clearfix">
                          <button type="button" class="btn btn-outline-success btn-xs pull-left">
                            <i class="zmdi zmdi-comment-text-alt"></i> Message</button>
                          <button type="button" class="btn btn-default btn-xs pull-right m-l-10">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                          <button type="button" class="btn btn-default btn-xs pull-right">
                            <i class="zmdi zmdi-edit"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                    <div class="pc-task">
                      <a href="#">
                        <div class="pct-avatar">
                          <img src="img/avatars/8.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="pct-name">Carleton Josiah
                          <span class="label label-success m-l-5">done</span>
                        </div>
                        <div class="pct-time">
                          <i class="zmdi zmdi-alarm-check"></i> 25 Jun</div>
                        <div class="pct-text">Nam nisl enim, elementum at dolor quis, pharetra dignissim nisl. Nunc at viverra ex. Phasellus pharetra, leo ut interdum tincidunt, turpis arcu egestas nibh, non ultricies lectus mauris hendrerit diam.</div>
                        <div class="clearfix">
                          <button type="button" class="btn btn-outline-success btn-xs pull-left">
                            <i class="zmdi zmdi-comment-text-alt"></i> Message</button>
                          <button type="button" class="btn btn-default btn-xs pull-right m-l-10">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                          <button type="button" class="btn btn-default btn-xs pull-right">
                            <i class="zmdi zmdi-edit"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                    <div class="pc-task">
                      <a href="#">
                        <div class="pct-avatar">
                          <img src="img/avatars/9.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="pct-name">Lucius Skyler
                          <span class="label label-danger m-l-5">new</span>
                        </div>
                        <div class="pct-time">
                          <i class="zmdi zmdi-alarm-check"></i> 17 Jun</div>
                        <div class="pct-text">Nam nisl enim, elementum at dolor quis, pharetra dignissim nisl. Nunc at viverra ex. Phasellus pharetra, leo ut interdum tincidunt, turpis arcu egestas nibh, non ultricies lectus mauris hendrerit diam.</div>
                        <div class="clearfix">
                          <button type="button" class="btn btn-outline-success btn-xs pull-left">
                            <i class="zmdi zmdi-comment-text-alt"></i> Message</button>
                          <button type="button" class="btn btn-default btn-xs pull-right m-l-10">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                          <button type="button" class="btn btn-default btn-xs pull-right">
                            <i class="zmdi zmdi-edit"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                    <div class="pc-task">
                      <a href="#">
                        <div class="pct-avatar">
                          <img src="img/avatars/10.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="pct-name">Landon Graham
                          <span class="label label-info m-l-5">in progress</span>
                        </div>
                        <div class="pct-time">
                          <i class="zmdi zmdi-alarm-check"></i> 14 Jun</div>
                        <div class="pct-text">Nam nisl enim, elementum at dolor quis, pharetra dignissim nisl. Nunc at viverra ex. Phasellus pharetra, leo ut interdum tincidunt, turpis arcu egestas nibh, non ultricies lectus mauris hendrerit diam.</div>
                        <div class="clearfix">
                          <button type="button" class="btn btn-outline-success btn-xs pull-left">
                            <i class="zmdi zmdi-comment-text-alt"></i> Message</button>
                          <button type="button" class="btn btn-default btn-xs pull-right m-l-10">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                          <button type="button" class="btn btn-default btn-xs pull-right">
                            <i class="zmdi zmdi-edit"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                    <div class="pc-task">
                      <a href="#">
                        <div class="pct-avatar">
                          <img src="img/avatars/3.jpg" alt="" width="40" height="40">
                        </div>
                        <div class="pct-name">Jonathan Mel
                          <span class="label label-danger m-l-5">new</span>
                        </div>
                        <div class="pct-time">
                          <i class="zmdi zmdi-alarm-check"></i> 17 Jun</div>
                        <div class="pct-text">Nam nisl enim, elementum at dolor quis, pharetra dignissim nisl. Nunc at viverra ex. Phasellus pharetra, leo ut interdum tincidunt, turpis arcu egestas nibh, non ultricies lectus mauris hendrerit diam.</div>
                        <div class="clearfix">
                          <button type="button" class="btn btn-outline-success btn-xs pull-left">
                            <i class="zmdi zmdi-comment-text-alt"></i> Message</button>
                          <button type="button" class="btn btn-default btn-xs pull-right m-l-10">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                          <button type="button" class="btn btn-default btn-xs pull-right">
                            <i class="zmdi zmdi-edit"></i>
                          </button>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('menu/footer.php') ?>
    </div>
  </body>
      <?php include('script/footer_script.php') ?>
</html>
