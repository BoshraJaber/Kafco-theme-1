<?php


add_action( 'wp_enqueue_scripts', 'kafco_shortcode_styles');
function kafco_shortcode_styles() {
wp_enqueue_style( 'kacfo-css', get_template_directory_uri() . '/assets/css/kafco.css', array());
}
add_action( 'wp_enqueue_scripts', 'kafco_fancybox_styles');
function kafco_fancybox_styles() {
wp_enqueue_style( 'kacfo-fancybox-css', get_template_directory_uri() . '/assets/css/fancybox.min.css', array());
}
add_action( 'wp_enqueue_scripts', 'kafco_light_box_styles');
function kafco_light_box_styles() {
wp_enqueue_style( 'kacfo-light-box-css', get_template_directory_uri() . '/assets/css/light-box.css', array());
}

add_action( 'wp_enqueue_scripts', 'kafco_fancybox_scripts' );
function kafco_fancybox_scripts() {
    // Enqueue the JavaScript file
    wp_enqueue_script( 'kacfo-js', get_template_directory_uri() . '/assets/js/fancybox.min.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'kafco_light_box_scripts' );
function kafco_light_box_scripts() {
    // Enqueue the JavaScript file
    wp_enqueue_script( 'kacfo-lightbox-js', get_template_directory_uri() . '/assets/js/light-box.js', array('jquery'), '1.0', true );
}

// testing


function latest_news_shortcode(){
	ob_start();
        $current_language = pll_current_language();
        $args = array(
            'post_type'      => 'news',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 8,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title',     
       );
        $latest_news_data = new WP_Query($args);
        ?>
       <div class="news_container">
       
         <?php if ($latest_news_data->have_posts()) {
            while ($latest_news_data->have_posts()) {
                $latest_news_data->the_post();
				$news_title = get_field( "news_title" );
				$news_date = get_field( "news_date" );
				$news_short_description =  get_field( "news_short_description" );
				$news_full_description =  get_field( "news_full_description" );
				$news_gallery = get_field( "news_gallery" );
				$pagelink=  get_permalink(get_the_ID());  
				?>
				<div class="news_box">
						<div class="news_img">
							<img src="https://dummyimage.com/300x400/23800e/ffffff" alt="img_name">
						</div>
						<div class="news_details">
								<div class="news_date"><?php echo $news_date;?></div>
								<div class="news_title"><?php echo $news_title;?></div>
								<div class="news_short_description"><?php echo $news_short_description;?></div>
								<div class="read_more">
									<a href="<?php echo $pagelink;?>">Read More <span>
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"></path>
										</svg></span>
									</a>
								</div>
						</div>
				</div>
				<?php
               
			}
		 }?>
		</div>
        
        <?php
return ob_get_clean();
}
add_shortcode('show_latest_news','latest_news_shortcode');


function latest_news__detail_shortcode(){
	ob_start();
        $current_language = pll_current_language();
        $args = array(
            'post_type'      => 'news',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 8,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title',     
       );
        $latest_news_data = new WP_Query($args);
        ?>
       <div class="news_container">
       
         <?php if ($latest_news_data->have_posts()) {
            while ($latest_news_data->have_posts()) {
                $latest_news_data->the_post();
				$news_title = get_field( "news_title" );
				$news_date = get_field( "news_date" );
				$news_short_description =  get_field( "news_short_description" );
				$news_full_description =  get_field( "news_full_description" );
				$news_gallery = get_field( "news_gallery" );
				?>
				<div class="news_box">
						<div class="news_img">
							<img src="https://dummyimage.com/300x400/23800e/ffffff" alt="img_name">
						</div>
						<div class="news_details">
								<div class="news_date"><?php echo $news_date;?></div>
								<div class="news_title"><?php echo $news_title;?></div>
								<div class="news_short_description"><?php echo $news_short_description;?></div>
								<div class="read_more">
									<a href="">Read More <span>
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"></path>
										</svg></span>
									</a>
								</div>
						</div>
				</div>
				<?php
               
			}
		 }?>
		</div>
        
        <?php
return ob_get_clean();
}
add_shortcode('news_detail_shortcode','latest_news__detail_shortcode');


// Awards Shortcode 

function awards_shortcode(){
	ob_start();
        $current_language = pll_current_language();
        $args = array(
            'post_type'      => 'awards',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 5,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title',     
       );
        $latest_news_data = new WP_Query($args);
        ?>
       <div class="awards-cards">
       
         <?php if ($latest_news_data->have_posts()) {
            while ($latest_news_data->have_posts()) {
                $latest_news_data->the_post();
				$award_title = get_field( "award_name" );
				$award_date = get_field( "news_date" );
				$award_short_description =  get_field( "award_short_title" );
				$award_full_description =  get_field( "award_description" );
				$award_gallery = get_field( "news_gallery" );
				$logoimg = get_the_post_thumbnail_url(get_the_ID(),'full');                    
				if($logoimg=="")
				{
					$logoimg ="https://dummyimage.com/180x100/000/fff";
				}
				?>
				<div class="awards-card">
						<div class="award_img">
							<img src="<?php echo $logoimg;?>" alt="img_name">
						</div>
						<div class="award_details">
								<p><?php echo $award_short_description;?></p>
								<div class="read_more">
									<a href="#"><span>
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"></path>
										</svg></span>
									</a>
								</div>
						</div>
				</div>
				<?php
               
			}
		 }?>
		</div>
        
		 <div class="readmore_section">
				 <a href="#" class=" btn btn--dark-blue border--transparent">Read more</a>
		 </div>

        <?php
return ob_get_clean();
}
add_shortcode('show_awards','awards_shortcode');



// gallery Shortcode 

function kafco_gallery_shortcode(){
	ob_start();
        $current_language = pll_current_language();
        $args = array(
            'post_type'      => 'gallery',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 5,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title',     
       );
        $latest_news_data = new WP_Query($args);
        ?>
       <div class="media-gallery">
       
         <?php if ($latest_news_data->have_posts()) {
            while ($latest_news_data->have_posts()) {
                $latest_news_data->the_post();
				$gallery_title = get_field( "gallery_name" );
				$coverimg = get_the_post_thumbnail_url(get_the_ID(),'full');
				$pagelink=  get_permalink(get_the_ID());                
				if($coverimg=="")
				{
					$coverimg ="https://dummyimage.com/440x400/000/fff";
				}
				$album_images = get_field('images', get_the_ID());
				//$imgcount = count($album_images);
			   if(!empty($album_images)){
				 $imgcount = count($album_images);
			   }
				 $album_publish_date = get_field('gallery_publish_date');
				 $publish_full_date = '';

					if($album_publish_date){
						$album_publish_date = str_replace('/', '-', $album_publish_date);
						$date_format = date_create($album_publish_date);                            
						$day = date_format($date_format,"d");
						$month = date_format($date_format,"F");
						$year = date_format($date_format,"Y");
						$publish_full_date = $day.'-'.$month.'-'.$year;					 
					}    
				?>
						<a href="<?php echo $pagelink;?>" data-aos="fade-up">
							<div class="photo-box">
								<div class="gallery_img">
									<img src="<?php echo $coverimg;?>" alt="<?php echo $gallery_title;?>">
									<div class="photo-info">
											<h6><span><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiB4PSIwIiB5PSIwIiB2aWV3Qm94PSIwIDAgMjQgMjQiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIGQ9Ik02LjI1IDE5LjVhMy43NDQgMy43NDQgMCAwIDEtMy41NDItMi41NTFsLS4wMzUtLjExNUEzLjY0OCAzLjY0OCAwIDAgMSAyLjUgMTUuNzVWOC45MzJMLjA3NCAxNy4wM2EyLjI3MSAyLjI3MSAwIDAgMCAxLjU5MiAyLjc1NWwxNS40NjMgNC4xNDFjLjE5My4wNS4zODYuMDc0LjU3Ni4wNzQuOTk2IDAgMS45MDYtLjY2MSAyLjE2MS0xLjYzNWwuOTAxLTIuODY1ek05IDljMS4xMDMgMCAyLS44OTcgMi0ycy0uODk3LTItMi0yLTIgLjg5Ny0yIDIgLjg5NyAyIDIgMnoiIGZpbGw9IiNmZmZmZmYiIG9wYWNpdHk9IjEiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCBkPSJNMjEuNSAyaC0xNUEyLjUwMyAyLjUwMyAwIDAgMCA0IDQuNXYxMUM0IDE2Ljg3OCA1LjEyMiAxOCA2LjUgMThoMTVjMS4zNzggMCAyLjUtMS4xMjIgMi41LTIuNXYtMTFDMjQgMy4xMjIgMjIuODc4IDIgMjEuNSAyem0tMTUgMmgxNWEuNS41IDAgMCAxIC41LjV2Ny4wOTlsLTMuMTU5LTMuNjg2YTEuNzkxIDEuNzkxIDAgMCAwLTEuMzQxLS42MTUgMS43NDkgMS43NDkgMCAwIDAtMS4zMzYuNjMxbC0zLjcxNCA0LjQ1OC0xLjIxLTEuMjA3YTEuNzU1IDEuNzU1IDAgMCAwLTIuNDggMEw2IDEzLjkzOVY0LjVhLjUuNSAwIDAgMSAuNS0uNXoiIGZpbGw9IiNmZmZmZmYiIG9wYWNpdHk9IjEiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+" /></span><?php echo $imgcount;?> <span class="en_view"> Photos</span><span class="ar_view">الصور</span></h6>
										<span class="pub-date"><?php echo $publish_full_date;?></span>
									</div>
								</div>
								<div class="gallery_name">
									<p class="album_name"><?php echo $gallery_title;?></p>
									<p>
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"></path>
										</svg>
									</p>

								</div>
							</div>
                    </a>
				<?php
               
			}
		 }?>
		</div>
        

        <?php
return ob_get_clean();
}
add_shortcode('show_gallery','kafco_gallery_shortcode');






// Video Shortcode 

function kafco_video_gallery_shortcode(){
	ob_start();
        $current_language = pll_current_language();
        $args = array(
            'post_type'      => 'Videos',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 5,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title',     
       );
        $latest_video_data = new WP_Query($args);
        ?>
       <div class="media-gallery">
       
         <?php if ($latest_video_data->have_posts()) {
            while ($latest_video_data->have_posts()) {
                $latest_video_data->the_post();
				$video_title = get_field( "video_name" );
				$video_url = get_field( "video_url" );
				$coverimg = get_the_post_thumbnail_url(get_the_ID(),'full');  

				if($coverimg=="")
				{
					$coverimg ="https://dummyimage.com/440x400/000/fff";
				}
			  
				 $album_publish_date = get_field('video_publish_date');

				 $publish_full_date = '';

					if($album_publish_date){
						$album_publish_date = str_replace('/', '-', $album_publish_date);
						$date_format = date_create($album_publish_date);                            
						$day = date_format($date_format,"d");
						$month = date_format($date_format,"F");
						$year = date_format($date_format,"Y");
						$publish_full_date = $day.'-'.$month.'-'.$year;					 
					}    
				?>
						<a href="<?php echo $video_url;?>" data-fancybox="images" class="video-thumbnail">
							<div class="photo-box">
								<div class="gallery_img">
									<video src="<?php echo $video_url;?>" poster="<?php echo $coverimg;?>"></video>
									<img src="<?php echo $coverimg;?>" alt="<?php echo $video_title;?>">
									<div class="photo-info">
											<p class="play_icon"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiB4PSIwIiB5PSIwIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGc+PHBhdGggZD0iTTI1NiAwQzExNC42MTcgMCAwIDExNC42MTUgMCAyNTZzMTE0LjYxNyAyNTYgMjU2IDI1NiAyNTYtMTE0LjYxNSAyNTYtMjU2UzM5Ny4zODMgMCAyNTYgMHptODguNDggMjY5LjU3LTEyOCA4MGExNi4wMDggMTYuMDA4IDAgMCAxLTE2LjIzOC40MjJBMTUuOTk0IDE1Ljk5NCAwIDAgMSAxOTIgMzM2VjE3NmMwLTUuODIgMy4xNTYtMTEuMTcyIDguMjQyLTEzLjk5MmExNS45NTcgMTUuOTU3IDAgMCAxIDE2LjIzOC40MjJsMTI4IDgwYzQuNjc2IDIuOTMgNy41MiA4LjA1NSA3LjUyIDEzLjU3cy0yLjg0NCAxMC42NDEtNy41MiAxMy41N3oiIGZpbGw9IiNmZmZmZmYiIG9wYWNpdHk9IjEiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+" /></p>
										<span class="pub-date"><?php echo $publish_full_date;?></span>
									</div>
								</div>
								<div class="gallery_name">
									<p class="album_name"><?php echo $video_title;?></p>
								</div>
							</div>
                    </a>
				<?php
               
			}
		 }?>
		</div>
        

        <?php
return ob_get_clean();
}
add_shortcode('show_video_gallery','kafco_video_gallery_shortcode');





// Board Members Shortcode 

function board_members_shortcode(){
	ob_start();
        $current_language = pll_current_language();
        $args = array(
            'post_type'      => 'members',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 5,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title', 
			'member_type' => 'board-members',    
       );
        $latest_news_data = new WP_Query($args);
        ?>
		 <div class="small_heading">
				 <h2 class="">Board Member</h2>
		 </div>
       <div class="member_container">
       
         <?php if ($latest_news_data->have_posts()) {
            while ($latest_news_data->have_posts()) {
                $latest_news_data->the_post();
				$person_name = get_field( "name" );
				$person_designation = get_field( "designation" );
				$personimg = get_the_post_thumbnail_url(get_the_ID(),'full');                    
				if($personimg=="")
				{
					$personimg ="https://dummyimage.com/200x200/000/fff";
				}
				?>
				<div class="member_section">
						<div class="member_card">
							<img src="<?php echo $personimg;?>" alt="img_name">						
							<div class="member_details">
								<h3> <?php echo $person_name;?></h3>
								<p> <?php echo $person_designation;?></p>
							</div>
						</div>
				</div>
				<?php
               
			}
		 }?>
		</div>
        
		

        <?php
return ob_get_clean();
}
add_shortcode('show_board_members','board_members_shortcode');




// Board Members Shortcode 

function management_shortcode(){
	
	ob_start();
	
        $current_language = pll_current_language();
        $args = array(
            'post_type'      => 'members',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 5,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title', 
			'member_type' => 'general-manager-office',    
       );
        $members_data = new WP_Query($args);
        ?>
		 <div class="small_heading">
				 <h2>Management</h2>
		 </div>
		 <div class="section_heading">
		 	<h4>General Manager Office</h4>
		 </div>
		
       <div class="member_container">
       
         <?php if ($members_data->have_posts()) {
            while ($members_data->have_posts()) {
                $members_data->the_post();
				$person_name = get_field( "name" );
				$person_designation = get_field( "designation" );
				$personimg = get_the_post_thumbnail_url(get_the_ID(),'full');                    
				if($personimg=="")
				{
					$personimg ="https://dummyimage.com/310x390/000/fff";
				}
				?>
				<div class="member_section">
						<div class="member_card">
							<img src="<?php echo $personimg;?>" alt="img_name">						
							<div class="member_details">
								<h3> <?php echo $person_name;?></h3>
								<p> <?php echo $person_designation;?></p>
							</div>
						</div>
				</div>
				<?php
               
			}
		 }?>
		</div> 
		<!-- end General Manager Office code  -->

		<div class="section_heading">
		 	<h4>Finance admin and support services</h4>
		 </div>
		
		 <?php 
		 $args = array(
            'post_type'      => 'members',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 5,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title', 
			'member_type' => 'finance-admin-and-support-services',    
       );
        $members_data2 = new WP_Query($args);
        ?>
		<div class="member_container">
       
	   <?php if ($members_data2->have_posts()) {
		  while ($members_data2->have_posts()) {
			  $members_data2->the_post();
			  $person_name = get_field( "name" );
			  $person_designation = get_field( "designation" );
			  $personimg = get_the_post_thumbnail_url(get_the_ID(),'full');                    
			  if($personimg=="")
			  {
				  $personimg ="https://dummyimage.com/200x200/000/fff";
			  }
			  ?>
			  <div class="member_section">
					  <div class="member_card">
						  <img src="<?php echo $personimg;?>" alt="img_name">						
						  <div class="member_details">
							  <h3> <?php echo $person_name;?></h3>
							  <p> <?php echo $person_designation;?></p>
						  </div>
					  </div>
			  </div>
			  <?php
			 
		  }
	   }?>
	  </div>
	  <!--End Finance admin and support services  -->

	  
		<div class="section_heading">
		 	<h4>Operations Maintenance and technical services</h4>
		 </div>
		
		 <?php 
		 $args = array(
            'post_type'      => 'members',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 5,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title', 
			'member_type' => 'operations-maintenance-and-technical-services',    
       );
        $members_data3 = new WP_Query($args);
        ?>
		<div class="member_container">
       
	   <?php if ($members_data3->have_posts()) {
		  while ($members_data3->have_posts()) {
			  $members_data3->the_post();
			  $person_name = get_field( "name" );
			  $person_designation = get_field( "designation" );
			  $personimg = get_the_post_thumbnail_url(get_the_ID(),'full');                    
			  if($personimg=="")
			  {
				  $personimg ="https://dummyimage.com/200x200/000/fff";
			  }
			  ?>
			  <div class="member_section">
					  <div class="member_card">
						  <img src="<?php echo $personimg;?>" alt="img_name">						
						  <div class="member_details">
							  <h3> <?php echo $person_name;?></h3>
							  <p> <?php echo $person_designation;?></p>
						  </div>
					  </div>
			  </div>
			  <?php
			 
		  }
	   }?>
	  </div>
	  <!-- End Operations Maintenance and technical services  -->

		

        <?php
return ob_get_clean();
}
add_shortcode('show_management','management_shortcode');




// Awards & Certificates Shortcode 

function awards_certificates_shortcode(){
	ob_start();
        $current_language = pll_current_language();
        $args = array(
            'post_type'      => 'awards',           // Your custom post type name
            'post_status'    => 'publish',   
            'posts_per_page' => 5,
			'showposts' => -1,
            'lang'           => $current_language,
            'order' => 'ASC',
            'orderby' => 'title',     
       );
        $award_data = new WP_Query($args);
        ?>
       <div class="awards-cards inner-cards">
       
         <?php if ($award_data->have_posts()) {
			$id_number = 0;
			 
            while ($award_data->have_posts()) {
                $award_data->the_post();
				$award_title = get_field( "award_name" );
				$award_date = get_field( "news_date" );
				$award_short_description =  get_field( "award_short_title" );
				$award_full_description =  get_field( "award_description" );
				$award_gallery = get_field( "gallery" );
				$logoimg = get_the_post_thumbnail_url(get_the_ID(),'full');                    
				if($logoimg=="")
				{
					$logoimg ="https://dummyimage.com/180x100/000/fff";
				}
				
				?>
					<a class="awards-card" href="#award-<?php echo $id_number;?>">
						<div class="award_img">
							<img src="<?php echo $logoimg;?>" alt="img_name">
						</div>
						<div class="award_details">
							<p><?php echo $award_title;?></p>
							<div class="read_more"><span>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"></path>
								</svg></span>
							</div>
						</div>
					</a>					
				<?php
				$id_number++;
			   
			}
			
		 }?>
		</div>



		<div class="awards_full_container">
		<?php 
		$id_number = 0;
		while ($award_data->have_posts()) {
			$award_data->the_post();
			$award_title = get_field("award_name");
			$award_short_description = get_field("award_short_title");
			$award_full_description = get_field("award_description");
			$award_gallery = get_field("gallery");
			$logoimg = get_the_post_thumbnail_url(get_the_ID(),'full');                    
			if($logoimg == ""){
				$logoimg = "https://dummyimage.com/180x100/000/fff";
			}
			?>
			<div class="awards_box" id="award-<?php echo $id_number; ?>">
				<div class="award_header">			
					<div class="award_detail_section">
							<h6>Award</h6>
							<h2><?php echo $award_title; ?></h2>
							<h4><?php echo $award_short_description; ?></h4>
							<p><?php echo $award_full_description; ?></p>
						</div>
						<div class="award_logo_section">
							<img src="<?php echo $logoimg; ?>" alt="img_name">
						</div>
					</div>
				<div class="award_gallery_section">
					<?php if($award_gallery): ?>
						<div class="award_gallery">
							<?php foreach( $award_gallery as $image ): ?>								
								<a class="award_gallery_item" data-fancybox="images" >
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php
			$id_number++;
		} ?>
	</div>
	<?php

	return ob_get_clean();
}
add_shortcode('show_awards_certificates','awards_certificates_shortcode');