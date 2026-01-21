window.addEventListener("load", () => {
    ScrollTrigger.refresh();
});

window.addEventListener('DOMContentLoaded', function() {
    gsap.registerPlugin(ScrollTrigger);
    refreshFsLightbox();
    ScrollTrigger.refresh();
    scrollHeader();
});

const remToPx = rem => rem * parseFloat(getComputedStyle(document.documentElement).fontSize);

(function formCheckInit() {
    const findGroupCheckboxes = (toggleBtn, form) => {
        const scope = toggleBtn.closest('.form__check_wrap') || toggleBtn;
        let boxes = scope.querySelectorAll('.form__check_hide input[type="checkbox"]');
        if (!boxes.length) {
            boxes = form.querySelectorAll('.form__check_hide input[type="checkbox"]');
        }
        return Array.from(boxes);
    };

    const allChecked = (boxes) => boxes.length > 0 && boxes.every(cb => cb.checked);

    const syncToggleUi = (toggleBtn, boxes) => {
        const ok = allChecked(boxes);
        toggleBtn.classList.toggle('active', ok);
        if (ok) toggleBtn.classList.remove('error');
    };

    const attachToForm = (form) => {
        if (form.dataset.formCheckBound === '1') return;
        form.dataset.formCheckBound = '1';

        const toggles = Array.from(form.querySelectorAll('.form__check'));
        const submit  = form.querySelector('.button-send');

        toggles.forEach(toggleBtn => {
            const boxes = findGroupCheckboxes(toggleBtn, form);
            if (!boxes.length) return;

            syncToggleUi(toggleBtn, boxes);

            toggleBtn.addEventListener('click', () => {
                const nextState = !allChecked(boxes);
                boxes.forEach(cb => { cb.checked = nextState; });
                syncToggleUi(toggleBtn, boxes);
            });

            boxes.forEach(cb => {
                cb.addEventListener('change', () => {
                    syncToggleUi(toggleBtn, boxes);
                });
            });
        });

        if (submit) {
            submit.addEventListener('click', (e) => {
                let valid = true;

                toggles.forEach(toggleBtn => {
                    const boxes = findGroupCheckboxes(toggleBtn, form);
                    if (!boxes.length) return;

                    const ok = allChecked(boxes);
                    toggleBtn.classList.toggle('error', !ok);
                    if (!ok) valid = false;
                });

                if (!valid) {
                    e.preventDefault();
                    const firstError = form.querySelector('.form__check.error');
                    firstError?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        }
    };

    const mountAll = () => {
        document.querySelectorAll('.wpcf7 form').forEach(attachToForm);
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', mountAll);
    } else {
        mountAll();
    }

    const mo = new MutationObserver((mutations) => {
        for (const m of mutations) {
            if (m.type === 'childList' && (m.addedNodes?.length || m.removedNodes?.length)) {
                document.querySelectorAll('.wpcf7 form').forEach(attachToForm);
            }
        }
    });
    mo.observe(document.documentElement, { childList: true, subtree: true });

    document.addEventListener('wpcf7init', mountAll);
    document.addEventListener('wpcf7reset', mountAll);
})();

function scrollHeader() {
    const header = document.querySelector('header');
    if (!header) return;

    const activeClass = 'active';

    const toggleHeader = () => {
        if (window.scrollY > 0) {
            header.classList.add(activeClass);
        } else {
            header.classList.remove(activeClass);
        }
    };

    toggleHeader();

    window.addEventListener('scroll', toggleHeader);
}
