<form class="form form--add-lot container <?= $form ?? ""?>" action="../add.php" method="post" enctype="multipart/form-data">
            <h2>Добавление лота</h2>
            <div class="form__container-two">
                <div class="form__item <?= $err['lot_name'] ?? ""?>">
                    <label for="lot-name">Наименование <sup>*</sup></label>
                    <input id="lot-name" type="text" name="lot_name" placeholder="Введите наименование лота" value="<?= $_POST['lot_name'] ?? ""?>">
                    <?= $message['lot_name']  ?? ""?>
                </div>
                <div class="form__item <?= $err['categorie']  ?? ""?>">
                    <label for="categorie">Категория <sup>*</sup></label>
                    <select id="categorie" name="categorie" value="<?=$_POST['categorie'] ?? ""?>">
                        <option>Выберите категорию</option>
                        <?php
                        foreach($categories as $cat)
                        {
                            ?>
                            <option <?=isset($_POST['categorie']) && $_POST['categorie']==$cat['name']?" selected":""?>><?=$cat['name']?></option>
                       <?php
                        }
                            ?>
                    </select>
                    <?=$message['categorie'] ?? ""?>
                </div>
            </div>
            <div class="form__item form__item--wide <?= $err['description'] ?? ""?>">
                <label for="message">Описание <sup>*</sup></label>
                <textarea id="message" name="description" placeholder="Напишите описание лота"><?=$_POST['description'] ?? ""?></textarea>
                <?= $message['description']  ?? ""?>
            </div>
            <div class="form__item form__item--file <?= $err['image']  ?? ""?>">
                <label>Изображение <sup>*</sup></label>
                <div class="form__input-file">
                    <input name="image" class="visually-hidden" type="file" id="lot-img">
                    <label for="lot-img">
                        Добавить
                    </label>
                </div>
                <?= $message['image'] ?? ""?>
            </div>
            <div class="form__container-three">
                <div class="form__item form__item--small <?= $err['start_cost']  ?? ""?>">
                    <label for="lot-rate">Начальная цена <sup>*</sup></label>
                    <input id="start_cost" type="text" name="start_cost" placeholder="0" value="<?=$_POST['start_cost'] ?? ""?>">
                    <?= $message['start_cost']  ?? ""?>
                </div>
                <div class="form__item form__item--small <?= $err['shag_sravka']  ?? ""?>">
                    <label for="lot-step">Шаг ставки <sup>*</sup></label>
                    <input name="shag_sravka" id="lot-step" type="text" placeholder="0" value="<?=$_POST['shag_sravka'] ?? ""?>">
                    <?= $message['shag_sravka']  ?? ""?>
                </div>
                <div class="form__item <?= $err['data_stop']  ?? ""?>">
                    <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
                    <input name="data_stop" class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="Введите дату в формате ГГГГ-ММ-ДД" value="<?=$_POST['data_stop'] ?? ""?>">
                    <?= $message['data_stop']  ?? ""?>
                </div>
            </div>
            <?= $message['form'] ?? ""?>
            <button type="submit" class="button">Добавить лот</button>
        </form>