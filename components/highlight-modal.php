<?php
/**
 * Reusable highlight modal.
 *
 * Expected variables:
 * - $highlight_modal_highlights
 * - $highlight_modal_prev_label
 * - $highlight_modal_next_label
 * - $highlight_modal_preview_label
 */

$highlight_modal_highlights = $highlight_modal_highlights ?? [];
$highlight_modal_prev_label = $highlight_modal_prev_label ?? 'Previous';
$highlight_modal_next_label = $highlight_modal_next_label ?? 'Next';
$highlight_modal_preview_label = $highlight_modal_preview_label ?? 'Preview image';

$highlight_modal_items = array_map(function($h) {
    $base_uri = get_template_directory_uri();
    $resolve_img = function($p) use ($base_uri) {
        if (function_exists('hihi_normalize_image_url')) {
            return hihi_normalize_image_url($p);
        }

        return preg_match('#^https?://#i', (string) $p) ? $p : $base_uri . $p;
    };
    $imgs = isset($h['imgs']) && is_array($h['imgs'])
        ? array_map($resolve_img, $h['imgs'])
        : [$resolve_img($h['img'] ?? '')];

    return [
        'imgs'     => $imgs,
        'tag_en'   => $h['tag_en'] ?? '',
        'tag_vi'   => $h['tag_vi'] ?? '',
        'title_en' => $h['title_en'] ?? '',
        'title_vi' => $h['title_vi'] ?? '',
        'desc_en'  => $h['desc_en'] ?? '',
        'desc_vi'  => $h['desc_vi'] ?? '',
    ];
}, $highlight_modal_highlights);
?>

<!-- ── Highlights Modal ── -->
<div
    id="highlights-modal"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-title"
    style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(29,41,44,.7); backdrop-filter:blur(4px); align-items:center; justify-content:center; padding:16px;"
    onclick="if(event.target===this) closeHighlight()"
>
    <div style="background:#F2F2F0; border-radius:16px; max-width:860px; width:100%; max-height:90vh; overflow-y:auto; position:relative; box-shadow:0 24px 48px rgba(0,0,0,.3); display:flex; flex-direction:column;">
        <button
            onclick="closeHighlight()"
            aria-label="Close"
            style="position:absolute; top:12px; right:12px; z-index:10; width:36px; height:36px; border-radius:50%; background:rgba(29,41,44,.6); border:none; cursor:pointer; display:flex; align-items:center; justify-content:center;"
        >
            <svg width="16" height="16" fill="none" stroke="#F2F2F0" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div style="width:100%; max-width:min(100%, 820px); margin:0 auto; padding:18px 18px 0; display:flex; gap:10px; align-items:flex-start;">
            <div style="flex:1 1 auto; min-width:0; aspect-ratio:4/3; max-height:60vh; overflow:hidden; border-radius:14px; position:relative; background:#1D292C;">
                <img id="modal-img" src="" alt="" style="width:100%; height:100%; object-fit:cover; display:block; transition:opacity .2s;" />
            </div>
            <div id="img-thumbs" style="display:none; flex-direction:column; flex:0 0 78px; width:78px; max-height:60vh; gap:8px; overflow-y:auto; padding-right:2px;"></div>
        </div>

        <div style="overflow-y:auto; padding:18px 28px 24px; display:flex; flex-direction:column;">
            <div>
                <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:16px; margin-bottom:12px;">
                    <h3 id="modal-title" style="font-size:22px; font-weight:700; color:#1D292C; margin:0; line-height:1.3; min-width:0;"></h3>
                    <div style="display:flex; align-items:center; gap:10px; flex:0 0 auto;">
                        <button onclick="navHighlight(-1)" aria-label="<?php echo esc_attr($highlight_modal_prev_label); ?>" style="display:flex; align-items:center; justify-content:center; width:32px; height:32px; background:none; border:1.5px solid #1D292C; border-radius:999px; padding:0; cursor:pointer; color:#1D292C;">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 18l-6-6 6-6"/></svg>
                        </button>
                        <span id="modal-counter" style="font-size:12px; color:#74797A; white-space:nowrap;"></span>
                        <button onclick="navHighlight(1)" aria-label="<?php echo esc_attr($highlight_modal_next_label); ?>" style="display:flex; align-items:center; justify-content:center; width:32px; height:32px; background:none; border:1.5px solid #1D292C; border-radius:999px; padding:0; cursor:pointer; color:#1D292C;">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 18l6-6-6-6"/></svg>
                        </button>
                    </div>
                </div>
                <p id="modal-desc" style="font-size:15px; color:#474E50; line-height:1.7; margin:0;"></p>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    var lang = document.documentElement.lang || (window.location.pathname.includes('/vi') ? 'vi' : 'en');
    var data = <?php echo json_encode($highlight_modal_items, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG); ?>;
    var previewImageLabel = <?php echo json_encode($highlight_modal_preview_label, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG); ?>;
    var current = 0;
    var imgCurrent = 0;
    var modal = document.getElementById('highlights-modal');
    var modalImg = document.getElementById('modal-img');
    var thumbsEl = document.getElementById('img-thumbs');

    if (!modal || !modalImg || !thumbsEl || !data.length) return;

    function renderThumbs(imgs, active) {
        thumbsEl.innerHTML = '';
        thumbsEl.style.display = 'flex';
        imgs.forEach(function(src, idx) {
            var thumb = document.createElement('button');
            thumb.type = 'button';
            thumb.setAttribute('aria-label', previewImageLabel + ' ' + (idx + 1));
            thumb.style.cssText = 'flex:0 0 74px; width:74px; height:54px; border-radius:8px; overflow:hidden; padding:0; border:' + (idx === active ? '2px solid #1D292C' : '2px solid transparent') + '; background:none; cursor:pointer;';
            thumb.innerHTML = '<img src="' + src + '" alt="" style="width:100%; height:100%; object-fit:cover; display:block;">';
            thumb.addEventListener('click', function() { setImg(idx); });
            thumbsEl.appendChild(thumb);
        });
    }

    function setImg(imgIdx) {
        var imgs = data[current].imgs;
        imgCurrent = (imgIdx + imgs.length) % imgs.length;
        modalImg.style.opacity = '0';
        setTimeout(function() {
            modalImg.src = imgs[imgCurrent];
            modalImg.style.opacity = '1';
        }, 100);
        renderThumbs(imgs, imgCurrent);
    }

    function renderCard(i) {
        var h = data[i];
        var isEn = lang !== 'vi';
        imgCurrent = 0;
        modalImg.src = h.imgs[0];
        modalImg.style.opacity = '1';
        modalImg.alt = isEn ? h.title_en : h.title_vi;
        document.getElementById('modal-title').textContent = isEn ? h.title_en : h.title_vi;
        document.getElementById('modal-desc').textContent = isEn ? h.desc_en : h.desc_vi;
        document.getElementById('modal-counter').textContent = (i + 1) + ' / ' + data.length;
        renderThumbs(h.imgs, 0);
    }

    window.openHighlight = function(i) {
        current = i;
        renderCard(current);
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        setTimeout(function() { modal.querySelector('button').focus(); }, 50);
    };

    window.closeHighlight = function() {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    };

    window.navHighlight = function(dir) {
        current = (current + dir + data.length) % data.length;
        renderCard(current);
    };

    document.addEventListener('keydown', function(e) {
        if (modal.style.display !== 'flex') return;
        if (e.key === 'Escape') { closeHighlight(); return; }
        if (e.key === 'ArrowRight') { navHighlight(1); }
        if (e.key === 'ArrowLeft') { navHighlight(-1); }
        if (e.key === 'ArrowDown') { e.preventDefault(); setImg(imgCurrent + 1); }
        if (e.key === 'ArrowUp') { e.preventDefault(); setImg(imgCurrent - 1); }
    });

    document.querySelectorAll('.highlight-card').forEach(function(card) {
        card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openHighlight(parseInt(card.getAttribute('data-index')));
            }
        });
    });
})();
</script>
