  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left info">
          <p><?php echo $_SESSION['name'] ?></p>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>


        <?php
        $menu=$db_conn->query("SELECT a.id as id, a.title_en as title_en, a.urls_en as urls_en, a.icon as icon
          FROM dbmmenuadmin a, dbmmenulevel b, dbmusers c
          where a.id = b.menu_id and b.level_user = c.id and c.level_user = '$leveluser' and a.published = '1' and a.parent_id='0' order by position");
        while($datamenu=$menu->fetch_array())  {
          $submenu_id = $datamenu['id'];
          $submenu=$db_conn->query("SELECT a.id as id, a.title_en as title_en, a.urls_en as urls_en, a.icon as icon
            FROM dbmmenuadmin a, dbmmenulevel b, dbmusers c
            where a.id = b.menu_id and b.level_user = c.id and c.level_user = '$leveluser' and a.published='1' and a.parent_id='$submenu_id' order by position");
          $numsubmenu = $submenu->num_rows;
          if ($numsubmenu == 0) {
                  echo'
        <li>
          <a href="'.$datamenu['urls_en'].'">
            <i class="'.$datamenu['icon'].'"></i> <span>'.$datamenu['title_en'].'</span>
          </a>
        </li>';

        } else {
                  echo '

        <li class="('.$datamenu['id'].' == '.$_GET['mid'].')?"active treeview":"treeview";">
          <a href="'.$datamenu['urls_en'].'">
            <i class="'.$datamenu['icon'].'"></i> <span>'.$datamenu['title_en'].'</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">';
            while($datasubmenu=$submenu->fetch_array())  { 
                  echo'
            <li class="('.$datasubmenu['id'].' == '.$_GET['smid'].')?"active":"";">
            <a href="'.$datasubmenu['urls_en'].'"><i class="fa fa-circle-o"></i> '.$datasubmenu['title_en'].'</a></li>';}
                  echo '
          </ul>
        </li>
        ';
              }
            }
        ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>