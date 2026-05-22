<?php
/*
 * Template Name: Thank you
 * Template Post Type: page
 */
get_header();
$current_lang = pll_current_language('slug');

$theme_uri = get_template_directory_uri();
?>

<div class="flex flex-col space-y-3 justify-center items-center h-[calc(100vh-380px)]">
    <div class="mb-8" style="max-width: 400px">
        <img class="object-cover" src="<?php echo $theme_uri . '/assets/images/logo.jpg' ?>" alt="logo" />
    </div>
    <h3 class="text-2xl font-bold"><?php echo $current_lang === 'en' ? "Your information has flown the nest" : "Thông tin của bạn đã ghi lại" ?></h3>
    <p class="text-center">
        <?php echo $current_lang === 'en' ? "We will contact you within 48 hours for confirmation! Check your direct." : "Chúng tôi sẽ liên hệ lại với bạn trong vòng 48 giờ để xác nhận! Vui lòng kiểm tra email của bạn." ?> <br />
        <?php echo $current_lang === 'en' ? "Thank you very much for choosing Hi Hi tour." : "Cảm ơn quý khách rất nhiều vì đã lựa chọn Hi Hi tour." ?>
    </p>
</div>

<?php get_footer(); ?>