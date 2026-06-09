const $ = jQuery

const hash = window.location.hash

if (hash === '#faq') {
    const $target = $(hash)

    if ($target.length) {
        $('html, body').animate(
            {
                scrollTop: $target.offset().top - 50,
            },
            800
        )
    }
}
AOS.init({
    once: false,
})
const galleryContainers = document.querySelectorAll('.gallery-container')

galleryContainers.forEach(container => {
    lightGallery(container, {
        selector: 'img[data-src]',
        mode: 'lg-fade',
    })
})
$(document).ready(function () {
    const $targetBg = $('#target-bg')

    const initialImageUrl = $('.serene-button.font-bold').data('image-url')
    const initialActionImageUrl = $('.action-button.font-bold').data('image-url')
    if (initialImageUrl) {
        $targetBg.css('background-image', `url('${initialImageUrl}')`)
    }
    if (initialActionImageUrl) {
        $targetBg.css('background-image', `url('${initialActionImageUrl}')`)
    }
    $('.serene-button').on('click', function () {
        const newImageUrl = $(this).data('image-url')

        if ($targetBg.css('background-image').includes(newImageUrl)) {
            return
        }

        const $newBg = $('<div>')
            .addClass('h-full w-full absolute top-0 left-0 bg-cover bg-center')
            .css({
                'background-image': `url('${newImageUrl}')`,
                left: '100%',
            })
        $targetBg.css({ position: 'relative', overflow: 'hidden' })
        $targetBg.append($newBg)
        $targetBg.children().animate(
            {
                left: '-=100%',
            },
            500,
            function () {
                $targetBg.css('background-image', `url('${newImageUrl}')`)
                $newBg.remove()
                $targetBg.css('left', '0')
            }
        )
        $('.serene-button').removeClass('font-bold bg-[#A7E1CD]')
        $(this).addClass('font-bold bg-[#A7E1CD]')
    })

    $('.action-button').on('click', function () {
        const newImageUrl = $(this).data('image-url')

        if ($targetBg.css('background-image').includes(newImageUrl)) {
            return
        }

        const $newBg = $('<div>')
            .addClass('h-full w-full absolute top-0 left-0 bg-cover bg-center')
            .css({
                'background-image': `url('${newImageUrl}')`,
                left: '100%',
            })
        $targetBg.css({ position: 'relative', overflow: 'hidden' })
        $targetBg.append($newBg)
        $targetBg.children().animate(
            {
                left: '-=100%',
            },
            500,
            function () {
                $targetBg.css('background-image', `url('${newImageUrl}')`)
                $newBg.remove()
                $targetBg.css('left', '0')
            }
        )
        $('.action-button').removeClass('font-bold bg-[#CEE2FF]')
        $(this).addClass('font-bold bg-[#CEE2FF]')
    })

    const $btn = $('#btn-table-of-content')
    const $content = $('#toc-content')
    const $tocList = $('#toc-list')
    const hiddenClass = 'translate-x-full'

    const ACTIVE_CLASSES = 'bg-[#FAF9F7] font-semibold border-l-1 border-l-[#8ca865]'
    const INACTIVE_CLASSES = 'hover:bg-[#FAF9F7] hover:font-bold border-r-1 hover:border-l-[#8ca865]'

    function toggleToc(show) {
        if (show) {
            $content.removeClass(hiddenClass)
        } else {
            $content.addClass(hiddenClass)
        }
    }

    $btn.on('click', function (e) {
        e.stopPropagation()
        toggleToc($content.hasClass(hiddenClass))
    })

    function updateActiveEntry(targetId) {
        $tocList.find('li').each(function () {
            const $li = $(this)
            const $link = $li.find('a')

            if ($link.attr('href') === `#${targetId}`) {
                $li.addClass(ACTIVE_CLASSES.split(' '))
                $li.removeClass(INACTIVE_CLASSES.split(' ').filter(cls => cls.startsWith('hover:')))
            } else {
                $li.removeClass(ACTIVE_CLASSES.split(' '))
                INACTIVE_CLASSES.split(' ').forEach(cls => {
                    if (cls.startsWith('hover:') || cls.startsWith('border-')) {
                        $li.addClass(cls)
                    }
                })
            }
        })
    }

    const observerOptions = {
        root: null,
        rootMargin: '-10% 0px -70% 0px',
        threshold: 0,
    }

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                updateActiveEntry(entry.target.id)
            }
        })
    }, observerOptions)

    $tocList.find('a').each(function () {
        const id = $(this).attr('href').substring(1)
        const element = document.getElementById(id)
        if (element) observer.observe(element)
    })

    $tocList.on('click', 'a', function (e) {
        e.preventDefault()
        const targetId = $(this).attr('href').substring(1)
        const $targetSection = $('#' + targetId)

        if ($targetSection.length) {
            $('html, body').animate(
                {
                    scrollTop: $targetSection.offset().top - 100,
                },
                500
            )
        }

        toggleToc(false)
    })

    $(document).on('click', function (e) {
        if (!$content.hasClass(hiddenClass) && !$(e.target).closest('#toc-container').length) {
            toggleToc(false)
        }
    })
})

;(function () {
    const modal = document.getElementById('itinerary-feedback-modal')
    const form = document.getElementById('itinerary-feedback-form')
    const status = document.getElementById('itinerary-feedback-status')
    const settings = window.hihiItineraryFeedback

    if (!modal || !form || !status || !settings) {
        return
    }

    const storageKey = 'hihiItineraryFeedbackVersion'
    const submitButton = form.querySelector('button[type="submit"]')
    let previousFocus = null
    let closeTimer = null

    function hasVoted() {
        try {
            return window.localStorage.getItem(storageKey) === settings.optionSetVersion
        } catch (error) {
            return false
        }
    }

    function rememberVote() {
        try {
            window.localStorage.setItem(storageKey, settings.optionSetVersion)
        } catch (error) {
            // The vote still succeeds when browser storage is unavailable.
        }
    }

    function getFocusableElements() {
        return Array.from(
            modal.querySelectorAll(
                'button:not([disabled]), input:not([disabled]), [href], [tabindex]:not([tabindex="-1"])'
            )
        ).filter(element => !element.hasAttribute('hidden'))
    }

    function openModal() {
        if (hasVoted()) {
            return
        }

        window.clearTimeout(closeTimer)
        previousFocus = document.activeElement
        form.reset()
        status.textContent = ''
        status.className = 'itinerary-feedback-modal__status'
        submitButton.disabled = false
        modal.hidden = false
        document.body.classList.add('itinerary-feedback-open')

        const firstOption = form.querySelector('input[name="destination"]')
        if (firstOption) {
            window.setTimeout(() => firstOption.focus(), 50)
        }
    }

    function closeModal() {
        if (modal.hidden) {
            return
        }

        window.clearTimeout(closeTimer)
        modal.hidden = true
        document.body.classList.remove('itinerary-feedback-open')

        if (previousFocus && typeof previousFocus.focus === 'function') {
            previousFocus.focus()
        }
    }

    document.addEventListener('click', event => {
        const downloadLink = event.target.closest('[data-itinerary-download]')
        if (downloadLink && !event.defaultPrevented) {
            window.setTimeout(openModal, 450)
            return
        }

        if (event.target.closest('[data-feedback-close]')) {
            closeModal()
        }
    })

    document.addEventListener('keydown', event => {
        if (modal.hidden) {
            return
        }

        if (event.key === 'Escape') {
            closeModal()
            return
        }

        if (event.key !== 'Tab') {
            return
        }

        const focusable = getFocusableElements()
        if (!focusable.length) {
            return
        }

        const first = focusable[0]
        const last = focusable[focusable.length - 1]

        if (event.shiftKey && document.activeElement === first) {
            event.preventDefault()
            last.focus()
        } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault()
            first.focus()
        }
    })

    form.addEventListener('submit', event => {
        event.preventDefault()

        const selected = form.querySelector('input[name="destination"]:checked')
        if (!selected) {
            status.textContent = status.dataset.requiredMessage
            status.className = 'itinerary-feedback-modal__status is-error'
            return
        }

        submitButton.disabled = true
        status.textContent = ''
        status.className = 'itinerary-feedback-modal__status'

        const body = new URLSearchParams({
            action: settings.action,
            nonce: settings.nonce,
            optionId: selected.value,
        })

        window
            .fetch(settings.ajaxUrl, {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                },
                body: body.toString(),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Vote request failed')
                }
                return response.json()
            })
            .then(result => {
                if (!result.success) {
                    throw new Error('Vote was rejected')
                }

                rememberVote()
                status.textContent = status.dataset.successMessage
                status.className = 'itinerary-feedback-modal__status is-success'
                closeTimer = window.setTimeout(closeModal, 1400)
            })
            .catch(() => {
                status.textContent = status.dataset.errorMessage
                status.className = 'itinerary-feedback-modal__status is-error'
                submitButton.disabled = false
            })
    })
})()
