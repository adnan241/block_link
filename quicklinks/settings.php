<?php
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Number of links setting.
    $settings->add(new admin_setting_configtext(
        'block_quicklinks/num_links',
        get_string('num_links', 'block_quicklinks'),
        get_string('num_links_desc', 'block_quicklinks'),
        3,
        PARAM_INT
    ));

    // Dynamic settings for title and link based on the number of links.
    $num_links = get_config('block_quicklinks', 'num_links');
    if (!$num_links) {
        $num_links = 3; // Default to 3 if not set.
    }

    for ($i = 1; $i <= $num_links; $i++) {
        $settings->add(new admin_setting_configtext(
            'block_quicklinks/title' . $i,
            get_string('title', 'block_quicklinks') . " $i",
            '',
            '',
            PARAM_TEXT
        ));

        $settings->add(new admin_setting_configtext(
            'block_quicklinks/link' . $i,
            get_string('link', 'block_quicklinks') . " $i",
            '',
            '',
            PARAM_URL
        ));
    }
}
