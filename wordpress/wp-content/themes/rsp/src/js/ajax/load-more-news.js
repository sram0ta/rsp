document.addEventListener("DOMContentLoaded", () => {
    const button = document.querySelector(".news__button-more");
    const container = document.querySelector(".news__inner");

    if (!button || !container || !window.NewsLoadMore) return;

    let page = 1;
    const maxPages = Number(NewsLoadMore.maxPages);
    let isLoading = false;

    button.addEventListener("click", async () => {
        if (isLoading) return;

        isLoading = true;
        page++;
        button.disabled = true;

        try {
            const res = await fetch(NewsLoadMore.ajaxUrl, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: new URLSearchParams({
                    action: "load_more_news",
                    page: page,
                }),
            });

            const html = await res.text();

            if (html.trim()) {
                container.insertAdjacentHTML("beforeend", html);
            }

            if (page >= maxPages) {
                button.style.display = "none";
            }

        } catch (e) {
            console.error(e);
            page--;
        } finally {
            isLoading = false;
            button.disabled = false;
        }
    });
});
