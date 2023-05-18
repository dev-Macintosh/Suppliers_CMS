<?php Model_Auth::flash() ?>

<button class="login-trigger" data-target="#login" data-toggle="modal">Войти</button>

<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button data-dismiss="modal" class="close">&times;</button>
        <h4>Вход</h4>
        <form action="/auth/login" method="POST">
          <input type="text" name="username" class="username form-control" placeholder="Логин"/>
          <input type="password" name="password" class="password form-control" placeholder="Пароль"/>
          <input class="btn login" type="submit" value="Вход" />
        </form>
      </div>
    </div>
  </div>  
</div>

<div class="container-info" style="display:flex;justify-content:space-between;max-width:800px;margin:0 auto;">
    <?php View::printData("Используйте логин:admin и пароль:admin \nдля входа в систему под администратором") ?>
    <?php View::printData("Используйте логин:user и пароль:user \nдля входа в систему под пользователем") ?>
</div>