<?php
use App\Route;
use Ramsey\Uuid\Uuid;

if (isset(Route::getQuery()["order"])) {
  ?>

  <div class="progress">
    <div class="progress__label h3-white">
      Оплачено на
      <span class="progress__label-progress">0%</span>
    </div>

    <div class="progress__bar">
      <div class="progress__bar-progress"></div>
    </div>
    <span class="progress__total-label">Общая сумма: <?php echo $data["Общая сумма"] . " р." ?></span>
  </div>

  <?php
} ?>
<h3 class="h3-white">Выберите заказ, по которому необходимо отобразить детальную информацию</h3>
<?php

include 'app/includes/orders-choice.php';
View::printData($data);
?>
<script type="module">
  import { Progress } from '/js/main.js';
  const root = document.querySelector(".progress");
  let data = <?php echo json_encode($data, JSON_HEX_TAG); ?>;

  new Progress(root, data);
</script>