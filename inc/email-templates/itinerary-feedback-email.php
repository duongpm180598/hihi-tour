<?php
/**
 * HTML email template for itinerary file delivery.
 * Expects: $subject, $message, $file_name in scope.
 */

$paragraphs = preg_split('/\n{2,}/', trim((string) $message));
$logo_url = get_template_directory_uri() . '/assets/images/logo_new.png';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo esc_html($subject); ?></title>
</head>

<body style="margin:0; padding:0; background:#f2f2f0; font-family:Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f2f2f0; padding:32px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px; background:#ffffff; border-radius:16px; overflow:hidden;">
                    <tr>
                        <td style="padding:24px 32px; background:#1d292c;" align="left">
                            <img src="<?php echo esc_url($logo_url); ?>" width="36" height="36" alt="Cari Wiki" style="display:block; border-radius:8px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <h1 style="margin:0 0 16px; font-size:22px; line-height:1.3; color:#1d292c;">
                                <?php echo esc_html($subject); ?>
                            </h1>

                            <?php foreach ($paragraphs as $paragraph) : ?>
                                <p style="margin:0 0 16px; font-size:15px; line-height:1.6; color:#474e50;">
                                    <?php echo nl2br(esc_html($paragraph)); ?>
                                </p>
                            <?php endforeach; ?>

                            <?php if ($file_name) : ?>
                                <table role="presentation" cellpadding="0" cellspacing="0" style="margin:8px 0 8px;">
                                    <tr>
                                        <td style="padding:14px 16px; background:#f9fbdf; border-radius:8px; font-size:14px; color:#1d292c;">
                                            📎 <strong><?php echo esc_html($file_name); ?></strong>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:16px 32px 28px; border-top:1px solid #f2f2f0;">
                            <p style="margin:0; font-size:13px; line-height:1.6; color:#a1a4a3;">
                                Cari Wiki &middot; <?php echo esc_html(home_url('/')); ?>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
