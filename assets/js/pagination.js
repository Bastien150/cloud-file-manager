document.addEventListener('DOMContentLoaded', function() {
    function initializePagination(tableSelector, paginationSelector, itemsPerPage) {
        const table = document.querySelector(tableSelector);
        const pagination = document.querySelector(paginationSelector);
        const previousPage = pagination.querySelector('.page-item:first-child');
        const nextPage = pagination.querySelector('.page-item:last-child');
        let rows = table.querySelectorAll('tr');
        let currentPage = 1;
        const totalPages = Math.ceil(rows.length / itemsPerPage);

        function updateContent(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            rows.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        function updatePagination() {
            previousPage.classList.toggle('disabled', currentPage === 1);
            nextPage.classList.toggle('disabled', currentPage === totalPages);

            const pageItems = pagination.querySelectorAll('.page-item:not(:first-child):not(:last-child)');
            pageItems.forEach(item => item.remove());

            let startPage = Math.max(1, currentPage - 1);
            let endPage = Math.min(totalPages, currentPage + 1);

            if (currentPage === 1) {
                endPage = Math.min(totalPages, 3);
            } else if (currentPage === totalPages) {
                startPage = Math.max(1, totalPages - 2);
            }

            for (let i = startPage; i <= endPage; i++) {
                const li = document.createElement('li');
                li.classList.add('page-item');
                if (i === currentPage) {
                    li.classList.add('active');
                }
                const a = document.createElement('a');
                a.classList.add('page-link');
                a.href = '#';
                a.setAttribute('data-page', i);
                a.textContent = i;
                li.appendChild(a);
                nextPage.parentNode.insertBefore(li, nextPage);
            }
        }

        pagination.addEventListener('click', function(e) {
            e.preventDefault();
            const target = e.target.closest('a.page-link');
            if (!target) return;

            if (target.parentElement === previousPage && currentPage > 1) {
                currentPage--;
            } else if (target.parentElement === nextPage && currentPage < totalPages) {
                currentPage++;
            } else if (target.getAttribute('data-page')) {
                currentPage = parseInt(target.getAttribute('data-page'));
            }

            updateContent(currentPage);
            updatePagination();
        });

        // Initialisation
        updateContent(currentPage);
        updatePagination();
    }

    // Initialiser la pagination pour chaque tableau
    initializePagination('table#userTable tbody', 'nav#userPagination ul.pagination', 5);
    initializePagination('table#projectTable tbody', 'nav#projectPagination ul.pagination', 5);
});
