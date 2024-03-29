<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<head>
		<title>Campaign HTML Template</title>
		<meta name="Keywords" content=" " />
		<meta name="Description" content=" " />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<!-- CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<!-- The next line calls the font for the headings. Use it like this: "style-fontname.css". Options are bitter, droidsans, droidserif, franchise, museo, nevis, or rokkitt */ -->
		<link rel="stylesheet" type="text/css" href="fonts/style-nevis.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="includes/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
		
		<!-- The Favicon -->
		<link rel="shortcut icon" href="images/favicon.png" />
		
		<!-- START DEMO -->
		<link rel="stylesheet" href="switcher.css" type="text/css" media="screen" />
		
		<!-- END DEMO -->
	</head>
	<!-- options for the body classes are // content_left, content_right // bg_linen, bg_freckles, bg_cork, bg_fabric, bg_pinstripes, bg_none // body_boxed, body_span // scheme_blue, scheme_red, scheme_green, scheme_yellow -->
	<body class="content_left bg_linen body_boxed scheme_blue no_sidebar">
	<!-- START DEMO -->
	<div id="switcher_wrap">
	<div id="switcher"  style="display:none;">
	<div id="title">Options</div>
	<ul>
		<li>
			<strong>Color Scheme</strong>
			<a href="#" onclick="javascript:return false;" class="blue">Blue</a>
			<a href="#" onclick="javascript:return false;" class="red">Red</a>
			<a href="#" onclick="javascript:return false;" class="green">Green</a>
			<a href="#" onclick="javascript:return false;" class="yellow">Yellow</a>
			<div class="clear"></div>
		</li>
		<li>
			<strong>Body Style</strong>
			<a href="#" onclick="javascript:return false;" class="bbox">Boxed</a>
			<a href="#" onclick="javascript:return false;" class="bspan">Full Width</a>
			<div class="clear"></div>
		</li>
		<li class="bgpat">
			<strong>Background</strong>
			<a href="#" onclick="javascript:return false;" class="cork">Cork</a>
			<a href="#" onclick="javascript:return false;" class="fabric">Fabric</a>
			<a href="#" onclick="javascript:return false;" class="freckles">Freckles</a>
			<a href="#" onclick="javascript:return false;" class="linen">Linen</a>
			<a href="#" onclick="javascript:return false;" class="pinstripes">Pinstripes</a>
			<a href="#" onclick="javascript:return false;" class="none">None</a>
			<div class="clear"></div>
		</li>
		<li>
			<strong>Layout</strong>
			<a href="#" style="display:block;" onclick="javascript:return false;" class="cleft">Left</a>
			<a href="#" style="display:block;" onclick="javascript:return false;" class="cright">Right</a>
			<div class="clear"></div>
		</li>
	</ul>
	</div>
	<div id="dc_options_toggle">
			<div id="dc_hide_options"  style="display:none;">Hide Options</div>
			<div id="dc_show_options">Show Options</div>
		</div>
	</div>
	<!-- END DEMO -->

		<div id="main_wrap">
			<div class="wrapper" id="header">
				<div id="pre_header"></div>
				<div class="container">
					<div id="logo_wrap">
						<div id="the_logo">
							<a href="#" title="Campaign" class="left the_logo">
								<img src="images/campaignlogo.png" alt="Campaign" id="logo" />
							</a>
						</div>
						<form method="get" id="searchform" action="#">
							<div>
								<input type="text" class="search_input" value="Search" name="s" id="s" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" />
								<input type="submit" id="searchsubmit" value="Search" />
								<div class="clear"></div>
							</div>
						</form>
						<div class="clear"></div>
					</div>
					<div id="clear"></div>
				</div>
				<div id="main_menu">
					<div class="container">
						<div id="main_menu_wrap">
							<div class="menu-main-container">
								<ul id="menu-main" class="menu">
									<li><a href="index.php">Home</a></li>
									<li><a href="#">Drop Downs +</a>
										<ul class="sub-menu">
											<li><a href="#">Child +</a>
												<ul class="sub-menu">
													<li><a href="#">GrandChild</a></li>
													<li><a href="#">GrandChild</a></li>
													<li><a href="#">GrandChild</a></li>
												</ul>
											</li>
											<li><a href="#">Menu Child +</a>
												<ul class="sub-menu">
													<li><a href="#">The Drop Down</a></li>
													<li><a href="#">Flyouts +</a>
														<ul class="sub-menu">
															<li><a href="#">Are Endless +</a>
																<ul class="sub-menu">
																	<li><a href="#">Make As Many</a></li>
																	<li><a href="#">As You Want</a></li>
																</ul>
															</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="page.php">Page</a></li>
									<li><a href="page-contact.php">Contact</a></li>
									<li><a href="#">More Page Layouts +</a>
										<ul class="sub-menu">
											<li><a href="page-extras.php">Extras</a></li>
											<li><a href="page-full.php">Full Width</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<a id="donate_now" class="button" href="#" title="Make A Donation">Make A Donation</a>
						</div>
					</div>
				</div>
			</div>
			<div class="wrapper" id="content"> <!-- #content ends in footer.php -->
				<div class="container"><div class="full-width" id="page">
	<h2 class="post_title">Full Width</h2>
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
	<p>Quisque facilisis erat a dui. Nam malesuada ornare dolor. Cras gravida, diam sit amet rhoncus ornare, erat elit consectetuer erat, id egestas pede nibh eget odio. Proin tincidunt, velit vel porta elementum, magna diam molestie sapien, non aliquet massa pede eu diam. Aliquam iaculis. Fusce et ipsum et nulla tristique facilisis. Donec eget sem sit amet ligula viverra gravida. Etiam vehicula urna vel turpis. Suspendisse sagittis ante a urna. Morbi a est quis orci consequat rutrum. Nullam egestas feugiat felis. Integer adipiscing semper ligula.</p>
	<div class="half_wide"><strong>Half Size</strong>
		<p>This is a short code for a block of text that is half the width of the content. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
	</div>
	<div class="half_wide"><strong>Half Size</strong>
		<p>This is a short code for a block of text that is half the width of the content. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
	</div>
	<div class="clear"></div>
	<div class="threequarter_wide"><strong>Three Quarter Size</strong>
		<p>This is a short code for a block of text that is three quarters the width of the content. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
	</div>
	<div class="quarter_wide"><strong>Quarter</strong><strong> Size</strong>
		<p>This is a short code for a block of text that is one quarter the width of the content.</p>
	</div>
	<div class="clear"></div>
	<div class="third_wide"><strong>Third Size</strong>
		<p>This is a short code for a block of text that is one third the width of the content.</p>
	</div>
	<div class="twothird_wide"><strong>Two Thirds Size</strong>
		<p>This is a short code for a block of text that is two thirds the width of the content. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida.</p>
	</div>
	<div class="clear"></div>
	<div class="alert"><strong>This is an Alert</strong>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat.</p>
	</div>
	<div class="clear"></div>
	<div class="warning"><strong>This is a Warning</strong>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat.</p>
	</div>
	<div class="clear"></div>
	<p><strong>Buttons</strong></p>
	<a class="button buttonleft" href="#">Button</a>
	<a class="button buttonleft button_red" href="#">Button</a>
	<a class="button buttonleft button_gray" href="#">Button</a>
	<div class="clear"></div>
</div>
					<div class="clear"></div>
				</div><!-- end div.container, begins in header.php -->
			</div><!-- end div.wrapper, begins in header.php -->
		</div><!-- end div#main_wrap, begins in header.php -->
		<div id="footer" class="wrapper">
			<div class="container">
				<h1 id="footer_slogan">Change Is Coming Soon</h1>
				<div id="footer_widgets">
					<div class="footer_widget">
						<div class="featured_user">
							<h6 class="widgettitle">Meet The Candidate</h6>			
							<div class="specific_user">
								<a href="#" title="Jake Caputo">
									<img alt="" src="http://0.gravatar.com/avatar/02cdeec360274d7d9f1aa85761f95dc8?s=58&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D58&amp;r=G" class="avatar" height="58" width="58" />
								</a>
								<strong>
									<a href="#" title="Jake Caputo" class="featured_user_name">
										Jake Caputo
									</a>
								</strong>
								I'm a web designer and developer currently living just outside of Chicago, IL. I like coffee, comic books, and cats.  I'm also a big fan of The Beach Boys and the Chicago Bears.
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<div class="footer_widget">
						<h6 class="widgettitle">Recent Blog Posts</h6>
						<ul>
							<li><a href="blog-single.php" title="Blog Post">Blog Post Title Here</a></li>
							<li><a href="blog-single.php" title="Blog Post">Blog Post Title Here</a></li>
							<li><a href="blog-single.php" title="Blog Post">Blog Post Title Here</a></li>
							<li><a href="blog-single.php" title="Blog Post">Blog Post Title Here</a></li>
							<li><a href="blog-single.php" title="Blog Post">Blog Post Title Here</a></li>
						</ul>
					</div>
					<div class="footer_widget">
						<div id="twitter_div">
							<h6 class="widgettitle">Latest Tweets</h6>
							<ul id="twitter_update_list"><li></li></ul>
						</div>
						<!-- This script pulls the latest tweets and places them in the above 'li'. Replace 'jakecaputo' with your twitter URL -->
						<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
						<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/jakecaputo.json?callback=twitterCallback2&amp;count=2"></script>
					</div>
					<div class="footer_widget">
						<h6 class="widgettitle">Register To Vote</h6>
						<span>This is a widget with a button. You can use it to push users wherever you want. Perhaps to a contact page?</span>
						<a href="#" class="button button_red">Let's Go</a>
					</div>
					<div class="clear"></div>
				</div>
				<div id="post_footer">
					<div id="socnets_wrap">
						<div id="socnets">
							<a href="#" title="Twitter">
								<img src="images/socnets/twitter.png" alt="Twitter" />
							</a>
							<a href="#" title="Facebook">
								<img src="images/socnets/facebook.png" alt="Facebook" />
							</a>
							<a href="#" title="Google+">
								<img src="images/socnets/google.png" alt="Google+" />
							</a>
							<a href="#" title="Flickr">
								<img src="images/socnets/flickr.png" alt="Flickr" />
							</a>
							<a href="#" title="Tumblr">
								<img src="images/socnets/tumblr.png" alt="Tumblr" />
							</a>
							<a href="#" title="Vimeo">
								<img src="images/socnets/vimeo.png" alt="Vimeo" />
							</a>
							<a href="#" title="YouTube">
								<img src="images/socnets/youtube.png" alt="YouTube" />
							</a>
						</div>
						<div class="clear"></div>
					</div>
					<div id="paid_for">Paid For By Campaign for Office</div>
					<div id="site_info">
						&copy; 2012 Campaign&nbsp;&nbsp;:&nbsp;
						<a href="http://www.designcrumbs.com/wordpress-themes" title="Campaign WordPress Theme">Campaign Theme</a> by <a href="http://www.designcrumbs.com/wordpress-themes" title="Design Crumbs">Design Crumbs</a>
					</div>
				</div>
			</div>
		</div>
		<!-- jQuery We Need -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
		<script type="text/javascript" src="includes/js/jquery.slabtext.min.js"></script>
		<script type="text/javascript" src="includes/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="includes/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
		<script type="text/javascript" src="includes/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="includes/js/slides.jquery.js"></script>
		<script type="text/javascript" src="includes/js/campaign.js"></script>
		<script type="text/javascript">
			/* <![CDATA[  */ 
			var J = jQuery.noConflict();
			J(document).ready(function(){
				
				//Style Switcher
				J('.cright').click( function(){
					J('body').removeClass('content_left').addClass('content_right');
				});
				
				J('.cleft').click( function(){
					J('body').removeClass('content_right').addClass('content_left');
				});
				
				J('.bspan').click( function(){
					J('body').removeClass('body_boxed').addClass('body_span');
					J('.bgpat').hide();
				});
				
				J('.bbox').click( function(){
					J('body').removeClass('body_span').addClass('body_boxed');
					J('.bgpat').show();
				});
				
				// colors
				J('.blue').click( function(){
					J('body').removeClass('scheme_blue').addClass('scheme_blue');
					J('body').removeClass('scheme_red').addClass('scheme_blue');
					J('body').removeClass('scheme_green').addClass('scheme_blue');
					J('body').removeClass('scheme_yellow').addClass('scheme_blue');
				});
				
				J('.green').click( function(){
					J('body').removeClass('scheme_blue').addClass('scheme_green');
					J('body').removeClass('scheme_red').addClass('scheme_green');
					J('body').removeClass('scheme_green').addClass('scheme_green');
					J('body').removeClass('scheme_yellow').addClass('scheme_green');
				});
				
				J('.yellow').click( function(){
					J('body').removeClass('scheme_blue').addClass('scheme_yellow');
					J('body').removeClass('scheme_red').addClass('scheme_yellow');
					J('body').removeClass('scheme_green').addClass('scheme_yellow');
					J('body').removeClass('scheme_yellow').addClass('scheme_yellow');
				});
				
				J('.red').click( function(){
					J('body').removeClass('scheme_blue').addClass('scheme_red');
					J('body').removeClass('scheme_red').addClass('scheme_red');
					J('body').removeClass('scheme_green').addClass('scheme_red');
					J('body').removeClass('scheme_yellow').addClass('scheme_red');
				});
				
				J('.cork').click( function(){
					J('body').removeClass('bg_cork').addClass('bg_cork');
					J('body').removeClass('bg_fabric').addClass('bg_cork');
					J('body').removeClass('bg_freckles').addClass('bg_cork');
					J('body').removeClass('bg_linen').addClass('bg_cork');
					J('body').removeClass('bg_pinstripe').addClass('bg_cork');
					J('body').removeClass('bg_none').addClass('bg_cork');
				});
				
				J('.fabric').click( function(){
					J('body').removeClass('bg_cork').addClass('bg_fabric');
					J('body').removeClass('bg_fabric').addClass('bg_fabric');
					J('body').removeClass('bg_freckles').addClass('bg_fabric');
					J('body').removeClass('bg_linen').addClass('bg_fabric');
					J('body').removeClass('bg_pinstripe').addClass('bg_fabric');
					J('body').removeClass('bg_none').addClass('bg_fabric');
				});
				
				J('.freckles').click( function(){
					J('body').removeClass('bg_cork').addClass('bg_freckles');
					J('body').removeClass('bg_fabric').addClass('bg_freckles');
					J('body').removeClass('bg_freckles').addClass('bg_freckles');
					J('body').removeClass('bg_linen').addClass('bg_freckles');
					J('body').removeClass('bg_pinstripe').addClass('bg_freckles');
					J('body').removeClass('bg_none').addClass('bg_freckles');
				});
				
				J('.linen').click( function(){
					J('body').removeClass('bg_cork').addClass('bg_linen');
					J('body').removeClass('bg_fabric').addClass('bg_linen');
					J('body').removeClass('bg_freckles').addClass('bg_linen');
					J('body').removeClass('bg_linen').addClass('bg_linen');
					J('body').removeClass('bg_pinstripe').addClass('bg_linen');
					J('body').removeClass('bg_none').addClass('bg_linen');
				});
				
				J('.pinstripes').click( function(){
					J('body').removeClass('bg_cork').addClass('bg_pinstripe');
					J('body').removeClass('bg_fabric').addClass('bg_pinstripe');
					J('body').removeClass('bg_freckles').addClass('bg_pinstripe');
					J('body').removeClass('bg_linen').addClass('bg_pinstripe');
					J('body').removeClass('bg_pinstripe').addClass('bg_pinstripe');
					J('body').removeClass('bg_none').addClass('bg_pinstripe');
				});
				
				J('.none').click( function(){
					J('body').removeClass('bg_cork').addClass('bg_none');
					J('body').removeClass('bg_fabric').addClass('bg_none');
					J('body').removeClass('bg_freckles').addClass('bg_none');
					J('body').removeClass('bg_linen').addClass('bg_none');
					J('body').removeClass('bg_pinstripe').addClass('bg_none');
					J('body').removeClass('bg_none').addClass('bg_none');
				});

				J('#dc_hide_options').click(function() {
					J('#dc_show_options').show();
					J('#dc_hide_options').hide();
  					J('#switcher').slideToggle('fast', function() {
					});
				});
				
				J('#dc_show_options').click(function() {
					J('#dc_hide_options').show();
					J('#dc_show_options').hide();
  					J('#switcher').slideToggle('fast', function() {
					});
				});
				
			});
			
			/* ]]> */
		</script>
		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19161846-11']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</body>
</html>
