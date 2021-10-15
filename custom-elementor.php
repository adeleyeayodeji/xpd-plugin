<?php
namespace XPD;

class Widgets_Loader 
{
    private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

    public function __construct() {
        // Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ], 99 );
    }

    public function include_widgets_files()
    {
        require_once( __DIR__ . '/widgets/widget.php' );
        require_once( __DIR__ . '/widgets/adminwidget.php' );
    }

    public function register_widgets()
    {
        $this->include_widgets_files();
        // Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \XPD\Widgets\XPDWidget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \XPD\Widgets\XPDAdminWidget() );
    }


}

Widgets_Loader::instance();