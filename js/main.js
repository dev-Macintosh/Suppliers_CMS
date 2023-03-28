function parallax_height() {
    var scroll_top = $(this).scrollTop();
    var sample_section_top = $(".content").offset().top;
    var header_height = $(".header-section").outerHeight();
    $(".content").css({ "margin-top": header_height });
    $(".header").css({ height: header_height - scroll_top });
}
parallax_height();
$(window).scroll(function () {
    parallax_height();
});
$(window).resize(function () {
    parallax_height();
});