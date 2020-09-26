<?php
//-----Настройка вайта-----
//если 'site' - показывает локальный вайт-пейдж из папки $white_folder_name 
//если 'redirect' - редиректит на $redirect_url при помощи $redirect_type
//если 'curl' - подгружает $curl_url
//если 'error' - возвращает ошибку $error_code
$white_action = 'site'; 
$white_folder_name = 'white'; //папка, где лежит вайтпейдж
$white_redirect_url = 'https://ya.ru'; //если вместо локального вайта юзаем редирект
$white_redirect_type = 302; //можно использовать 301 или 302 редирект, 303 и 307 тоже катят.
$white_curl_url = 'https://ya.ru'; //если используем curl вайт
$white_error_code = 404; //код ошибки для возврата вместо вайта, по умолчанию 404 = Not Found
$white_use_domain_specific=false; //если true, то проверяется доменное имя и показывается локальный вайт именно для него
$white_domain_specific=array(
	"awlah.com" => "site:white3",
	"keto.awlah.com" => "curl:https://ya.ru",
	"diet.awlah.com" => "site:white2",
	"ketopro.awlah.com" => "redirect:https://ya.ru",
	"proketo.awlah.com" => "error:404"
);

//-----Настройка блэка-----
$black_action = 'site'; //по аналогии с white_action 'site' или 'redirect'
//-----Если вместо локальной свяки прокла-ленд вы хотите сразу редиректить в ПП-----
$black_redirect_url = 'https://ya.ru';
$black_redirect_type = 302; //можно использовать 301 или 302 редирект, 303 и 307 тоже катят.
//-----Если будете использовать локальную проклу-----
//папка, где лежит прокла или набор прокл через запятую (для сплит-теста), если проклы не нужны - ставим ''
$black_preland_folder_name = 'p1,p2'; 
//-----Если будете использовать локальный ленд-----
//папка, где лежит основной ленд или набор папок через запятую (для сплит-теста)
$black_land_folder_name = 'land'; 
$black_land_conversion_script='order.php'; //название файла скрипта отправки лидов на ленде ПП, должен лежать в корне с index.php ленда
//-----Если вместо локального ленда хотите использовать ленд в ПП-----
//Подходит для свипов, стрейт-сейлов, триалов, крипты и т.п.
$black_land_use_url=false; //установить в true, если хотите использовать внешний ленд
//Ссылка на внешний ленд в ПП
//Поддерживаются макросы: 
//{subid} - уникальный идентификатор пользователя (для постбэка)
//{px} - идентификатор пикселя фб 
//{prelanding} - имя папки проклы 
//Также к этому урлу будут добавлены все сабы, которые были у вашей ссылки, переписанные по правилам $sub_ids
$black_land_url = "http://ya.ru?pixel={px}";
//-----Настройка страницы спасибо-----
$use_custom_thankyou_page = false; //Если true, то использует страницу Спасибо кло, если false - Спасибо ПП
$thankyou_page_language = 'EN'; //Язык, на котором показывать страницу Спасибо кло

//-----Настройка метрик и пикселей-----
//Скрипты ставятся и на проклы и на ленды и на вайты
$gtm_id=''; //идентификатор Google Tag Manager
$ya_id=''; //идентификатор Яндекс.Метрики
//Настройки пикселя фб
$fbpixel_subname = 'px'; //имя параметра из querystring, в котором будет лежать ID пикселя
$fb_use_pageview = true; //добавлять ли на проклы-ленды событие PageView при заходе на них пользователя
$fb_thankyou_event = 'Lead'; //какое событие будем посылать со страницы Спасибо (Обычно Lead или Purchase)
$fb_add_button_pixel = true; //если true, то событие конверсии будет слаться не со страницы Спасибо, а при нажатии на кнопку на ленде
$use_cloacked_pixel = false; //клоачить ли пиксель фб или нет по методу https://tgraph.me/Kloachim-FB-Pixel-bez-iframe-02-15

//-----Настройка TDS-----
$full_cloak_on = false; //если true, то всегда возвращает whitepage, используем при модерации
$disable_tds = false; //если true, то всегда показывает блэк
$save_user_flow = false; //если true, то один и тот же пользователь всегда будет попадать на одни и те же проклы-ленды

//-----Настройка фильтров-----
$os_white = 'Android,iOS,Windows,OS X'; //Список разрешённых ОС
$country_white = 'RU'; //Строка двухбуквенных обозначений стран через запятую, допущенных к blackpage
$ip_white = '';
$ip_black = '0.0.0.1'; //Доп. список адресов через запятую, которые будут отправлены на white page
$tokens_black = ''; //Список слов через запятую, при наличии которых в адресе перехода (в ссылке, по которой перешли), юзер будет отправлен на whitepage
$url_should_contain =''; //Список слов через запятую, которые обязательно должны быть в адресе. Если хотя бы чего-то нет - показывается вайт
$ua_black = 'facebook,Facebot,curl,gce-spider,yandex.com/bots'; //Список слова через запятую, при наличии которых в UserAgent, юзер будет отправлен на whitepage
$block_without_referer = false; //при =true все запросы без referer будут идти на whitepage
$isp_black = 'facebook,google,yandex,amazon,azure'; //блокировка по провадеру (isp), например facebook

//-----Настройка дополнительных скриптов----- 
//!!!Скрипты добавляются и на прокладки и на лендинги, если нет доп.указаний в описании
//1. запрещает нажимать кнопку назад, она тупо перестаёт работать
$disable_back_button = false;
//2. заменяет действие кнопки назад на адрес $replace_back_address. НЕ ВКЛЮЧАТЬ вместе с disable_back_button! 
$replace_back_button = true; 
//3. куда направлять при нажатии Назад. Можно направлять на другой похожий оффер 
//поддерживаются те же макросы, что и в $black_land_url
$replace_back_address = 'https://ya.ru?pixel={px}'; 
//4. запрещает выделять и сохранять текст по Ctrl+S, убирает контекстное меню
$disable_text_copy = true;
//5. если true, то при щелчке на любую ссылку на прокле ленд будет открыт в новом окне 
//а прокла будет заменена на $replace_prelanding_address 
$replace_prelanding = true; 
//поддерживаются те же макросы, что и в $black_land_url
$replace_prelanding_address = 'https://ya.ru?pixel={px}';
//6. если true, то к полю ввода телефона НА ЛЕНДИНГЕ будет добавлена маска $black_land_phone_mask
$black_land_use_phone_mask = false;
$black_land_phone_mask = '+421 999 999 999';

//-----Настройка суб-меток-----
//Кло берёт из адресной строки те субметки, что слева и 
//1. Если у вас локальный ленд, то кло записывает значения меток в каждую форму на ленде в поля с именами, которые справа
//2. Если у вас ленд в ПП, то кло дописывает значения меток к ссылке ПП с именами, которые справа
//Таким образом мы передаём значения субметок в ПП, чтобы в стате ПП отображалась нужная нам инфа 
//Ну и плюс это нужно для того, чтобы передавать subid для постбэка
//Есть 3 "зашитые" метки: 
//- subid - уникальный идентификатор пользователя, создаётся при заходе пользователя на блэк, хранится в куки
//- prelanding - название папки преленда
//- landing - название папки ленда
//Пример: 
//у вас в адресной строке было http://xxx.com?cn=MyCampaign
//в форме на ленде добавится <input type="hidden" name="utm_campaign" value="MyCampaign"/>
$sub_ids = array(
	"subid"=> "sub_id",
	"prelanding" => "utm_source",
	"cn" => "utm_campaign",
	"an" => "utm_content"
);

//-----Настройка статы и постбэка------
$log_password = '12345'; //пароль для просмотра статы и трафика, добавлять как: /logs?password=xxxxx
$creative_sub_name = 'an'; //название метки в которой из источника трафика приходит название креатива
//Здесь необходимо прописать статусы лидов, в том виде, как их вам отправляет в постбэке ПП
$lead_status_name = 'Lead';
$purchase_status_name = 'Purchase';
$reject_status_name = 'Reject';
$trash_status_name = 'Trash';
?>