<?php
class block_quicklinks extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_quicklinks');
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->footer = '';

        // Check if the user is an admin.
        if (is_siteadmin()) {
            // Get the number of links from settings.
            $num_links = get_config('block_quicklinks', 'num_links');
            if ($num_links) {
                for ($i = 1; $i <= $num_links; $i++) {
                    $title = get_config('block_quicklinks', 'title' . $i);
                    $link = get_config('block_quicklinks', 'link' . $i);
                    if ($title && $link) {
                        $this->content->text .= html_writer::link($link, $title) . '<br>';
                    }
                }
            }
        }

        return $this->content;
    }

    public function has_config() {
        return true;
    }
}
