<?php
/**
 * Adds Kingcabs Theme Widgets in SiteOrigin Pagebuilder Tabs
 *
 * @since Kingcabs 1.0.1
 *
 * @param null
 * @return null
 *
 */
function kingcabs_widgets($widgets) {
    $theme_widgets = array(
        'kingcabs_aboutservices',
        'kingcabs_brandlogo',
        'Kingcabs_Calltoaction',
        'Kingcabs_features',
        'kingcabs_mainservices',
        'kingcabs_ourfleet',
        'kingcabs_teammember',
        'kingcabs_testimonials'
    );
    foreach($theme_widgets as $theme_widget) {
        if( isset( $widgets[$theme_widget] ) ) {
            $widgets[$theme_widget]['groups'] = array('kingcabs');
            $widgets[$theme_widget]['icon']   = 'dashicons dashicons-screenoptions';
        }
    }
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'kingcabs_widgets');

/**
 * Add a tab for the theme widgets in the page builder
 *
 * @since Kingcabs 1.0.1
 *
 * @param null
 * @return null
 *
 */
function kingcabs_widgets_tab($tabs){
    $tabs[] = array(
        'title'  => esc_html__('SP Kingcabs Widgets', 'kingcabs'),
        'filter' => array(
            'groups' => array('kingcabs')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'kingcabs_widgets_tab', 20);