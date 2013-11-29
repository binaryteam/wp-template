<?php 

/*
 * Write here your options
 */

$options = array( 
    array(
        "type" => "section",
        "icon" => "acera-icon-home",
        "title" => "General Settings",
        "id" => "general",
        "expanded" => "true"
    ),
        array(
            "section" => "general",
            "type" => "heading",
            "title" => "Visual (logo, favicon)",
            "id" => "general-visual"
        ),
            array(
                "under_section" => "general-visual",
                "type" => "image",
                "name" => "Logo",
                "id" => "txt_theme_logo",
                "desc" => "Paste the URL to your image, or upload it here.",
                "default" => ""
            ),
            array(
                "under_section" => "general-visual",
                "type" => "image",
                "name" => "Favicon",
                "id" => "txt_theme_favicon",
                "desc" => "Paste the URL to your image, or upload it here.",
                "default" => ""
            ),
        array(
            "section" => "general",
            "type" => "heading",
            "title" => "Code integration",
            "id" => "general-integration"
        ),
            array(
                "under_section" => "general-integration", //Required
                "type" => "checkbox", //Required
                "name" => "<strong>Allow these integrations</strong>", //Required
                "id" => array("acera_code_allow_google", "acera_code_allow_css", "acera_code_allow_jquery", "acera_code_allow_childcss"), //Required
                "options" => array("Google analytics", "Custom css", "Custom jQuery", "Child Stylesheet"), //Required
                "desc" => "Choose which code integrations (below) you want to use.",
                "display_checkbox_id" => "toggle_checkbox_id",
                "default" => array("checked", "not", "not", "not")
            ),
            array(
                "under_section" => "general-integration",
                "type" => "textarea",
                "name" => "Google analytics",
                "id" => "txt_theme_analytics",
                "desc" => "Paste here your google analytics code.",
                "default" => ""
            ),
            array(
                "under_section" => "general-integration",
                "type" => "textarea",
                "name" => "Custom css",
                "id" => "txt_theme_custom_css",
                "desc" => "Write here your custom css.",
                "default" => ""
            ),
            array(
                "under_section" => "general-integration",
                "type" => "textarea",
                "name" => "Custom jQuery Code",
                "id" => "txt_theme_custom_jquery",
                "desc" => "This code is executed after document is ready.",
                "default" => ""
            ),
            array(
                "under_section" => "general-integration",
                "type" => "text",
                "name" => "Child stylesheet",
                "id" => "txt_theme_css_child",
                "desc" => "Enter the URL of a child stylesheet display.",
                "default" => ""
            ),
        array(
            "section" => "general",
            "type" => "heading",
            "title" => "Redes Sociales",
            "id" => "general-sociales"
        ),
            array(
                "under_section" => "general-sociales",
                "type" => "text",
                "name" => "Facebook",
                "id" => "txt_theme_facebook",
                "desc" => "Facebook URL",
                "default" => ""
            ),
            array(
                "under_section" => "general-sociales",
                "type" => "text",
                "name" => "Twitter",
                "id" => "txt_theme_twitter",
                "desc" => "Twitter URL",
                "default" => ""
            ),
            array(
                "under_section" => "general-sociales",
                "type" => "text",
                "name" => "Pinterest",
                "id" => "txt_theme_pinterest",
                "desc" => "Pinterest URL",
                "default" => ""
            ),
            array(
                "under_section" => "general-sociales",
                "type" => "text",
                "name" => "Instagram",
                "id" => "txt_theme_instagram",
                "desc" => "Instagram URL",
                "default" => ""
            ),
            array(
                "under_section" => "general-sociales",
                "type" => "text",
                "name" => "Youtube",
                "id" => "txt_theme_youtube",
                "desc" => "Youtube URL",
                "default" => ""
            ),
    array(
        "type" => "section",
        "icon" => "acera-icon-window",
        "title" => "Layout Settings",
        "id" => "layout",
        "expanded" => "true"
    ),
        array(
            "section" => "layout",
            "type" => "heading",
            "title" => "404 page",
            "id" => "layout-404"
        ),
        array(
            "section" => "layout",
            "type" => "heading",
            "title" => "Home page",
            "id" => "layout-home-page"
        ),
        array(
            "section" => "layout",
            "type" => "heading",
            "title" => "Single page",
            "id" => "layout-single-page"
        ),
        array(
            "section" => "layout",
            "type" => "heading",
            "title" => "Footer",
            "id" => "layout-footer"
        ),
);

?>