<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Basic 90</title>
		<meta charset="utf-8">
		<?php wp_head(); ?>
	</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">

    <?php twentyfifteen_the_custom_logo(); ?>

      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      	<?php $description = get_bloginfo( 'description', 'display' ); ?>
		<?php if ( $description ) : ?>
			<h2 class="site-description"><?php echo $description; ?></h2>
		<?php endif; ?>
    </div>
    <form action="#" method="post">
      <fieldset>
        <legend>Search:</legend>
        <input type="text" value="Search Our Website&hellip;" onFocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;">
        <input type="submit" id="sf_submit" value="submit">
      </fieldset>
    </form>

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php
				// Primary navigation menu.
				wp_nav_menu( array(
					'menu_class'     => 'nav-menu',
					'theme_location' => 'primary',
				) );
			?>
		</nav><!-- .main-navigation -->
	<?php endif; ?>

  </header>
</div>
<!-- content -->
<div class="wrapper row2">