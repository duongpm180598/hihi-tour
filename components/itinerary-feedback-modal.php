<?php
$feedback_translations = load_lang();
$feedback_global = $feedback_translations['global'] ?? [];
$feedback_options = hihi_itinerary_feedback_options();
?>
<div
    id="itinerary-feedback-modal"
    class="itinerary-feedback-modal"
    data-option-set-version="<?php echo esc_attr(HIHI_ITINERARY_FEEDBACK_VERSION); ?>"
    hidden>
    <div class="itinerary-feedback-modal__backdrop" data-feedback-close></div>
    <div
        class="itinerary-feedback-modal__dialog"
        role="dialog"
        aria-modal="true"
        aria-labelledby="itinerary-feedback-title"
        aria-describedby="itinerary-feedback-description">
        <div class="itinerary-feedback-modal__handle" aria-hidden="true"></div>
        <button
            type="button"
            class="itinerary-feedback-modal__close"
            data-feedback-close
            aria-label="<?php echo esc_attr($feedback_global['feedback_modal_0_close_label'] ?? ''); ?>">
            <span aria-hidden="true">&times;</span>
        </button>

        <header class="itinerary-feedback-modal__header">
            <div class="itinerary-feedback-modal__icon" aria-hidden="true">?</div>
            <div>
                <h2 id="itinerary-feedback-title" class="itinerary-feedback-modal__title">
                    <?php echo esc_html($feedback_global['feedback_modal_0_title'] ?? ''); ?>
                </h2>
                <p id="itinerary-feedback-description" class="itinerary-feedback-modal__description">
                    <?php echo esc_html($feedback_global['feedback_modal_0_description'] ?? ''); ?>
                </p>
            </div>
        </header>

        <form id="itinerary-feedback-form" class="itinerary-feedback-modal__form">
            <fieldset class="itinerary-feedback-modal__options">
                <legend class="screen-reader-text">
                    <?php echo esc_html($feedback_global['feedback_modal_0_title'] ?? ''); ?>
                </legend>
                <?php foreach ($feedback_options as $index => $option) : ?>
                    <?php $label_key = "feedback_modal_0_option_{$index}_label"; ?>
                    <label class="itinerary-feedback-modal__option">
                        <input
                            type="radio"
                            name="destination"
                            value="<?php echo esc_attr($option['id']); ?>">
                        <span class="itinerary-feedback-modal__option-content">
                            <span class="itinerary-feedback-modal__option-index" aria-hidden="true">
                                <?php echo esc_html(sprintf('%02d', $index + 1)); ?>
                            </span>
                            <span class="itinerary-feedback-modal__option-label">
                                <?php echo esc_html($feedback_global[$label_key] ?? ''); ?>
                            </span>
                            <span class="itinerary-feedback-modal__option-control" aria-hidden="true"></span>
                        </span>
                    </label>
                <?php endforeach; ?>
            </fieldset>

            <div class="itinerary-feedback-modal__footer">
                <p
                    id="itinerary-feedback-status"
                    class="itinerary-feedback-modal__status"
                    data-required-message="<?php echo esc_attr($feedback_global['feedback_modal_0_required_message'] ?? ''); ?>"
                    data-success-message="<?php echo esc_attr($feedback_global['feedback_modal_0_success_message'] ?? ''); ?>"
                    data-error-message="<?php echo esc_attr($feedback_global['feedback_modal_0_error_message'] ?? ''); ?>"
                    aria-live="polite"></p>

                <button type="submit" class="itinerary-feedback-modal__submit">
                    <span><?php echo esc_html($feedback_global['feedback_modal_0_submit_label'] ?? ''); ?></span>
                </button>
            </div>
        </form>
    </div>
</div>
