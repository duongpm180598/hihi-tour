<?php
/*
 * Template Name: Hihi go to
 * Template Post Type: page
 */
get_header();

// 1. Lấy biến paged cho phân trang
// Thủ thuật quan trọng cho Page Template
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$paged = (get_query_var('page')) ? get_query_var('page') : $paged;

// 2. Thiết lập đối số Truy vấn ĐỘNG (Query Arguments)
$args = array(
    'post_type'      => 'post',
    // Lấy giá trị từ Settings > Reading > "Blog pages show at most"
    'posts_per_page' => get_option('posts_per_page'),
    'paged'          => $paged // Truyền số trang hiện tại vào query
);

$blog_posts = new WP_Query($args);
$current_lang = pll_current_language('slug');
?>

<section class="py-16 container mx-auto px-4 md:px-0 max-w-7xl">
    <h2 class="text-[#74797A] text-4xl mb-4 font-semibold font-delta-gothic"><?php echo $current_lang === 'en' ? "Our blog about our journeys going all around" : "Blog về những chuyến đi khắp nơi của chúng tôi" ?></h2>

    <p class="text-[#101F23] mb-12 text-lg font-light"><?php echo $current_lang === 'en' ? "(Mostly Vietnam though) You can take this as your travel reference :>" : "Bạn có thể lấy đây làm tài liệu tham khảo khi đi du lịch (ở Việt Nam nha) :>" ?></p>

    <!-- Blog Post Grid -->
    <div class="space-y-12 md:space-y-16">
        <?php
        if ($blog_posts->have_posts()) :
            while ($blog_posts->have_posts()) : $blog_posts->the_post();
        ?>
                <article
                    id="post-<?php the_ID(); ?>"
                    <?php post_class('
                    overflow-hidden transition duration-300 md:flex
                '); ?>>

                    <div class="md:w-5/12 lg:w-4/12 flex-shrink-0">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('large', array(
                                    'class' => 'w-full h-72 md:h-full object-cover',
                                    'loading' => 'lazy'
                                ));
                            } else {
                                echo '<img src="https://placehold.co/600x400/81C784/ffffff?text=No+Image" class="w-full h-72 md:h-full object-cover rounded-t-3xl md:rounded-l-3xl md:rounded-tr-none" alt="Placeholder">';
                            }
                            ?>
                        </a>
                    </div>

                    <div class="md:w-7/12 lg:w-8/12 p-6 md:p-8 flex flex-col justify-center">

                        <h2 class="text-2xl md:text-3xl font-bold font-delta-gothic mb-3 leading-snug">
                            <a href="<?php the_permalink(); ?>" class="hover:text-[#C9E1A2] transition duration-150">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    $category_name = esc_html($category->name);

                                    echo '<span class="inline-block bg-[#C9E1A2] text-[#101F23] text-xs font-semibold px-3 py-1 rounded-full">';
                                    echo $category_name . ' ' . date('Y');
                                    echo '</span>';
                                }
                            }
                            ?>
                        </div>

                        <div class="text-[#74797A] mb-6 text-base leading-relaxed">
                            <?php the_excerpt(); ?>
                        </div>

                        <div class="mt-auto">
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center space-x-2 bg-[#2C2C2C] text-white text-sm font-medium px-5 py-2 rounded-lg hover:opacity-70 transition duration-150 shadow-md">
                                <span><?php echo $current_lang === 'en' ? "Explore" : "Khám phá" ?></span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            <?php
            endwhile;
            ?>
    </div>

    <!-- Phần Phân trang -->
    <div class="pagination flex justify-center mt-12">
        <?php
            $pagination_args = array(
                'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format'    => '?paged=%#%',
                'current'   => max(1, $paged),
                'total'     => $blog_posts->max_num_pages, // Tổng số trang
                'prev_text' => '<span class="px-3 py-2 border rounded-l-lg hover:bg-gray-100">&laquo; Bài cũ hơn</span>',
                'next_text' => '<span class="px-3 py-2 border rounded-r-lg hover:bg-gray-100">Bài mới hơn &raquo;</span>',
                'type'      => 'list', // Giúp dễ dàng style bằng Tailwind CSS hơn
            );

            $pagination_html = paginate_links($pagination_args);

            // Thêm class Tailwind cho các thẻ ul/li nếu cần (hoặc dùng CSS theme)
            $pagination_html = str_replace(
                ['<ul class=\'page-numbers\'>', 'page-numbers'],
                ['<ul class="flex space-x-1">', 'page-numbers px-3 py-2 border hover:bg-gray-100'],
                $pagination_html
            );

            echo $pagination_html;
        ?>
    </div>
</section>

<?php
            wp_reset_postdata();
        else :
            echo '<p class="container mx-auto px-4 py-16">Chưa có bài viết nào.</p>';
        endif;

        get_footer();
