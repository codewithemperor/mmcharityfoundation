(function ($) {
    ("use strict");
    window.addEventListener("load", function () {
        var preloader = document.getElementById("preloader");
        preloader.style.display = "none";
        document.body.style.overflow = "visible";
    });
    var banner1 = $(".banner-wrap");
    banner1.owlCarousel({ dots: true, loop: true, nav: false, items: 1, autoplay: true, autoplay: 5000, animateOut: "fadeOut" });
    $(".banner-2").owlCarousel({ dots: false, loop: true, nav: true, navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"], autoplay: true, items: 1 });
    new WOW().init();
    $(".events-wrap").owlCarousel({
        nav: true,
        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
        dots: false,
        loop: true,
        margin: 40,
        autoplay: true,
        responsiveClass: true,
        responsive: { 0: { items: 1 }, 768: { items: 1 }, 992: { items: 2, margin: 20 } },
    });
    $(".p-wrap").owlCarousel({
        nav: true,
        navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
        dots: false,
        loop: true,
        margin: 20,
        autoplay: true,
        responsiveClass: true,
        responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 } },
    });
    $(".vedio-popup").magnificPopup({ type: "iframe", mainClass: "mfp-fade", removalDelay: 160, preloader: true, fixedContentPos: false });
    let donation_amount = $(".button-amount");
    donation_amount.on("click", function () {
        donation_amount.removeClass("active");
        $(this).addClass("active");
        var amount = $(this).find(".amount-inner").text();
        $(".donate-input").val(amount);
    });
    $(".counter").counterUp({ delay: 50, time: 3000 });
    if ($.fn.stellar) {
        $(window).stellar({ responsive: true, positionProperty: "position", horizontalScrolling: false });
    }
    $.scrollUp({ scrollText: "<i class='fa fa-angle-up'></i>", scrollDistance: 300 });
    $("select").niceSelect();
    $(".f-cause-wrap").owlCarousel({ dots: true, loop: true, nav: false, center: true, autoplay: true, items: 1 });
    $(".team-wrap").owlCarousel({
        loop: true,
        nav: true,
        autoplay: true,
        dots: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        margin: 30,
        responsiveClass: true,
        responsive: { 0: { items: 1, nav: true }, 480: { items: 2, nav: true }, 768: { items: 3 }, 992: { items: 4 } },
    });
    $(".partner-wrap").owlCarousel({ loop: true, nav: false, autoplay: true, margin: 30, dots: false, center: true, responsiveClass: true, responsive: { 0: { items: 1 }, 600: { items: 3 }, 1000: { items: 5 } } });
    var tabWrap = $(".tab-content");
    var tabClicker = $(".product-tab ul li");
    tabWrap.children("div").hide();
    $(".tab-content div").eq(0).show();
    tabClicker.on("click", function () {
        var tabName = $(this).data("tab");
        tabClicker.removeClass("active");
        $(this).addClass("active");
        var id = "#" + tabName;
        tabWrap.children("div").not(id).fadeOut(500).hide();
        tabWrap
            .children("div" + id)
            .fadeIn(1000)
            .show();
        return false;
    });
    $(".ourself-gallery").owlCarousel({ loop: true, nav: true, navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"], autoplay: true, items: 1, dots: false });
    $(".popup-image").magnificPopup({
        type: "image",
        preload: [0, 0],
        callbacks: {
            beforeOpen: function () {
                this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure animated zoomInUp");
            },
        },
        gallery: { enabled: true },
    });
    $("[data-shipping]").on("click", function () {
        if ($("[data-shipping]:checked").length > 0) {
            $("#shipping-address").slideDown();
        } else {
            $("#shipping-address").slideUp();
        }
    });
    $(".gallery").isotope({ itemSelector: ".grid-item" });
    var $gallery = $(".gallery").isotope();
    var filter = $(".filtering");
    filter.on("click", "span", function () {
        var filterValue = $(this).attr("data-filter");
        $gallery.isotope({ filter: filterValue });
    });
    filter.on("click", "span", function () {
        $(this).addClass("active").siblings().removeClass("active");
    });
    setTimeout(function () {
        $(".filtering .active").click();
    }, 4500);
    $(".cart-count");
    $(".qty-changer").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.html() == '<i class="fa fa-plus"></i>') {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });
    $(".cart-remove").on("click", function () {
        $(this).parents(".cart_item").hide(100);
    });
    if ($(".mailchimp").length > 0) {
        $(".mailchimp").ajaxChimp({ language: "es", callback: mailchimpCallback, url: "https://facebook.us17.list-manage.com/subscribe/post?u=e8c07b57e07350179b0d6325b&amp;id=437442d4eb" });
    }
    function mailchimpCallback(resp) {
        if (resp.result === "success") {
            $(".subscription-success")
                .html('<i class="fa fa-check"></i><br/>' + resp.msg)
                .fadeIn(1000);
            $(".subscription-error").fadeOut(500);
        } else if (resp.result === "error") {
            $(".subscription-error")
                .html('<i class="fa fa-times"></i><br/>' + resp.msg)
                .fadeIn(1000);
        }
    }
    $.ajaxChimp.translations.es = {
        submit: "Submitting...",
        0: "We have sent you a confirmation email",
        1: "Please enter a value",
        2: "An email address must contain a single @",
        3: "The domain portion of the email address is invalid (the portion after the @: )",
        4: "The username portion of the email address is invalid (the portion before the @: )",
        5: "This email address looks fake or invalid. Please enter a real email address",
    };
    jQuery(window).on("load", function (e) {
        $(".event-countown").syotimer({ year: 2024, month: 9, day: 9, hour: 20, minute: 30 });
    });
})(jQuery);
const navbar = document.querySelector(".navbar");
const navOffCanvasBtn = document.querySelectorAll(".offcanvas-nav-btn");
const navOffCanvas = document.querySelector(".navbar:not(.navbar-clone) .offcanvas-nav");
let bsOffCanvas;
function toggleOffCanvas() {
    if (bsOffCanvas) {
        bsOffCanvas._isShown ? bsOffCanvas.hide() : bsOffCanvas.show();
    }
}
if (navOffCanvas) {
    bsOffCanvas = new bootstrap.Offcanvas(navOffCanvas, { scroll: true });
    navOffCanvasBtn.forEach((button) => {
        button.addEventListener("click", toggleOffCanvas);
    });
}
function handleDropdownToggle(event) {
    const dropdownToggle = event.currentTarget;
    const submenu = dropdownToggle.nextElementSibling;
    if (!submenu.classList.contains("show")) {
        dropdownToggle
            .closest(".dropdown-menu")
            .querySelectorAll(".show")
            .forEach((el) => el.classList.remove("show"));
    }
    submenu.classList.toggle("show");
    const parentDropdown = dropdownToggle.closest("li.nav-item.dropdown.show");
    if (parentDropdown) {
        parentDropdown.addEventListener("hidden.bs.dropdown", () => {
            document.querySelectorAll(".dropdown-submenu .show").forEach((el) => el.classList.remove("show"));
        });
    }
    event.preventDefault();
    event.stopPropagation();
}
document.querySelectorAll(".dropdown-menu a.dropdown-toggle").forEach((toggle) => {
    toggle.addEventListener("click", handleDropdownToggle);
});
let header = document.querySelector("header nav.navbar");
let win = window;
win.addEventListener("scroll", function () {
    let scroll = win.scrollY || win.pageYOffset;
    if (scroll < 1) {
        header.classList.remove("scroll-on");
    } else {
        header.classList.add("scroll-on");
    }
});
