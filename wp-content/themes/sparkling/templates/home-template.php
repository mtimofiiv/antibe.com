<?php
/**
 * Template Name: Homepage
 */
get_header('home');
?>
<div class="screen-sm-min"></div>
<div class="screen-md-min"></div>

<div id="modal-window" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-red">

				</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<div class="section-home">
	<div class="container">
		<a name="home" id="home"></a>
		<h1>GetSmart Solutions</h1>
	</div>

	<div class="tagline">
		<div class="container">
			<p>We are a multi-service consulting agency made up of a group of highly experienced professionals, here to advise on and implement on your most complex projects. Formerly Antibe Resources Ltd, we have expanded our service offering and team, to help serve our clients better.</p>
		</div>
	</div>

</div>
<div class="section-team">
	<a name="team" id="team"></a>
	<div class="section-marker">
		<div class="container">
			<h2 class="section-title">
				Dave &amp; the Team
			</h2>
		</div>
	</div>

	<div class="container">
		<p class="announce text-red">We are a network of highly experienced professionals covering a wide-range of roles, who are matched to each project based on its needs. Our primary team is built from a group of people who have many years of previous experience working together on diverse projects and who all believe in delivering excellence through collaboration and trust.</p>
	</div>
	<div class="container">
		<div class="profile-img-wrapper align-center-xs col-md-2 col-sm-3">
			<div class="profile-img center-block">
				<img class="img-responsive" src="<?php echo get_template_directory_uri() . '/img/dave.jpg'; ?>" alt="">
			</div>
		</div>
		<div class="col-md-10 col-sm-9">
			<h4 class="heading-small large-text-xs align-left-sm align-center-xs text-red">
				Dave Rogers, <br class="hide-sm"><span class="grey-xs red-sm">President</span>
			</h4>
			<p class="align-left-sm align-center-xs">
				Dave has over 30 years of professional engineering and consulting experience spanning a wide range of industries, including Public Sector, Health, Education, Energy Resources and Travel, with companies such as Coopers &amp; Lybrand, PricewaterhouseCoopers and IBM. His focus on quality assurance, delivery excellence and global delivery have earned him the reputation as a trusted Executive Advisor for both service providers and their clients. Through GetSmart Solutions he is seeking to continue working on his passion of large-scale project delivery by building a network of trusted and experienced colleagues whom he can support in their career and personal growth.
			</p>
		</div>
	</div>
	<div id="specialist-container" class="container half-sphere-container relative">
		<?php $all_staff = get_staff_by_all_terms(); ?>
		<?php $counter = 1; ?>

		<?php foreach($all_staff as $staff_members) : ?>

			<?php $list_id = 'staff-list-' . $staff_members['term']->term_id; ?>
			<div class="staff-container align-center-xs sphere-el">
				<h3 id="specialty-<?php echo $counter; ?>" class="staff-specialty bg-color text-red">
					<a href="#<?php echo $list_id; ?>" class="no-click open-modal" data-toggle="collapse" aria-expanded="false" aria-controls="<?php echo $list_id; ?>"><?php echo $staff_members['term']->name; ?> <i class="fa fa-external-link"></i></a>
				</h3>
				<p class="description hide-md show-xs">
					<?php echo $staff_members['term']->description; ?>
				</p>
				<ul id="<?php echo $list_id; ?>" class="staff-list reset collapse">
					<?php foreach( $staff_members['staff'] as $staff ) : ?>

						<li class="profile-container">
							<div class="profile-img">
								<?php echo get_staff_img($staff->ID); ?>
							</div>
							<p>
								<strong><?php echo $staff->post_title; ?></strong>
							</p>
							<p><?php echo $staff->post_content; ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<?php $counter++; ?>
		<?php endforeach; ?>
		<div class="align-center-xs hug-bottom center-sphere hide-xs block-md">
			<i class="fa fa-users circle-border fs-45 bg-color"></i>
		</div>

	</div>

</div>

<div class="section-services clearfix">
	<a name="services" id="services"></a>
	<div class="section-marker">
		<div class="container">
			<h2 class="section-title">
				Services
			</h2>
		</div>

	</div>
	<div class="contain text-red">
		<p class="announce-big">GetSmart specializes in providing experienced people who are experienced in:</p>

		<ul class="services-array clearfix">
			<div class="col-sm-6">
				<li class="col-sm-6 col first">
					<h3 class="bebas">Strategy &amp; Change Implementation</h3>
					<div class="v-keyline"></div>
					<div class="graphic">&#xf085;</div>
					<div class="v-keyline"></div>
					<p>We work with organizations to develop a strategy to achieve their goals and focus and define their needs for required projects. We specialize in organizational transformation, process improvement and change management and communications.</p>
				</li>
				<li class="col-sm-6 col">
					<h3>Full life cycle project delivery</h3>
					<div class="v-keyline"></div>
					<div class="graphic">&#xf0e8;</div>
					<div class="v-keyline"></div>
					<p>From concept to delivery, we produce high quality work at every step of the project life cycle, including planning, development, testing and deployment.</p>
				</li>
			</div>
			<div class="col-sm-6">
				<li class="col-sm-6 col">
					<h3>Package &amp; systems implementation</h3>
					<div class="v-keyline"></div>
					<div class="graphic">&#xf12e;</div>
					<div class="v-keyline"></div>
					<p>We work with you to determine the best option for your needs and develop or configure the right software system. Our experienced team of architects, specialists and developers ensure quality customized systems.</p>
				</li>
				<li class="col-sm-6 col">
					<h3>Quality Assurance &amp; <br> Testing</h3>
					<div class="v-keyline"></div>
					<div class="graphic">&#xf0e7;</div>
					<div class="v-keyline"></div>
					<p>With a focus on quality assurance we recognize and ensure that appropriate testing and reviews are conducted at all stages of a project lifecycle.</p>
				</li>
			</div>
		</ul>
		<div class="clear"></div>
	</div>
</div>

<div class="section-join">
	<a name="join" id="join"></a>
	<div class="section-marker">
		<div class="container">
			<h2 class="section-title">Join Us</h2>
		</div>
	</div>
	<div class="contain text-red">
		<p class="announce">Our vision is not only to deliver excellence to our clients, but also to provide an environment for skilled, experienced professionals to work together in a flexible environment on large-scale, exciting projects.</p>

		<ul class="two-column">

			<li>
				<h3>What do we have to offer you?</h3>

				<div class="graphic">&#xf084;</div>

				<p>We seek opportunities to work for large service providers or client organizations</p>

				<p>We create a group of people who are willing to help and support each other in a flexible work environment</p>

				<p>We provide a reasonable revenue to practitioners while working on challenging yet enjoyable projects</p>
			</li>

			<li>
				<h3>Why we are different</h3>

				<div class="graphic">&#xf0c0;</div>

				<p>We trust each other not only to deliver in a professional manner but also trust each other to ask for help or advice when needed</p>
				<p>We seek opportunities that allow individuals to meet their desired work/life balance</p>
				<p>We are passionate and bring a level of team spirit to every engagement</p>
			</li>

		</ul>

		<div class="clear"></div>

		<p class="announce">We are always interested in meeting like-minded, experienced professionals who are looking to do project-based work as part of a passionate and skilled team. We believe in collaboration and excellence as part of every project.</p>
	</div>
</div>

<div class="section-contact">
	<a name="contact" id="contact"></a>
	<div class="section-marker">
		<div class="container">
			<h2 class="section-title">Contact Us</h2>
		</div>
	</div>
	<div class="contain text-red">
		<p class="announce-big">If you are a a service provider or client organization looking for project delivery support, or if you are a contractor looking for exciting work opportunities, please contact us at:</p>

		<a href="mailto:info@getsmartsolutions.ca" class="big-link-btn"><i>&#xf003;</i> info@getsmartsolutions.ca</a>
		<a href="http://www.linkedin.com/company/getsmart-solutions" class="big-link-btn"><i>&#xf0e1;</i> /company/getsmart-solutions</a>

		<div style="height: 250px;"></div>

	</div>
</div>


<?php get_footer('home'); ?>
