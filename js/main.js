function parallax_height() {
    var scroll_top = $(this).scrollTop();
    var sample_section_top = $(".content").offset().top;
    var header_height = $(".header-section").outerHeight();
    $(".content").css({ "margin-top": header_height + 200});
    $(".header").css({ height: header_height - scroll_top + 200});
}
parallax_height();
$(window).scroll(function () {
    parallax_height();
});
$(window).resize(function () {
    parallax_height();
});
class Progress {
    constructor(node, width) {
      this.node = node;
      this.defaultWidth = width;
      
      if(!this.node) return;
      
      this.animation = this.animation.bind(this);
      
      this.label = this.node.querySelector(".progress__label-progress");
      this.bar = this.node.querySelector(".progress__bar-progress");
      
      this.interval = setInterval(this.animation, 1000);
    }
    
    animation() {
      this.defaultWidth >= 99 ? clearInterval(this.interval) : null;
      this.defaultWidth++;
      this.label.textContent = this.defaultWidth + "%";
      this.bar.style.width = this.defaultWidth + "%";
      
      if(this.defaultWidth < 99) {
        window.requestAnimationFrame(this.animation);
      }
    }
  }
  
  const root = document.querySelector(".progress");
  var label = root.querySelector(".progress__label-progress").textContent.replace(/%/g, "");
  var obj = new Progress(root, +label);