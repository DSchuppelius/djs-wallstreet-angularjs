<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-global.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */
class Customizer_Wallstreet_Pro_AngularJS
{
    public $is_djs_wallstreet_pro_theme;

    public function __construct()
    {
        $wallstreet_theme = wp_get_theme("DJS-Wallstreet-Pro");
        $current_theme = wp_get_theme();
        $this->is_djs_wallstreet_pro_theme = $wallstreet_theme->Name == $current_theme->Name;
    }

    public function register(){
        if ($this->is_djs_wallstreet_pro_theme)
            add_action("customize_register", [$this, "register_angularsection"]);
        else
            add_action("customize_register", [$this, "register_angularpanel"]);

        add_action("customize_register", [$this, "register_angularcontrols"]);
    }

    public function register_angularsection($wp_customize)
    {
        $wp_customize->add_section("angular_section_settings", [
            "title" => __("AngularJS options", "wallstreet"),
            "panel" => "global_theme_settings",
            "description" => "",
        ]);
    }

    public function register_angularpanel($wp_customize)
    {
        $wp_customize->add_panel("angular_section_settings", [
            "title" => __("AngularJS options", "wallstreet"),
            "description" => "",
        ]);
    }

    public function register_angularcontrols($wp_customize)
    {
        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angularjs_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angularjs_enabled]", [
            "label" => __("Enable AngularJS", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
            "description" => __("If enabled the following and enabled features are also taken into account", "wallstreet"),
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angularjs_version]", [
            "default" => '1.8.2',
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angularjs_version]", [
            "label" => __("Select version of AngularJS", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "select",
            'choices' => [
                '1.2.32' => __('Version 1.2.32'),
                '1.8.2' => __('Version 1.8.2'),
            ],
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angularjslocal_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angularjslocal_enabled]", [
            "label" => __("Enable AngularJS Locale", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angularjslocal]", [
            "default" => strtolower(get_locale()),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
        $wp_customize->add_control("wallstreet_pro_angularjs_options[angularjslocal]", [
            "label" => __("Language", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "text",
            "priority" => 100,
        ]);


        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_animate_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_animate_enabled]", [
            "label" => __("Enable AngularJS Animate", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_aria_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_aria_enabled]", [
            "label" => __("Enable AngularJS Aria", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_cookies_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_cookies_enabled]", [
            "label" => __("Enable AngularJS Cookies", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_loader_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_loader_enabled]", [
            "label" => __("Enable AngularJS Loader", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_messages_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_messages_enabled]", [
            "label" => __("Enable AngularJS Message", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_message_format_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_message_format_enabled]", [
            "label" => __("Enable AngularJS Messageformat", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_mocks_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_mocks_enabled]", [
            "label" => __("Enable AngularJS Mocks", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);


        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_parse_ext_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_parse_ext_enabled]", [
            "label" => __("Enable AngularJS Parse Extension", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_resource_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_resource_enabled]", [
            "label" => __("Enable AngularJS Resource", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_route_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_route_enabled]", [
            "label" => __("Enable AngularJS Route", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_sanitize_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_sanitize_enabled]", [
            "label" => __("Enable AngularJS Sanitize", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_scenario_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_scenario_enabled]", [
            "label" => __("Enable AngularJS Scenario", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
            "description" => __("Only in Version 1.2.32", "wallstreet"),
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_touch_enabled]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_touch_enabled]", [
            "label" => __("Enable AngularJS Touch", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);

        $wp_customize->add_setting("wallstreet_pro_angularjs_options[angular_uibootstrap_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control("wallstreet_pro_angularjs_options[angular_uibootstrap_enabled]", [
            "label" => __("Enable AngularJS UI Bootstrap", "wallstreet"),
            "section" => "angular_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);
    }
}