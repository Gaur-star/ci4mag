<aside class='main-sidebar sidebar-dark-primary elevation-4'>
  <a href="" class="brand-link">
    <img src="<?= base_url(); ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <?php $uri = service('uri');
  // echo $uri->getSegment(3);die;
  ?>
  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
          <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link <?= $uri->getSegment(2,'dashboard') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= ($uri->getSegment(2) == 'posts' || $uri->getSegment(2) == 'addPost' || $uri->getSegment(2) == 'category' || $uri->getSegment(2) == 'trash' || $uri->getSegment(3) == 'post_edit') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-paperclip"></i>
            <p>
              Posts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/posts'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'posts' || $uri->getSegment(3) == 'post_edit') ? "active" : "" ?>" id="s_all_post">
                <i class="far fa-circle nav-icon"></i>
                <p>All Posts</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/addPost'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'addPost') ? "active" : "" ?>" id="s_new_post" >
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/category'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'category') ? "active" : "" ?>" id="s_cat">
                <i class="far fa-circle nav-icon"></i>
                <p>Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/trash'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'trash') ? "active" : "" ?>" id="s_trush">
                <i class="far fa-circle nav-icon"></i>
                <p>View Trash</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="<?= base_url('admin/media'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'media') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-images"></i>
            <p>
              Media

              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= ($uri->getSegment(2) == 'page' || $uri->getSegment(2) == 'new_page' || $uri->getSegment(2) == 'pageEdit') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-sticky-note"></i>
            <p>
              Pages
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/page'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'page') ? "active" : "" ?>" id="s_all_page">
                <i class="far fa-circle nav-icon"></i>
                <p>All Pages</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/new_page'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'new_page') ? "active" : "" ?>" id="s_new_page">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New Page</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item has-treeview <?= ($uri->getSegment(3) == 'addCampaign' || $uri->getSegment(2) == 'matico') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= ($uri->getSegment(3) == 'addCampaign' || $uri->getSegment(2) == 'matico') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-sticky-note"></i>
            <p>
              Matico
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/matico'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'matico' && $uri->getSegment(3) == '') ? "active" : "" ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>All Campaign</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/matico/addCampaign'); ?>" class="nav-link <?= ($uri->getSegment(3) == 'addCampaign') ? "active" : "" ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Campaign</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item has-treeview <?= ($uri->getSegment(2) == 'userlist' || $uri->getSegment(2) == 'user' || $uri->getSegment(2) == 'profile' || $uri->getSegment(3) == 'user_edit_process') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= ($uri->getSegment(2) == 'userlist' || $uri->getSegment(2) == 'user' || $uri->getSegment(2) == 'profile' || $uri->getSegment(3) == 'user_edit_process') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Users
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php //if (!in_array("userlist", $this->role)) { ?>
              <li class="nav-item">
                <a href="<?= base_url('admin/userlist'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'userlist'|| $uri->getSegment(3) == 'user_edit') ? "active" : "" ?>" id="s_user">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
            
            <?php //if (!in_array("userlist", $this->role)) { ?>
              <li class="nav-item">
                <a href="<?= base_url('admin/user'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'user') ? "active" : "" ?>" id="s_new_user">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            <?php //} ?>
            <li class="nav-item">
              <a href="<?= base_url('admin/profile'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'profile') ? "active" : "" ?>" id="s_profile">
                <i class="far fa-circle nav-icon"></i>
                <p>Your Profile</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview <?= ($uri->getSegment(3) == 'menupage')? "active" : "" ?>">
          <a href="#" class="nav-link <?= ($uri->getSegment(3) == 'menupage')? "active" : "" ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Appearance
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/admin/menupage'); ?>" class="nav-link <?= ($uri->getSegment(3) == 'menupage') ? "active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Menu</p>
                </a>
              </li>

          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= base_url('admin/settings'); ?>" class="nav-link <?= ($uri->getSegment(2) == 'settings') ? 'active' : ''; ?>" id="s_setting">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
              Setting
              <i class="right fas fa-angle-left1"></i>
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= base_url('admin/admin/importpage'); ?>" class="nav-link <?= ($uri->getSegment(3) == 'importpage') ? 'active' : ''; ?>">
            <!-- <i class="nav-icon fas fa-wrench"></i> -->
            <i class="nav-icon fas fa-file-import"></i>
            <p>
              Import
              <i class="right fas fa-angle-left1"></i>
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= base_url('admin/logout'); ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
              <i class="right fas fa-angle-left1"></i>
            </p>
          </a>
        </li>
        <!-- <li class="nav-item has-treeview">
          <a href="</?php echo base_url('admin/adsence'); ?>" class="nav-link">
            <i class="nav-icon fas fa-paperclip"></i>
            <p>
              Adsence
              <i class="right fas fa-angle-left1"></i>
            </p>
          </a>
        </li> -->
        <!-- <li class="nav-item has-treeview">
          <a href="</?php echo base_url('admin/user_comment'); ?>" class="nav-link">
            <i class="nav-icon fas fa-paperclip"></i>
            <p>
              User Comment
              <i class="right fas fa-angle-left1"></i>
            </p>
          </a>
        </li> -->

      </ul>
    </nav>

  </div>

</aside>
<script>

// function add_post_preview()
//   {
   
//     var title = 'Untitled';
   
//     var seo_url = 'untitled';


//     var visibility = 'h';
//     //////////////////////////////////
//     const date = new Date();
//     var d = date.getDate();
//     var month = date.getMonth()+1;
//     if(month.toString().length<2)
//     {
//       var m = '0'+month;
//     }
//     var y = date.getFullYear();

//     var hour = date.getHours();
//     var minute = date.getMinutes();
//     var seconds = date.getSeconds();
//     /////////////////////////////////
//      var date_= y+'-'+m+'-'+d;
//      var time_ = hour+':'+minute+':'+seconds;
//      var update_date = date_;
//      var nofollow = 0;
//      var seo_url_no = 0;
//      var post_parent = 0;
//      $.ajax({
//        url:'</?php echo base_url()."/admin/addPost";?>',
//        type:'post',
//        data:{title:title,seo_url:seo_url,visibility:visibility,date_:date_,time_:time_,update_date:update_date,nofollow:nofollow,seo_url_no:seo_url_no,post_parent:post_parent},
//        success:function(response)
//        {
//          console.log(response);
//        }
//      });
//    // console.log(post_parent);
//   }
  
</script>