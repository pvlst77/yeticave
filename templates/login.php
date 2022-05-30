<form class="form container <?= $form ?? ""?>" action="../login.php" method="post">
    <h2>Вход</h2>
    <div class="form__item <?= $err['email'] ?? ""?>">
        <label for="email">E-mail <sup>*</sup></label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$_POST['email'] ?? ""?>">
        <?= $message['email']  ?? ""?>
    </div>
    <div class="form__item form__item--last <?= $err['pass'] ?? ""?>">
        <label for="password">Пароль <sup>*</sup></label>
        <input id="password" type="password" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass'] ?? ""?>">
        <?= $message['pass']  ?? ""?>
    </div>
    <?= $message['form'] ?? ""?>
    <button type="submit" class="button">Войти</button>
</form>