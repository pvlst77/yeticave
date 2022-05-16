#список категорий
INSERT INTO categorie (`id_categorie`, `name`)
VALUES ('1', 'Доски и лыжи'),
('2', 'Крепления'),
('3', 'Ботинки'),
('4', 'Одежда'),
('5', 'Инструменты'),
('6', 'Разное');
#добавляем пользователей
INSERT INTO `user`(`id_user`, `name`, `email`, `password`, `image`, `contact`, `date_regisrtatoin`)
VALUES ('1', 'Павел', 'pvlst77@gmail.com', '123456', '1.jpg', '89264274444', '16.05.22'),
('2', 'Дмитрий', 'dmtr77@gmail.com', '123456', '2.jpg', '89264276666', '15.05.22'),
('3', 'Сергей', 'serg@gmail.com', '123456', '3.jpg', '892642755', '14.05.22'),
('4', 'Антон', 'ant@gmail.com', '123456', '4.jpg', '89264275545', '19.05.22'),
('5', 'Андрей', 'andr@gmail.com', '123456', '53.jpg', '89264275532', '22.05.22'),
('6', 'Алексей', 'alex@gmail.com', '123456', '6.jpg', '89264275516', '21.05.22');
#список объявлений
INSERT INTO `lot`(`id_lot`, `id_winner`, `id_categorie`, `id_user`, `data_creation`, `name`, `description`, `image`, `start_cost`, `data_stop`, `shag_sravka`)
VALUES ('1', '1', '1', '1', '22.05.17', '2014 Rossignol District Snowboard', 'Доска', 'img/lot-1.jpg', '10990', '22.05.16', '1'),
('2', '2', '2', '2', '22.05.17', 'DC Ply Mens 2016/2017 Snowboard', 'Лыжа', 'img/lot-2.jpg', '159999', '22.05.16', '1'),
('3', '3', '3', '3', '22.05.17', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Крепление', 'img/lot-3.jpg', '8000', '22.05.16', '1'),
('4', '1', '4', '1', '22.05.17', 'Ботинки для сноуборда DC Mutiny Charocal', 'Ботинки', 'img/lot-4.jpg', '10999', '22.05.16', '1'),
('5', '2', '5', '2', '22.05.17', 'Куртка для сноуборда DC Mutiny Charocal', 'Куртка', 'img/lot-5.jpg', '7500', '22.05.16', '1'),
('6', '3', '6', '3', '22.05.17', 'Маска Oakley Canopy', 'Маска', 'img/lot-6.jpg', '5400', '22.05.16', '1');
#добавить ставки
INSERT INTO `stavka`(`id_stavka`, `date`, `summa`, `id_user`, `id_lot`)
VALUES ('1', '22.05.16', '11200', '1'),
('2', '22.05.16', '11500', '2'),
('3', '22.05.16', '12700', '3'),
('4', '22.05.16', '13200', '4', '1');
#получить все категории
SELECT name as category
FROM categorie;
#получить самые новые, открытые лоты. Каждый лот должен включать
название, стартовую цену, ссылку на изображение, цену последней ставки,
количество ставок, название категории;
SELECT lot.id_lot,
       lot.name       as name,
       image,
       start_cost,
       categorie.name as category
FROM lot
       INNER JOIN categorie ON lot.id_categorie = categorie.id_categorie
WHERE data_creation > now();
#показать лот по его id. Получите также название категории, к которой
принадлежит лот
SELECT lot.id_lot,
       lot.name       as name,
       image,
       start_cost,
       categorie.name as category
FROM lot
       INNER JOIN categorie ON lot.id_categorie = categorie.id_categorie
WHERE lot.id_lot = 1;
#обновить название лота
UPDATE lot
SET name = '2015 Rossignol District Snowboard'
WHERE id_lot = 1;
#получить список самых свежих ставок
SELECT date,
       summa
FROM stavka
WHERE id_lot = 1
order by date