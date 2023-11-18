<?php

 

?>
  <aside class="main-sidebar">



    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">



      <!-- Sidebar user panel (optional) -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="<?php echo base_url(); ?>assets/img/user.png" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p><?php if($parentHodList[0]->name == ''){ echo "Admin"; }else{ echo $parentHodList[0]->name;} ?></p>

          <!-- Status -->

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>

      </div>



      <!-- search form (Optional) -->

<!--       <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Search...">

              <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                </button>

              </span>

        </div>

      </form> -->

      <!-- /.search form -->



      <!-- Sidebar Menu --> 


        <?php


    if ($parentHodList[0]->user_type == 0 &&  $parentHodList[0]->type == 'superadmin') {
     
   

?>
      <ul class="sidebar-menu">    

         
 

<li class =""><a href="<?php echo base_url(); ?>user"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        
					<li class="treeview">

          				<a href="#">

							<i class="fa fa-cog"></i> <span>Settings</span>

							<span class="pull-right-container">

							  <i class="fa fa-angle-left pull-right"></i>

							</span>

          				</a><ul class="treeview-menu"><li class =""><a href="<?php echo base_url(); ?>user/profile"><i class="fa fa-circle-o"></i>My Profile</a></li>

          					<li class =""><a href="<?php echo base_url(); ?>user/users"><i class="fa fa-circle-o"></i>Manage User</a></li>
                        <li class =""><a href="<?php echo base_url(); ?>user/branch"><i class="fa fa-circle-o"></i>Manage Branch</a></li>
          					<li class =""><a href="<?php echo base_url(); ?>user/role"><i class="fa fa-circle-o"></i>Manage Role</a></li>

                  </ul></li>



				<!-- 	<li class="treeview">

          				<a href="#">

							<i class="fa fa-link"></i> <span>Manage Clients</span>

							<span class="pull-right-container">

							  <i class="fa fa-angle-left pull-right"></i>

							</span>

          				</a><ul class="treeview-menu"><li class =""><a href="<?php echo base_url(); ?>admin/clients"><i class="fa fa-circle-o"></i>Manage Clients</a></li></ul></li> -->

					<li class="treeview">

          				<a href="#">  

							<i class="fa fa-list"></i> <span>Booking Service </span>

							<span class="pull-right-container">

							  <i class="fa fa-angle-left pull-right"></i>

							</span>

          				</a><ul class="treeview-menu"><li class =""><a href="<?php echo base_url(); ?>user/new_booking"><i class="fa fa-circle-o"></i>Booking</a></li><li class =""><a href="<?php echo base_url(); ?>user/booking_list"><i class="fa fa-circle-o"></i>List Booking</a></li></ul></li>
 
				<li class="treeview">
        <a href="#">
							<i class="fa fa-question"></i> <span>Manage Query</span>
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
        </a><ul class="treeview-menu"><li class =""><a href="<?php echo base_url(); ?>user/new_query"><i class="fa fa-circle-o"></i>Add Query</a></li><li class =""><a href="<?php echo base_url(); ?>user/query_list"><i class="fa fa-circle-o"></i>List Query</a></li>
          <!-- <li class =""><a href="<?php echo base_url(); ?>admin/query/complaint"><i class="fa fa-circle-o"></i>List Query Complaint</a></li> -->
        </ul></li>

					<li class="treeview">

          				<a href="#">

							<i class="fa fa-comments"></i> <span>Follow up</span>

							<span class="pull-right-container">

							  <i class="fa fa-angle-left pull-right"></i>

							</span>

          				</a><ul class="treeview-menu"><li class =""><a href="<?php echo base_url(); ?>user/followup"><i class="fa fa-circle-o"></i>List Follow up</a></li></ul></li>

					<li class="treeview">

          				<a href="#">

							<i class="fa fa-inr"></i> <span>Pricing & Consumption</span>

							<span class="pull-right-container">

							  <i class="fa fa-angle-left pull-right"></i>

							</span>

          				</a><ul class="treeview-menu"><li class =""><a href="<?php echo base_url(); ?>user/pricing"><i class="fa fa-circle-o"></i>View Pricing & Consumption</a></li></ul></li>

            <li class="treeview">

                  <a href="#">

              <i class="fa fa-file-text-o"></i> <span>Invoice</span>

              <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

                  </a><ul class="treeview-menu"><li class =""><a href="<?php echo base_url(); ?>user/invoice"><i class="fa fa-file-text-o"></i>New Invoice</a></li>

                    <li class =""><a href="<?php echo base_url(); ?>user/invoice_list"><i class="fa fa-circle-o"></i> Invoice Record</a></li>
                  </ul></li>      

        <li class =""><a href="<?php echo base_url(); ?>user/reporting"><i class="fa fa-search"></i>Reports</a></li>

		  <li class="treeview">

			  <a href="#">

				  <i class="fa fa-file-text-o"></i> <span>Maintainance</span>

				  <span class="pull-right-container">

                <i class="fa fa-angle-left pull-right"></i>

              </span>

			  </a><ul class="treeview-menu"><li class =""><a href="<?php echo base_url(); ?>user/maintainance_history"><i class="fa fa-file-text-o"></i>Maintainance History</a></li>

				  <li class =""><a href="<?php echo base_url(); ?>user/new_maintainance"><i class="fa fa-circle-o"></i> New Appointment</a></li>
			  </ul></li>

	  </ul>

      <?php }

      else {
        
        $uid = $parentHodList[0]->sno;
        $module_details = $CI->my_model->get_table_by_column('user_role','uid',$uid);
        if($module_details){
        $data_all = $module_details[0]->mid;

        $data = explode(',', $data_all);
        $where_m = array('mid'=>$data);
        $orderby1 = array('mid' => 'ASC');

        $all_menu1 =$CI->my_model->get_dynamic_wherein('module',$where_m,$orderby1);
        echo '<ul class="sidebar-menu">';

  
        foreach ($all_menu1 as $row) {
          
          
          ?>

<li class =""><a href="<?php echo base_url().'user/'.$row->url;  ?>"><i class="fa fa-dashboard"></i><?php echo $row->name; ?></a></li>
        

<?php
        }
		}
      }

      ?>
</ul>
      <!-- /.sidebar-menu -->

	       </section>

    <!-- /.sidebar -->

  </aside>
