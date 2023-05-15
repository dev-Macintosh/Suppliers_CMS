<?php
use App\Route;
use Ramsey\Uuid\Uuid;

if (isset(Route::getQuery()["order"])) {
  ?>

  <div class="progress-custom">
    <div class="progress__label h3-gray">
      Оплачено на
      <span class="progress__label-progress">0%</span>
    </div>

    <div class="progress__bar">
      <div class="progress__bar-progress"></div>
    </div>
    <span class="progress__total-label">Общая сумма:
      <?php echo $data["Общая сумма"] . " р." ?>
    </span>
  </div>

  <?php
} ?>

<h3 class="h3-gray">Выберите заказ, по которому необходимо отобразить детальную информацию</h3>
<form method="GET" class="form--select-submit">
  <?php

  include 'app/includes/orders-choice.php';
  View::printData($data);
  ?>
</form>

<script type="module">
  import { Progress } from '/js/main.js';
  const root = document.querySelector(".progress-custom");
  let data = <?php echo json_encode($data, JSON_HEX_TAG); ?>;

  new Progress(root, data);
</script>