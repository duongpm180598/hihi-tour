<?php
/**
 * Rank Math SEO customizations.
 */

add_theme_support('rank-math-breadcrumbs');

function hihi_seo_template_config_map()
{
    return array(
        array(
            'template' => 'front-page.php',
            'config' => 'home',
            'namespace' => 'global',
            'type' => 'home',
            'match_front_page' => true,
        ),
        array(
            'template' => 'booking.php',
            'config' => 'booking',
            'namespace' => 'global',
            'type' => 'utility',
        ),
        array(
            'template' => 'helps.php',
            'config' => 'helps',
            'namespace' => 'global',
            'type' => 'utility',
        ),
        array(
            'template' => 'hihi-go-to.php',
            'config' => 'hihi-go-to',
            'namespace' => 'global',
            'type' => 'listing',
        ),
        array(
            'template' => 'thank-you.php',
            'config' => 'thank-you',
            'namespace' => 'global',
            'type' => 'utility',
        ),
        array(
            'template' => 'ha-giang-tour.php',
            'config' => 'ha-giang',
            'namespace' => 'ha_giang',
            'type' => 'destination',
        ),
        array(
            'template' => 'cao-bang-tour.php',
            'config' => 'cao-bang',
            'namespace' => 'cao_bang',
            'type' => 'destination',
        ),
        array(
            'template' => 'cat-ba-tour.php',
            'config' => 'cat-ba-tour',
            'namespace' => 'cat_ba',
            'type' => 'destination',
        ),
        array(
            'template' => 'hue-tour.php',
            'config' => 'hue-trip',
            'namespace' => 'hue',
            'type' => 'destination',
        ),
        array(
            'template' => 'mu-cang-chai.php',
            'config' => 'mu-cang-chai',
            'namespace' => 'mu_cang_chai',
            'type' => 'destination',
        ),
        array(
            'template' => 'ninh-thuan.php',
            'config' => 'ninh-thuan',
            'namespace' => 'ninh_thuan',
            'type' => 'destination',
        ),
        array(
            'template' => 'taiwan.php',
            'config' => 'taiwan-trip',
            'namespace' => 'taiwan',
            'type' => 'destination',
        ),
        array(
            'template' => 'thailand.php',
            'config' => 'thailand-trip',
            'namespace' => 'thailand',
            'type' => 'destination',
        ),
    );
}

function hihi_seo_current_page()
{
    foreach (hihi_seo_template_config_map() as $page) {
        $is_match = !empty($page['match_front_page']) && is_front_page();
        if (!$is_match) {
            $is_match = is_page_template($page['template']);
        }

        if (!$is_match) {
            continue;
        }

        return $page;
    }

    return array();
}

function hihi_seo_current_config()
{
    $page = hihi_seo_current_page();
    if (!empty($page['config'])) {
        $config_path = get_template_directory() . '/.seo-config/' . $page['config'] . '.json';
        if (!is_readable($config_path)) {
            return array();
        }

        $config = json_decode(file_get_contents($config_path), true);
        if (!is_array($config)) {
            return array();
        }

        $lang = function_exists('pll_current_language') ? pll_current_language('slug') : 'vi';
        return $config[$lang] ?? $config['vi'] ?? array();
    }

    return array();
}

function hihi_seo_config_value($key)
{
    $config = hihi_seo_current_config();
    return is_string($config[$key] ?? null) ? $config[$key] : '';
}

add_filter('rank_math/frontend/title', function ($title) {
    $seo_title = hihi_seo_config_value('seo_title');
    return $seo_title !== '' ? $seo_title : $title;
}, 20);

add_filter('rank_math/frontend/description', function ($description) {
    $meta_description = hihi_seo_config_value('meta_description');
    return $meta_description !== '' ? $meta_description : $description;
}, 20);

add_filter('rank_math/frontend/canonical', function ($canonical) {
    $canonical_url = hihi_seo_config_value('canonical_url');
    return $canonical_url !== '' ? $canonical_url : $canonical;
}, 20);

add_filter('rank_math/json_ld', function ($data) {
    $page = hihi_seo_current_page();
    if (($page['type'] ?? '') !== 'destination') {
        return $data;
    }

    $t = function_exists('load_lang') ? load_lang() : array();
    $namespace = $page['namespace'] ?? '';
    $page_text = $t[$namespace] ?? array();
    $seo_description = hihi_seo_config_value('meta_description');

    $main_entity = array();
    foreach ($page_text as $key => $question_value) {
        if (strpos($key, 'faq_q_') !== 0) {
            continue;
        }

        $answer_key = 'faq_a_' . substr($key, strlen('faq_q_'));
        $question = wp_strip_all_tags($question_value);
        $answer = wp_strip_all_tags($page_text[$answer_key] ?? '');
        if ($question === '' || $answer === '') {
            continue;
        }

        $main_entity[] = array(
            '@type' => 'Question',
            'name' => $question,
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => $answer,
            ),
        );
    }

    if (!empty($main_entity)) {
        $data['FAQPage'] = array(
            '@type' => 'FAQPage',
            'mainEntity' => $main_entity,
        );
    }

    $destination_title = wp_strip_all_tags($page_text['seo_h1'] ?? $page_text['destination_title'] ?? '');
    if ($destination_title !== '') {
        $data['TouristTrip'] = array(
            '@type' => 'TouristTrip',
            'name' => $destination_title,
            'description' => $seo_description !== '' ? $seo_description : wp_strip_all_tags($page_text['hero_quote'] ?? $destination_title),
            'touristType' => array(
                'Adventure travelers',
                'Independent travelers',
                'Local experience seekers',
            ),
        );
    }

    return $data;
}, 99);
