	<!--=== Header ===-->
	<nav class="one-page-header navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="menu-container page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="#intro">
					<span>City Light</span>Church
					<!-- <img src="assets/img/logo1.png" alt="Logo"> -->
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<div class="menu-container">
					<ul class="nav navbar-nav">
					<?php
						$menu=$db_conn->query("SELECT * FROM dbmmenu where menutype='1' and parent_id='0' and published='1' ORDER BY m_pos ASC");
      				while($datamenu=$menu->fetch_array()) {
      					$submenu=$db_conn->query("SELECT * FROM dbmmenu WHERE menutype='1' and published='1' and parent_id=".$datamenu['id']);
            				$numsubmenu = $submenu->num_rows;
            				if ($numsubmenu == 0) {
            					echo '
            					<li>
            				<a id="menuhome" href="'.$datamenu['urls_en'].'page='.$datamenu['link'].'&pid='.$datamenu['id'].'">'.$datamenu['title_en'].'</a>
            			</li>';
            		} else {
            					echo '
            			<li class="dropdown">
           					<a href="'.$datamenu['urls_en'].'page='.$datamenu['link'].'&pid='.$datamenu['id'].'" class="dropdown-toggle" data-toggle="dropdown">'.$datamenu['title_en'].'</a>
		                      <ul class="dropdown-menu">';
		                        	while($datasubmenu=$submenu->fetch_array())  {
		                        		$nextsubmenu=$db_conn->query("SELECT * FROM dbmmenu WHERE menutype='1' and published='1' and parent_id=".$datasubmenu['id']);
            										$numnextsubmenu = $nextsubmenu->num_rows;
            										if ($numnextsubmenu == 0) {
            											echo '
            									<li>
            										<a id="menuhome" href="'.$datasubmenu['urls_en'].'page='.$datasubmenu['link'].'&pid='.$datamenu['id'].'">'.$datasubmenu['title_en'].'</a>
            								</li>';
            										} else {
            											echo '
            									<li class="dropdown-submenu">
            											<a id="menuhome" href="'.$datasubmenu['urls_en'].'page='.$datasubmenu['link'].'&pid='.$datamenu['id'].'">'.$datasubmenu['title_en'].'</a>
                											<ul class="dropdown-menu">';
                														while($datanextsubmenu=$nextsubmenu->fetch_array())  {
                															echo '
                													<li>
            															<a id="menuhome" href="'.$datanextsubmenu['urls_en'].'page='.$datanextsubmenu['link'].'&pid='.$datamenu['id'].'&id='.$datanextsubmenu['m_pos'].'">'.$datanextsubmenu['title_en'].'</a>
            													</li>';
                														}
                														echo'
		                											</ul>
	                									</li>';
            										}
		                        	}
		                        	echo '
		                      	</ul>
		                    </li>';
            				}
      				}
					?>
					</ul>
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	<!--=== End Header ===-->