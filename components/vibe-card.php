<?php
/**
 * Vibe Card Component
 *
 * Required variables:
 *   $vibe_title — short section label.
 *   $vibe_items — array of items with icon, title, val.
 *
 * Optional variables:
 *   $vibe_class — extra classes on root.
 *   $vibe_style — inline style on root.
 *   $vibe_destination_title — destination reminder bubble.
 *
 * Usage:
 *   $vibe_title = 'trip vibe';
 *   $vibe_items = [
 *       ['icon' => 'human', 'title' => 'trip style', 'val' => 'calm, scenic'],
 *   ];
 *   include get_template_directory() . '/components/vibe-card.php';
 */

$vibe_class = $vibe_class ?? '';
$vibe_style = $vibe_style ?? '';
$vibe_destination_title = $vibe_destination_title ?? '';
?>
<div class="vibe-card <?php echo esc_attr($vibe_class); ?>" style="<?php echo esc_attr($vibe_style); ?>">
    <?php if ($vibe_destination_title !== ''): ?>
        <h1 class="vibe-card__destination-title">
            <?php echo esc_html($vibe_destination_title); ?>
        </h1>
    <?php endif; ?>
    <p class="vibe-card__header">
        <?php echo esc_html($vibe_title); ?>
    </p>
    <div class="vibe-card__grid">
        <?php foreach ($vibe_items as $v):
            $icon_url = esc_url(get_template_directory_uri() . '/assets/icons/' . $v['icon'] . '.svg');
        ?>
        <div class="vibe-card__item">
            <div class="vibe-card__icon">
                <img src="<?php echo $icon_url; ?>" alt="" width="18" height="18" style="filter:brightness(0) invert(1);" aria-hidden="true" />
            </div>
            <div class="vibe-card__text">
                <span class="vibe-card__title"><?php echo esc_html($v['title']); ?></span>
                <span class="vibe-card__val"><?php echo esc_html($v['val']); ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php unset($vibe_destination_title); ?>
