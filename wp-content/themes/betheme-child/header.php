<?php
/**
 * The Header for our theme.
 *
 * @package Betheme
 * @author Muffin group
 * @link https://muffingroup.com
 */
?><!DOCTYPE html>
<?php
if ($_GET && key_exists('mfn-rtl', $_GET)):
    echo '<html class="no-js" lang="ar" dir="rtl">';
else:
?>
<html <?php language_attributes(); ?> class="no-js<?php echo esc_attr(mfn_user_os()); ?>"<?php mfn_tag_schema(); ?>>
<?php endif; ?>

<head>

    <meta charset="<?php bloginfo('charset'); ?>"/>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php do_action('mfn_hook_top'); ?>

<?php get_template_part('includes/header', 'sliding-area'); ?>

<?php
if (mfn_header_style(true) == 'header-creative') {
    get_template_part('includes/header', 'creative');
}
?>

<div id="Wrapper">

    <?php

    // featured image: parallax

    $class = '';
    $data_parallax = array();

    if (mfn_opts_get('img-subheader-attachment') == 'parallax') {
        $class = 'bg-parallax';

        if (mfn_opts_get('parallax') == 'stellar') {
            $data_parallax['key'] = 'data-stellar-background-ratio';
            $data_parallax['value'] = '0.5';
        } else {
            $data_parallax['key'] = 'data-enllax-ratio';
            $data_parallax['value'] = '0.3';
        }
    }
    ?>

    <?php
    if (mfn_header_style(true) == 'header-below') {
        echo mfn_slider();
    }
    ?>

    <div id="Header_wrapper" class="<?php echo esc_attr($class); ?>" <?php if ($data_parallax) {
        printf('%s="%.1f"', $data_parallax['key'], $data_parallax['value']);
    } ?>>

        <?php
        if ('mhb' == mfn_header_style()) {

            // mfn_header action for header builder plugin

            do_action('mfn_header');
            echo mfn_slider();

        } else {

            echo '<header id="Header">';
            if (mfn_header_style(true) != 'header-creative') {
                get_template_part('includes/header', 'top-area');
            }
            if (mfn_header_style(true) != 'header-below') {
                echo mfn_slider();
            }
            echo '</header>';

        }
        ?>

        <?php
        if ((mfn_opts_get('subheader') != 'all') &&
            (!get_post_meta(mfn_ID(), 'mfn-post-hide-title', true)) &&
            (get_post_meta(mfn_ID(), 'mfn-post-template', true) != 'intro')) {

            $subheader_advanced = mfn_opts_get('subheader-advanced');

            if (is_search()) {

                echo '<div id="Subheader">';
                echo '<div class="container">';
                echo '<div class="column one">';

                if (trim($_GET['s'])) {
                    global $wp_query;
                    $total_results = $wp_query->found_posts;
                } else {
                    $total_results = 0;
                }

                $translate['search-results'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-results', 'results found for:') : __('results found for:', 'betheme');
                echo '<h1 class="title">' . esc_html($total_results) . ' ' . esc_html($translate['search-results']) . ' ' . esc_html($_GET['s']) . '</h1>';

                echo '</div>';
                echo '</div>';
                echo '</div>';

            } elseif (!mfn_slider_isset() || (is_array($subheader_advanced) && isset($subheader_advanced['slider-show']))) {

                // subheader

                $subheader_options = mfn_opts_get('subheader');

                if (is_home() && !get_option('page_for_posts') && !mfn_opts_get('blog-page')) {
                    $subheader_show = false;
                } elseif (is_array($subheader_options) && isset($subheader_options['hide-subheader'])) {
                    $subheader_show = false;
                } elseif (get_post_meta(mfn_ID(), 'mfn-post-hide-title', true)) {
                    $subheader_show = false;
                } else {
                    $subheader_show = true;
                }

                // title

                if (is_array($subheader_options) && isset($subheader_options['hide-title'])) {
                    $title_show = false;
                } else {
                    $title_show = true;
                }

                // breadcrumbs

                if (is_array($subheader_options) && isset($subheader_options['hide-breadcrumbs'])) {
                    $breadcrumbs_show = false;
                } else {
                    $breadcrumbs_show = true;
                }

                if (is_array($subheader_advanced) && isset($subheader_advanced['breadcrumbs-link'])) {
                    $breadcrumbs_link = 'has-link';
                } else {
                    $breadcrumbs_link = 'no-link';
                }

                // output

                if ($subheader_show) {

                    echo '<div id="Subheader">';
                    echo '<div class="container">';
                    echo '<div class="column one">';

                    if ($title_show) {
                        $title_tag = mfn_opts_get('subheader-title-tag', 'h1');
                        echo '<' . esc_attr($title_tag) . ' class="title">' . wp_kses(mfn_page_title(), mfn_allowed_html()) . '</' . esc_attr($title_tag) . '>';
                    }

                    if ($breadcrumbs_show) {
                        mfn_breadcrumbs($breadcrumbs_link);
                    }

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                }
            }
        }
        ?>

    </div>

    <?php
    if (get_post_meta(mfn_ID(), 'mfn-post-template', true) == 'intro') {
        get_template_part('includes/header', 'single-intro');
    }
    ?>

    <?php do_action('mfn_hook_content_before'); ?>

    <div id="slider">
        <div class="container-fluid nopadding">
            <div id="sliders" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#sliders" data-slide-to="0" class="active"></li>
                    <li data-target="#sliders" data-slide-to="1" class=""></li>
                    <li data-target="#sliders" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="img-slider"><img class="hidden-xs"
                                                     src="https://dusyzh85wmzqh.cloudfront.net/uploads/banner-zero-rak-ibc-government-fees-for-re-domiciliation-1572935013.png"
                                                     alt="ZERO RAK IBC Government Fees"
                                                     title="ZERO RAK IBC Government Fees"> <img class="hidden-md"
                                                                                                src="https://dusyzh85wmzqh.cloudfront.net/uploads/banner-zero-rak-ibc-government-fees-for-re-domiciliation-t-1572935014.png"
                                                                                                alt="ZERO RAK IBC Government Fees"
                                                                                                title="ZERO RAK IBC Government Fees">
                        </div>
                        <div class="carousel-caption">
                            <div class="container"><h1>ZERO RAK IBC Government Fees</h1>
                                <p>For Re-Domiciliation</p> <a class="btn btn-default"
                                                               href="https://www.offshorecompanycorp.com/promotion/zero-rak-ibc-government-fees-for-re-domiciliation"
                                                               target="_self" title="ZERO RAK IBC Government Fees">
                                    Learn More </a></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img-slider"><img class="hidden-xs"
                                                     src="https://dusyzh85wmzqh.cloudfront.net/uploads/banner-caribbean-promotion-bvinevis-1572418448.png"
                                                     alt="Start your BVI/Nevis company today"
                                                     title="Start your BVI/Nevis company today"> <img class="hidden-md"
                                                                                                      src="https://dusyzh85wmzqh.cloudfront.net/uploads/banner-caribbean-promotion-bvinevis-t-1571911860.png"
                                                                                                      alt="Start your BVI/Nevis company today"
                                                                                                      title="Start your BVI/Nevis company today">
                        </div>
                        <div class="carousel-caption">
                            <div class="container"><h1>Start your BVI/Nevis company today</h1>
                                <p>and receive Extra Rewards!</p> <a class="btn btn-default"
                                                                     href="https://www.offshorecompanycorp.com/promotion/caribbean-promotion-bvinevis"
                                                                     target="_self"
                                                                     title="Start your BVI/Nevis company today"> Learn
                                    More </a></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img-slider"><img class="hidden-xs"
                                                     src="https://dusyzh85wmzqh.cloudfront.net/uploads/banner-one-ibc-now-offering-vietnam-incorporations-1569549262.png"
                                                     alt="One IBC is now offering Vietnam Incorporations"
                                                     title="One IBC is now offering Vietnam Incorporations"> <img
                                    class="hidden-md"
                                    src="https://dusyzh85wmzqh.cloudfront.net/uploads/banner-one-ibc-now-offering-vietnam-incorporations-m-1569549263.png"
                                    alt="One IBC is now offering Vietnam Incorporations"
                                    title="One IBC is now offering Vietnam Incorporations"></div>
                        <div class="carousel-caption">
                            <div class="container"><h1>One IBC is now offering Vietnam Incorporations</h1>
                                <p>Free 3 Months Virtual Office Services</p> <a class="btn btn-default"
                                                                                href="https://www.offshorecompanycorp.com/promotion/one-ibc-is-now-offering-vietnam-incorporations"
                                                                                target="_self"
                                                                                title="One IBC is now offering Vietnam Incorporations">
                                    Learn More </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>