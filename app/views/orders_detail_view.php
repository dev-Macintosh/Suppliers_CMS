<div class="progress">
    <div class="progress__label">
      Оплата на
      <span class="progress__label-progress">0%</span>
    </div>

    <div class="progress__bar">
      <div class="progress__bar-progress"></div>
    </div>
  </div>

  <h3>Выберите заказ, по которому необходимо отобразить детальную информацию</h2>
    <?php
    include 'app/includes/orders-choice.php';

View::printData($data);