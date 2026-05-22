<?php

/**
 * The template for displaying all single posts.
 * * Đây là template hiển thị chi tiết của một bài viết (Post) đơn lẻ.
 */

get_header();
?>

<!-- 1. Vùng Ảnh Đại diện (Toàn chiều rộng) -->
<?php if (has_post_thumbnail()) : ?>
    <div class="relative w-full h-96 md:h-[600px] overflow-hidden">
        <?php
        // Hiển thị ảnh đại diện kích thước lớn nhất
        the_post_thumbnail('full', array(
            'class' => 'w-full h-full object-cover brightness-[0.85] saturate-110', // Thêm hiệu ứng nhẹ cho ảnh nổi bật hơn
            'loading' => 'eager' // Sử dụng eager loading cho ảnh chính
        ));
        ?>
        <!-- Overlay mờ (tùy chọn) -->
        <div class="absolute inset-0 bg-black/10"></div>
    </div>
<?php endif; ?>

<!-- 2. Vùng Nội dung Bài viết -->
<div class="bg-white py-12 md:py-20">
    <!-- Sử dụng container rộng hơn (ví dụ: max-w-4xl) cho nội dung đọc -->
    <div class="container mx-auto px-4 max-w-4xl">

        <?php
        // Bắt đầu vòng lặp WordPress để hiển thị bài viết
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white'); ?>>

                    <!-- Tiêu đề Bài viết -->
                    <div class="mb-8">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-[#101F23] mb-4 leading-snug">
                            <?php the_title(); ?>
                        </h1>

                        <!-- Thông tin Bài viết (Tác giả, Ngày đăng) -->
                        <!-- <div class="text-gray-500 text-sm flex items-center space-x-4">
                            <span>
                                Tác giả: <span class="font-medium text-[#74797A]"><?php the_author(); ?></span>
                            </span>
                            <span>|</span>
                            <span>
                                Ngày đăng: <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
                            </span>
                        </div> -->
                    </div>

                    <!-- Nội dung chính của Bài viết -->
                    <div class="entry-content prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        <?php
                        // Hiển thị toàn bộ nội dung bài viết
                        the_content();
                        ?>
                    </div>

                </article>

                <!-- Vùng Bình luận đã được loại bỏ theo yêu cầu. -->

        <?php
            endwhile; // Kết thúc vòng lặp
        else :
            // Nội dung nếu không tìm thấy bài viết
            echo '<p class="text-center text-gray-500">Xin lỗi, bài viết bạn tìm không tồn tại.</p>';
        endif;
        ?>

    </div>
</div>

<?php get_footer(); ?>