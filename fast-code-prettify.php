<?php
/**
 * Plugin Name: Fast Code Prettify
 * Plugin URI:  https://www.getpagespeed.com/fast-code-prettify
 * Description: Google Prettify syntax highlighter for Jetpack's Markdown
 * Version:     1.0.0
 * Author:      GetPageSpeed
 * Author URI:  https://www.getpagespeed.com/
 * License:     GPLv2+
 * Text Domain: prettify
 */

/**
 * Flag for inclusion of Google Prettify javascript file
 */
$fastCodePrettify = false;

/**
 * Always format as <pre class="prettyprint"><code class="language-name">...
 * @param $content
 * @return string
 */
function prettify_content_filter($content) {
    global $fastCodePrettify;

    $search = '@<pre(?: class="prettyprint")?><code(?: class="([\w-]+)")?>@';

    $count = 0;

    $content = preg_replace_callback($search, function ($matches) {
        if (isset($matches[1])) {
            return sprintf('<pre class="prettyprint"><code class="language-%s">', $matches[1]);
        } else {
            return '<pre class="prettyprint"><code class="language-bash">';
        }
    }, $content, -1, $count);

    if ($count && $fastCodePrettify == false) {
        wp_enqueue_script(
            'prettify',
            'https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js',
            null, null, true);

        // add "async" and call prettify once loaded:
        add_filter('script_loader_tag', function ($tag, $handle) {
            if ('prettify' == $handle)
                return str_replace(' src', ' async="async" onload="PR.prettyPrint()" src', $tag);
            return $tag;
        }, 10, 2);
        $fastCodePrettify = true;
    }

    return $content;
}

add_filter('the_content', 'prettify_content_filter');
add_filter('comment_text', 'prettify_content_filter');



