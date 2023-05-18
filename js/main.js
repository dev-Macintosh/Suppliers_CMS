import * as UUID from "/js/uuid.js";
const goTopBtn = document.querySelector(".go-top");
setInterval(()=>{
    choicePageSlide();
},15000)

window.addEventListener("scroll", trackScroll);
goTopBtn.addEventListener("click", goTop);

function trackScroll() {
    const scrolled = window.pageYOffset;
    const coords = document.documentElement.clientHeight;
    if (scrolled > coords / 2) {
        goTopBtn.classList.add("go-top--show");
    } else {
        goTopBtn.classList.remove("go-top--show");
    }
}

function goTop() {

    if (window.pageYOffset > 0) {
        window.scrollBy(0, -10);
        setTimeout(goTop, 0);
    }
}

export class Progress {
    constructor(node, data) {
        this.node = node;
        this.currentWidth = 0;
        this.maxWidth = 0;
        if (!this.node) return;

        let payed_sum = 0;
        data["Операции"].forEach((element, index) => {
            payed_sum += Number.parseInt(element["Сумма"]);
            let percentProgress = (Number.parseInt(payed_sum) / data["Общая сумма"]) * Number.parseInt(this.node.querySelector(".progress__bar").getBoundingClientRect().height);
            let maxHeightProgress = this.node.querySelector(".progress__bar").getBoundingClientRect().height;
            this.node.querySelector(".progress__bar").innerHTML += `<div style="top: ` +
                (percentProgress > maxHeightProgress ? maxHeightProgress : percentProgress) +
                `px;opacity:1"` + `class="progress__bar-transaction"><span class="progress__bar-transaction__point` + (index == 0 ? ` hover` : ` `) + `"></span>
                <div class="progress__bar-transaction-info">
                  <div class="progress__bar-transaction-info__price">Сумма: ` + element["Сумма"] + `р.</div>
                  <div class="progress__bar-transaction-info__type">Способ оплаты: ` + element["Тип оплаты"] + `</div>
                  <div class="progress__bar-transaction-info__type">Индентификатор транзакции: ` + UUID.uuidv4() + `</div>
                  <form class="form-inline" action="/payments/delete" method="POST"><input type="hidden" class="form-custom__input" name="payment" placeholder="Этап оплаты" value="` + element["ID Этапа оплаты"] + `"><input type="hidden" class="form-custom__input" name="order" placeholder="Этап оплаты" value="` + element["Код заказа"] + `"><button class="button-water progress__bar-transaction-info__delete">Удалить</button></form>
                </div>
              </div>`;
        });
        this.maxWidth = Math.floor(Number.isNaN(payed_sum / data["Общая сумма"]) ? 0 : (payed_sum / data["Общая сумма"]) * 100);
        delete window.payed_sum;

        this.animation = this.animation.bind(this);
        this.label = this.node.querySelector(".progress__label-progress");
        this.bar = this.node.querySelector(".progress__bar-progress");
        this.interval = setInterval(this.animation, 15);
    }

    animation() {
        if (this.currentWidth >= this.maxWidth) {
            clearInterval(this.interval);
            setEventListenerPointProgress();
        } else {
            this.currentWidth++;
            this.label.textContent = this.currentWidth + "%";
            this.bar.style.height = this.currentWidth > 100 ? 100 : this.currentWidth + "%";
        }
    }
}

function onEntrySlide(entry) {
    entry.forEach(change => {
        if (change.isIntersecting) {
            change.target.classList.add('element-animation--show');
        }
    });
}
let optionsSlides = { threshold: [0.5] };
let observerSlides = new IntersectionObserver(onEntrySlide, optionsSlides);
let elementSlides = document.querySelectorAll('.element-animation');
for (let elm of elementSlides) {
    observerSlides.observe(elm);
}

function setEventListenerPointProgress() {
    let pointsProgress = $(".progress__bar-transaction__point");
    pointsProgress.on("mouseenter", function () {
        pointsProgress.removeClass("hover")
        $(this).addClass("hover");
    })
}
function choicePageSlide() {
    let arraySlides = $(".content__choice-page__wrapper").find(".content__choice-page__item");
    let i=0;
    let interval = setInterval(() => {
        if(i===arraySlides.length){
            clearInterval(interval);
        }
        arraySlides.removeClass("hover");
        $(arraySlides[i]).addClass("hover");
        i++;
    }, 400);
}