<?php

namespace XPD\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use XPDPAYMENT;

if (!defined('ABSPATH')) {
  die('-1');
}

class XPDAdminWidget extends Widget_Base
{
    public function get_name() {
        return "xpdadminwidget";
    }

	public function get_title() {
        return "XPD Admin Widget";
    }

	public function get_icon() {
        return "fa fa-code";
    }

	public function get_categories() {
        return ['general'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            "section_content",
            [
                "label" => "Settings",
            ]
        );

        $this->end_controls_section();
    }

    // php render
    protected function render() {
        echo XPDPAYMENT::dashboard();
    }

    // js render
    // protected function _content_template() {
    //     echo "I work js";
    // }

}