<?php
/**
 * NGO Organization Theme Page
 *
 * @package NGO Organization
 */

function ngo_organization_admin_scripts() {
	wp_dequeue_script('ngo-organization-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'ngo_organization_admin_scripts' );

if ( ! defined( 'NGO_ORGANIZATION_FREE_THEME_URL' ) ) {
	define( 'NGO_ORGANIZATION_FREE_THEME_URL', 'https://www.themespride.com/themes/free-ngo-wordpress-theme/' );
}
if ( ! defined( 'NGO_ORGANIZATION_PRO_THEME_URL' ) ) {
	define( 'NGO_ORGANIZATION_PRO_THEME_URL', 'https://www.themespride.com/themes/ngo-organization-wordpress-theme/' );
}
if ( ! defined( 'NGO_ORGANIZATION_DEMO_THEME_URL' ) ) {
	define( 'NGO_ORGANIZATION_DEMO_THEME_URL', 'https://www.themespride.com/ngo-organization-pro/' );
}
if ( ! defined( 'NGO_ORGANIZATION_DOCS_THEME_URL' ) ) {
    define( 'NGO_ORGANIZATION_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/ngo-organization-lite/' );
}
if ( ! defined( 'NGO_ORGANIZATION_DOCS_URL' ) ) {
    define( 'NGO_ORGANIZATION_DOCS_URL', 'https://www.themespride.com/demo/docs/ngo-organization-lite/' );
}
if ( ! defined( 'NGO_ORGANIZATION_RATE_THEME_URL' ) ) {
    define( 'NGO_ORGANIZATION_RATE_THEME_URL', 'https://wordpress.org/support/theme/ngo-organization/reviews/#new-post' );
}
if ( ! defined( 'NGO_ORGANIZATION_SUPPORT_THEME_URL' ) ) {
    define( 'NGO_ORGANIZATION_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/ngo-organization' );
}
if ( ! defined( 'NGO_ORGANIZATION_CHANGELOG_THEME_URL' ) ) {
    define( 'NGO_ORGANIZATION_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}

/**
 * Add theme page
 */
function ngo_organization_menu() {
	add_theme_page( esc_html__( 'About Theme', 'ngo-organization' ), esc_html__( 'About Theme', 'ngo-organization' ), 'edit_theme_options', 'ngo-organization-about', 'ngo_organization_about_display' );
}
add_action( 'admin_menu', 'ngo_organization_menu' );

/**
 * Display About page
 */
function ngo_organization_about_display() {
	$ngo_organization_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $ngo_organization_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$ngo_organization_description = explode( '. ', $ngo_organization_theme->get( 'Description' ) );

					array_pop( $ngo_organization_description );

					$ngo_organization_description = implode( '. ', $ngo_organization_description );

					echo esc_html( $ngo_organization_description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( NGO_ORGANIZATION_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'ngo-organization' ); ?></a>

					<a href="<?php echo esc_url( NGO_ORGANIZATION_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'ngo-organization' ); ?></a>

					<a href="<?php echo esc_url( NGO_ORGANIZATION_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'ngo-organization' ); ?></a>

					<a href="<?php echo esc_url( NGO_ORGANIZATION_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'ngo-organization' ); ?></a>

					<a href="<?php echo esc_url( NGO_ORGANIZATION_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'ngo-organization' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $ngo_organization_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'ngo-organization' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ngo-organization-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'ngo-organization-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'ngo-organization' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ngo-organization-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'ngo-organization' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'ngo-organization-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'ngo-organization' ); ?></a>
		</nav>

		<?php
			ngo_organization_main_screen();

			ngo_organization_changelog_screen();

			ngo_organization_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'ngo-organization' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'ngo-organization' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'ngo-organization' ) : esc_html_e( 'Go to Dashboard', 'ngo-organization' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function ngo_organization_main_screen() {
	if ( isset( $_GET['page'] ) && 'ngo-organization-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'ngo-organization' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'ngo-organization' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'ngo-organization' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'ngo-organization' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'ngo-organization' ) ?></p>
				<p><a href="<?php echo esc_url( NGO_ORGANIZATION_SUPPORT_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Support Forum', 'ngo-organization' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'ngo-organization' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'ngo-organization' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary" onclick="ngo_organization_text_copyied()"><?php esc_html_e( 'GETPro20', 'ngo-organization' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function ngo_organization_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'ngo-organization' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'ngo_organization_changelog_file', NGO_ORGANIZATION_CHANGELOG_THEME_URL );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = ngo_organization_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function ngo_organization_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function ngo_organization_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'ngo-organization' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'ngo-organization' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'ngo-organization' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'ngo-organization' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'ngo-organization' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a href="<?php echo esc_url( NGO_ORGANIZATION_PRO_THEME_URL ); ?>" class="sidebar-button single-btn" target="_blank"><?php esc_html_e( 'Go For Premium', 'ngo-organization' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
