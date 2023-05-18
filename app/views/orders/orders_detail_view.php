<?php
use App\Route;
use Ramsey\Uuid\Uuid;

if (isset(Route::getQuery()["order"]) && Route::getQuery()["order"]!="") {
  ?>
  <div class="detail-order-info">
    <?php if(isset($data) && $data["Общая сумма"] > 0) { ?>
    <div class="progress-custom">
      <div class="progress__label h3-gray">
        Оплачено на
        <span class="progress__label-progress">0%</span>
      </div>

      <div class="progress__bar">
        <div class="progress__bar-progress"></div>
      </div>
      <span class="progress__total-label">Общая сумма:
        <?php 
          if(isset($data) && isset($data["Операции"])){
            $payed_sum=0;
            foreach($data["Операции"] as $row){
              $payed_sum+=$row["Сумма"];
            }
            echo  $payed_sum . ' р. /' . $data["Общая сумма"] . " р.";
          }
        ?>
      </span>
    </div>
    <div class="detail-order-info__main">
      <div class="detail-order-info__main-point"><strong>Поставщик:</strong>
        <?php echo $data["Наименование"] ? $data["Наименование"] : '[Нет информации]' ?>
      </div>
      <div class="detail-order-info__main-point"><strong>Адрес:</strong>
        <?php echo $data["Адрес"] ? $data["Адрес"] : '[Нет информации]' ?>
      </div>
      <div class="detail-order-info__main-point"><strong>Телефон:</strong>
        <?php echo $data["Телефон"] ? $data["Телефон"] : '[Нет информации]' ?>
      </div>
      <div class="detail-order-info__main-point"><strong>Факс:</strong>
        <?php echo $data["Факс"] ? $data["Факс"] : '[Нет информации]' ?>
      </div>
      <div class="detail-order-info__main-point"> <strong>Эл. адрес:</strong> 
        <?php echo $data["Эл. адрес"] ? $data["Эл. адрес"] : '[Нет информации]' ?>
      </div>
      <div class="detail-order-info__main-point">
      </div>
      <div class="detail-order-info__main-point">
      </div>
      <div class="detail-order-info__main-point detail-order-info__main-point--special"><span class="remark-container">ДОБАВИТЬ ОПЛАТУ:<span class="remark">BETA</span></span>  

        <form action="/payments/add" method="POST" class="form-inline">
          <?php echo '<input type="hidden" class="form-custom__input" name="order" placeholder="Заказ" value="' . Route::getQuery()["order"] . '">' ?>
          <button class="button-water">Оплатить </button>
        </form>

      </div>
    </div>
    <?php }else{ ?>
      <div class="alert alert-danger mb-3">
      По выбранному заказу отсутствуют товары для оформления. Пожалуйста, добавьте товары к заказу
      </div>
      <?php } ?>
  </div>
  <?php

} ?>

<h3 class="h3-gray">Выберите заказ, по которому необходимо отобразить детальную информацию</h3>
<form method="GET" class="form--select-submit">
  <?php

  include 'app/includes/orders-choice.php';
  ?>
</form>

<script type="module">
  import { Progress } from '/js/main.js';
  const root = document.querySelector(".progress-custom");
  let data = <?php echo json_encode($data, JSON_HEX_TAG); ?>;

  new Progress(root, data);
</script>