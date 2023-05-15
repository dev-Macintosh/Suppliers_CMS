<?php

class Model_Auth extends Model
{
    static public function login($data)
    {
        $string_query = "SELECT * FROM `Пользователи` WHERE `Пользователи`.`Логин` = ? AND `Пользователи`.`Пароль`= ?";
        $user=App::$db->execute($string_query, [$data['username'],$data['password']]);
        if (count($user) == 0) {
            self::flash('Пользователь с такими данными не зарегистрирован');
            header('Location: /auth/index');
            die;
        }


        // if (password_verify($_POST['password'], $user['password'])) {
        //     // Проверяем, не нужно ли использовать более новый алгоритм
        //     // или другую алгоритмическую стоимость
        //     // Например, если вы поменяете опции хеширования
        //     if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
        //         $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        //         $stmt = pdo()->prepare('UPDATE `users` SET `password` = :password WHERE `username` = :username');
        //         $stmt->execute([
        //             'username' => $_POST['username'],
        //             'password' => $newHash,
        //         ]);
        //     }
            $_SESSION['user_id'] = 123;
            header('Location: /');
            die;
        // }

        // flash('Пароль неверен');
    }
    static function flash(?string $message = null)
    {
        if ($message) {
            $_SESSION['flash'] = $message;
        } else {
            if (!empty($_SESSION['flash'])) { ?>
                <div class="alert alert-danger mb-3">
                    <?= $_SESSION['flash'] ?>
                </div>
            <?php }
            unset($_SESSION['flash']);
        }
    }
    static function check_auth(): bool
    {
        return !!($_SESSION['user_id'] ?? false);
    }

}