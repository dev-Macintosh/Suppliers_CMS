function parallax_height() {
    var scroll_top = $(window).scrollTop();
    var sample_section_top = $(".content").offset().top;
    var header_height = $(".header-section").outerHeight();
    $(".content").css({ "margin-top": header_height + 200 });
    $(".header").css({ height: header_height - scroll_top + 200 });
}
parallax_height();
$(window).scroll(function() {
    parallax_height();
});
$(window).resize(function() {
    parallax_height();
});
export class Progress {
    constructor(node, data) {
        this.node = node;
        this.currentWidth = 0;
        this.maxWidth = 0;
        if (!this.node) return;
        //-----------------------
        let payed_sum = 0;
        data["Операции"].forEach(element => {
            payed_sum += Number.parseInt(element["Сумма"]);
            this.node.querySelector(".progress__bar").innerHTML += `<div style="left: ` +
                (Number.parseInt(payed_sum) / data["Общая сумма"]) * Number.parseInt(this.node.querySelector(".progress__bar").getBoundingClientRect().width) +
                `px;opacity:1"` + `class="progress__bar-transaction"><span class="progress__bar-transaction__point"></span>
                <div class="progress__bar-transaction-info">
                  <div class="progress__bar-transaction-info__price">Сумма: ` + element["Сумма"] + `р.</div>
                  <div class="progress__bar-transaction-info__type">Способ оплаты: ` + element["Тип"] + `</div>
                </div>
              </div>`;
        });
        this.maxWidth = Math.floor(Number.isNaN(payed_sum / data["Общая сумма"]) ? 0 : (payed_sum / data["Общая сумма"]) * 100);
        delete window.payed_sum;
        //------------------------------
        this.animation = this.animation.bind(this);
        this.label = this.node.querySelector(".progress__label-progress");
        this.bar = this.node.querySelector(".progress__bar-progress");
        this.interval = setInterval(this.animation, 30);
    }

    animation() {
        if (this.currentWidth >= this.maxWidth) {
            clearInterval(this.interval);
        } else {
            this.currentWidth++;
            this.label.textContent = this.currentWidth + "%";
            this.bar.style.width = this.currentWidth + "%";
        }
    }
}