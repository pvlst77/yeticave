<form class="form container <?= $form ?? ""?>" action="../signup.php" method="post" enctype="multipart/form-data">

    <h2>Регистрация</h2>
    <div class="form__item <?= $err['name'] ?? ""?>">
        <label for="name">Имя <sup>*</sup></label>
        <input id="name" type="text" name="name" placeholder="Введите Ваше Имя" value="<?=$_POST['name'] ?? ""?>">
        <?= $message['name']  ?? ""?>
    </div>
    <div class="form__item <?= $err['contact'] ?? ""?>">
        <label for="contact">Номер телефона <sup>*</sup></label>
        <input id="contact" type="text" name="contact" placeholder="Введите номер Вашего телефона" value="<?=$_POST['contact'] ?? ""?>">
        <?= $message['contact']  ?? ""?>
    </div>
    <div class="form__item <?= $err['email'] ?? ""?>">
        <label for="email">Почта <sup>*</sup></label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$_POST['email'] ?? ""?>">
        <?= $message['email']  ?? ""?>
    </div>
    <div class="form__item <?= $err['pass'] ?? ""?>">
        <label for="pass">Пароль <sup>*</sup></label>
        <input id="pass" type="pass" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass'] ?? ""?>">
        <?= $message['pass']  ?? ""?>
    </div>
    <div class="form__item form__item--file form__item--last <?= $err['avatar']  ?? ""?>">
                <label>Фото профиля <sup>*</sup></label>
                <div class="form__input-file">
                    <input name="avatar" class="visually-hidden" type="file" id="lot-img">
                    <label for="lot-img">
                        Добавить
                    </label>
                </div>
                <?= $message['avatar'] ?? ""?>
            </div>
    <?= $message['form'] ?? ""?>
    <button type="submit" class="button">Зарегистрироваться</button>
</form>