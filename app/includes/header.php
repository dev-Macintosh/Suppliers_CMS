<div class="header">
  <div class="header__wrapper">
    <div class="header__empty"></div>
    <div class="header-menu">
      <div class="header-menu__item">
        <a href="/main/index" class="header-menu__item__link">Главная</a>
        <div class="header-menu__item-sublock"></div>
      </div>
      <div class="header-menu__item">
        <a href="/suppliers/index" class="header-menu__item__link">Поставщики</a>
        <div class="header-menu__item-sublock">
          <span class="remark-container"> <a href="/suppliers/add" class="header-menu__item-sublock__item">Добавить
              поставщика</a><span class="remark remark-absolute">BETA</span></span>
        </div>
      </div>
      <div class="header-menu__item">
        <a href="/invoices/index" class="header-menu__item__link">Накладные</a>
        <?php if (Model_Auth::check_auth()) { ?>
          <div class="header-menu__item-sublock">

            <a href="/invoices/add" class="header-menu__item-sublock__item">Добавить накладную</a>
          </div>
        <?php } ?>
      </div>
      <div class="header-menu__item">
        <a href="/products/index" class="header-menu__item__link">Товары</a>
        <div class="header-menu__item-sublock">
          <a href="/products/add" class="header-menu__item-sublock__item">Добавить товар</a>
        </div>
      </div>
      <div class="header-menu__item">
        <span class="remark-container"> <a href="/orders/index" class="header-menu__item__link">Заказы</a> <span
            class="remark remark-absolute">BETA</span></span>

        <div class="header-menu__item-sublock">
          <a href="/orders/add" class="header-menu__item-sublock__item">Добавить заказ</a>
          <a href="/orders/ones" class="header-menu__item-sublock__item">Заказы детально</a>
        </div>
      </div>
    </div>
    <div class="header-menu__icons">
      <a class="header-menu__links">
        <img src="/images/icons/search.svg" alt="Иконка поиска" width="20">
      </a>
      <a class="header-menu__links" href="/auth/logout">
        <img src="/images/icons/user.svg" alt="Иконка личного кабинета" width="20">
      </a>
    </div>

  </div>
</div>