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
