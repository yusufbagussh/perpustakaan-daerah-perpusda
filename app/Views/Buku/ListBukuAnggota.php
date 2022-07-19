<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- ------------------------------------------------------------ -->
<div class="container mt-lg-5">
    <center>
        <div>
            <div class=" p-t-10">
                <br>
                <h2>Daftar Buku</h2>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Cari Judul Buku...">
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-2 kartu-konten" id="myProducts" style="display: none;">
                <?php foreach ($buku as $b) : ?>
                    <div class="col kartu mt-4">
                        <div class="card shadow-sm h-100">
                            <img src="/img/buku/<?= $b['buku_gambar']; ?>" class="card-img-top p-0 mt-3" alt="..." width="auto" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" style="">
                            <div class="card-body w-100" height="225">
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em" style="padding-top: 10px;">
                                    <div class="card-title"><?php echo $b['buku_judul'] ?></div>
                                </text>
                                <span class="badge bg-light text-dark"><?php echo $b['buku_penulis'] ?></span>
                                <br>
                                <span class="badge bg-info text-dark"><?php echo $b['kategori_nama'] ?></span>
                            </div>
                            <div class="card-footer">
                                <a href="/buku/detailbukuanggota/<?= $b['buku_slug']; ?>" class="btn btn-primary">Detail</a>
                                <a href="/pinjamkembali/index/<?= $b['buku_slug']; ?>" class="btn btn-success">Sewa</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="pagination mt-3 mb-4 justify-content-center">
            </div>
        </div>
    </center>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js" integrity="sha512-9Dh726RTZVE1k5R1RNEzk1ex4AoRjxNMFKtZdcWaG2KUgjEmFYN3n17YLUrbHm47CRQB1mvVBHDFXrcnx/deDA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function myFunction() {
        var input, filter, cards, cardContainer, title, i;
        input = document.getElementById("myFilter");
        filter = input.value.toUpperCase();
        cardContainer = document.getElementById("myProducts");
        cards = cardContainer.getElementsByClassName("col");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".card-title");
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>

<script type="text/javascript">
    function getPageList(totalPages, page, maxLength) {
        function range(start, end) {
            return Array.from(Array(end - start + 1), (_, i) => i + start);
        }

        var sideWidth = maxLength < 9 ? 1 : 2;
        var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
        var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

        if (totalPages <= maxLength) {
            return range(1, totalPages);
        }

        if (page <= maxLength - sideWidth - 1 - rightWidth) {
            return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
        }

        if (page >= totalPages - sideWidth - 1 - rightWidth) {
            return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
        }

        return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
    }

    $(function() {
        var numberOfItem = $(".kartu-konten .kartu").length;
        var limitPerPage = 8; //Banyak item pada satu halaman
        var totalPages = Math.ceil(numberOfItem / limitPerPage);
        var paginationSize = 5; //Banyak element pagination yang terlihat
        var currentPage;

        function showPage(whichPage) {
            if (whichPage < 1 || whichPage > totalPages) return false;

            currentPage = whichPage;

            $(".kartu-konten .kartu").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

            $(".pagination li").slice(1, -1).remove();

            getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                $("<li>").addClass("page-item").addClass(item ? "current-page" : "dot")
                    .toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
                        .attr({
                            href: "javascript:void(0)"
                        }).text(item || "...")).insertBefore(".next-page");
            });

            $(".previous-page").toggleClass("disabled", currentPage === 1);
            $(".next-page").toggleClass("disabled", currentPage === totalPages);
            return true;
        }

        $(".pagination").append(
            $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link").attr({
                href: "javascript:void(0)"
            }).text("prev")),
            $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link").attr({
                href: "javascript:void(0)"
            }).text("next"))
        );

        $(".kartu-konten").show();
        showPage(1);

        $(document).on("click", ".pagination li.current-page:not(.active)", function() {
            return showPage(+$(this).text());
        });

        $(".next-page").on("click", function() {
            return showPage(currentPage + 1);
        });

        $(".previous-page").on("click", function() {
            return showPage(currentPage - 1);
        });
    });
</script>
<?= $this->endSection('content'); ?>