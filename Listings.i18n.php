<?php
/**
 * Internationalisation file for Listings extension.
 *
 * @package MediaWiki
 * @subpackage Extensions
*/

$messages = array();

$messages['en'] = array(
	'listings-desc'              => 'Add tags for listing locations',
	'listings-unknown'           => 'Unknown destination',
	'listings-phone'             => 'phone',
	'listings-phone-symbol'      => '☎',
	'listings-fax'               => 'fax',
	'listings-fax-symbol'        => '',
	'listings-email'             => 'email',
	'listings-email-symbol'      => '',
	'listings-tollfree'          => 'toll-free',
	'listings-tollfree-symbol'   => '',
	'listings-checkin'           => 'Check-in: $1',
	'listings-checkout'          => 'check-out: $1',
	'listings-position'          => 'position: $1',
	'listings-position-template' => '',
);

/** Message documentation (Message documentation)
 * @author Shirayuki
 */
$messages['qqq'] = array(
	'listings-desc' => '{{desc|name=Listings|url=http://www.mediawiki.org/wiki/Extension:Listings}}',
	'listings-unknown' => 'Used when the name is not specified, instead of name.',
	'listings-phone' => 'Used as label for "phone" output.

See also:
* {{msg-mw|Listings-phone-symbol|Optional message}}
{{Identical|Phone}}',
	'listings-phone-symbol' => '{{Optional}}',
	'listings-fax' => 'Used as label for "fax" output.
{{Identical|Fax}}',
	'listings-email' => 'Used as label for "email" output.
{{Identical|E-mail}}',
	'listings-tollfree' => 'Used as label for "toll-free" output.',
	'listings-checkin' => 'Parameters:
* $1 - check-in
See also:
* {{msg-mw|Listings-checkout}}',
	'listings-checkout' => 'Parameters:
* $1 - check-out
See also:
* {{msg-mw|Listings-checkin}}',
	'listings-position' => 'Parameters:
* $1 - {{msg-mw|listings-position-template}}
As the message {{msg-mw|listings-position-template}} is empty, this message is unused.',
);

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'listings-desc' => 'Amiesta etiquetes pa facer llistes de llugares',
	'listings-unknown' => 'Destín desconocíu',
	'listings-phone' => 'teléfonu',
	'listings-fax' => 'fax',
	'listings-email' => 'corréu electrónicu',
	'listings-tollfree' => 'de baldre',
	'listings-checkin' => 'Llegada: $1',
	'listings-checkout' => 'salida: $1',
	'listings-position' => 'posición: $1',
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'listings-desc' => 'Дадае тэгі для зьмяшчэньня розных месцаў',
	'listings-unknown' => 'Невядомае месца',
	'listings-phone' => 'тэлефон',
	'listings-fax' => 'факс',
	'listings-email' => 'электронная пошта',
	'listings-tollfree' => 'бясплатны званок',
);

/** Breton (brezhoneg)
 * @author Y-M D
 */
$messages['br'] = array(
	'listings-phone' => 'pellgomz',
	'listings-fax' => 'pelleiler',
	'listings-email' => 'postel',
	'listings-tollfree' => 'digoust',
	'listings-checkin' => 'Enskrivadurioù : $1',
	'listings-checkout' => 'kontroll : $1',
	'listings-position' => "lec'hiadur : $1",
);

/** Czech (čeština)
 * @author Vks
 */
$messages['cs'] = array(
	'listings-phone' => 'telefon',
	'listings-fax' => 'fax',
	'listings-email' => 'e-mail',
	'listings-tollfree' => 'bezplatně',
	'listings-position' => 'pozice: $1',
);

/** Welsh (Cymraeg)
 * @author Lloffiwr
 */
$messages['cy'] = array(
	'listings-desc' => 'Yn ychwanegu tagiau wrth restri mannau',
	'listings-unknown' => 'Cyrchfan anhysbys',
	'listings-phone' => 'ffôn',
	'listings-fax' => 'ffacs',
	'listings-email' => 'ebost',
	'listings-tollfree' => 'am ddim',
	'listings-checkin' => 'Amser cyrraedd cynharaf: $1',
	'listings-checkout' => 'Amser gadael hwyraf: $1',
	'listings-position' => 'lleoliad: $1',
);

/** German (Deutsch)
 * @author Metalhead64
 */
$messages['de'] = array(
	'listings-desc' => 'Erweiterung zur Ausgabe von Ortsbeschreibungen',
	'listings-unknown' => 'Unbekannte Einrichtung',
	'listings-phone' => 'Telefon',
	'listings-fax' => 'Fax',
	'listings-email' => 'E-Mail',
	'listings-tollfree' => 'gebührenfrei',
	'listings-checkin' => 'Anmeldung: $1',
	'listings-checkout' => 'Abmeldung: $1',
	'listings-position' => 'Lage: $1',
);

/** Zazaki (Zazaki)
 * @author Erdemaslancan
 */
$messages['diq'] = array(
	'listings-phone' => 'telefun',
	'listings-fax' => 'feqs',
	'listings-email' => 'e-posta',
	'listings-position' => 'pozisyon: $1',
);

/** Greek (Ελληνικά)
 * @author Protnet
 * @author ZaDiak
 */
$messages['el'] = array(
	'listings-phone' => 'τηλέφωνο',
	'listings-fax' => 'φαξ',
	'listings-email' => 'διεύθυνση ηλεκτρονικού ταχυδρομείου',
);

/** Spanish (español)
 * @author Armando-Martin
 * @author Gustronico
 */
$messages['es'] = array(
	'listings-desc' => 'Agrega etiquetas para listar lugares de interés',
	'listings-unknown' => 'Destino desconocido',
	'listings-phone' => 'teléfono',
	'listings-fax' => 'fax',
	'listings-email' => 'correo electrónico',
	'listings-tollfree' => 'gratuito',
	'listings-checkin' => 'Registrarse: $1',
	'listings-checkout' => 'verificación: $1',
	'listings-position' => 'posición: $1',
);

/** Estonian (eesti)
 * @author Avjoska
 */
$messages['et'] = array(
	'listings-phone' => 'telefon',
	'listings-fax' => 'faks',
	'listings-email' => 'e-post',
);

/** Persian (فارسی)
 * @author Armin1392
 * @author Mjbmr
 */
$messages['fa'] = array(
	'listings-desc' => 'اضافه کردن برچسب‌ها برای مکان‌های فهرست‌',
	'listings-unknown' => 'مقصد ناشناخته',
	'listings-phone' => 'تلفن',
	'listings-fax' => 'فکس',
	'listings-email' => 'پست الکترونیکی',
	'listings-tollfree' => 'رایگان',
	'listings-position' => 'موقعیت: $1',
);

/** Finnish (suomi)
 * @author Nedergard
 * @author Silvonen
 */
$messages['fi'] = array(
	'listings-phone' => 'puhelin',
	'listings-fax' => 'faksi',
	'listings-email' => 'sähköposti',
	'listings-tollfree' => 'maksuton',
);

/** French (français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'listings-desc' => 'Ajouter les balises pour lister les emplacements',
	'listings-unknown' => 'Destination inconnue',
	'listings-phone' => 'tél.',
	'listings-fax' => 'fax',
	'listings-email' => 'email',
	'listings-tollfree' => 'gratuit',
	'listings-checkin' => 'Inscriptions: $1',
	'listings-checkout' => 'contrôle: $1',
	'listings-position' => 'situation: $1',
);

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'listings-desc' => 'Apond des balises por listar los emplacements',
	'listings-unknown' => 'Dèstinacion encognua',
	'listings-phone' => 'tèl.',
	'listings-fax' => 'faxe',
	'listings-email' => 'mèl.',
	'listings-tollfree' => 'gratuit',
	'listings-checkin' => 'Enscripcions : $1',
	'listings-checkout' => 'contrôlo : $1',
	'listings-position' => 'situacion : $1',
);

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'listings-desc' => 'Engade etiquetas para listar localizacións',
	'listings-unknown' => 'Destino descoñecido',
	'listings-phone' => 'teléfono',
	'listings-fax' => 'fax',
	'listings-email' => 'correo electrónico',
	'listings-tollfree' => 'gratuíto',
	'listings-checkin' => 'Inscrición: $1',
	'listings-checkout' => 'saída: $1',
	'listings-position' => 'posición: $1',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'listings-desc' => 'הוספת תגים ליצירת רשימות מיקומים',
	'listings-unknown' => 'יעד בלתי־ידוע',
	'listings-phone' => 'טלפון',
	'listings-fax' => 'פקס',
	'listings-email' => 'דוא"ל',
	'listings-tollfree' => 'שיחת חינם',
	'listings-checkin' => 'כניסה: $1',
	'listings-checkout' => 'יציאה: $1',
	'listings-position' => 'מיקום: $1',
);

/** Croatian (hrvatski)
 * @author Roberta F.
 */
$messages['hr'] = array(
	'listings-email' => 'e-pošta',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'listings-desc' => 'Znački za nalistowanje městnow přidać',
	'listings-unknown' => 'Njeznaty cil',
	'listings-phone' => 'telefon',
	'listings-fax' => 'faks',
	'listings-email' => 'e-mejl',
	'listings-tollfree' => 'bjez popłatka',
	'listings-checkin' => 'Přizjewjenje: $1',
	'listings-checkout' => 'Wotzjewjenje: $1',
	'listings-position' => 'pozicija: $1',
);

/** Hungarian (magyar)
 * @author Dj
 */
$messages['hu'] = array(
	'listings-phone' => 'telefon',
	'listings-fax' => 'fax',
	'listings-email' => 'e-mail',
	'listings-tollfree' => 'díjmentes',
);

/** Indonesian (Bahasa Indonesia)
 * @author Farras
 */
$messages['id'] = array(
	'listings-phone' => 'telepon',
	'listings-fax' => 'faks',
	'listings-email' => 'surel',
	'listings-tollfree' => 'bebas pulsa',
);

/** Italian (italiano)
 * @author Beta16
 */
$messages['it'] = array(
	'listings-desc' => 'Aggiunge tag per elenchi di posizioni',
	'listings-unknown' => 'Destinazione sconosciuta',
	'listings-phone' => 'tel.',
	'listings-fax' => 'fax',
	'listings-email' => 'email',
	'listings-tollfree' => 'gratis',
	'listings-checkin' => 'Check-in: $1',
	'listings-checkout' => 'check-out: $1',
	'listings-position' => 'posizione: $1',
);

/** Japanese (日本語)
 * @author Fryed-peach
 * @author Shirayuki
 */
$messages['ja'] = array(
	'listings-desc' => '場所を列挙するためのタグを追加する',
	'listings-unknown' => '場所不明',
	'listings-phone' => '電話',
	'listings-fax' => 'FAX',
	'listings-email' => 'メール',
	'listings-tollfree' => 'フリーダイヤル',
	'listings-checkin' => 'チェックイン: $1',
	'listings-checkout' => 'チェックアウト: $1',
	'listings-position' => '位置: $1',
);

/** Georgian (ქართული)
 * @author David1010
 */
$messages['ka'] = array(
	'listings-unknown' => 'უცნობი მიმართულება',
	'listings-phone' => 'ტელეფონი',
	'listings-phone-symbol' => '☎',
	'listings-fax' => 'ფაქსი',
	'listings-email' => 'ელ. ფოსტა',
	'listings-tollfree' => 'უფასოდ',
	'listings-position' => 'პოზიცია: $1',
);

/** Korean (한국어)
 * @author 아라
 */
$messages['ko'] = array(
	'listings-desc' => '장소를 나열하기 위한 태그를 추가합니다',
	'listings-unknown' => '알 수 없는 목적지',
	'listings-phone' => '전화번호',
	'listings-fax' => '팩스',
	'listings-email' => '이메일',
	'listings-tollfree' => '수신자 부담',
	'listings-checkin' => '체크인: $1',
	'listings-checkout' => '체크아웃: $1',
	'listings-position' => '위치: $1',
);

/** Kurdish (Latin script) (Kurdî (latînî)‎)
 * @author George Animal
 */
$messages['ku-latn'] = array(
	'listings-email' => 'e-name',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'listings-desc' => 'Setzt Taggen derbäi fir Plazen opzelëschten',
	'listings-unknown' => 'Onbekannten Zil',
	'listings-phone' => 'Telefon',
	'listings-fax' => 'Fax',
	'listings-email' => 'E-Mail',
	'listings-tollfree' => 'gratis',
	'listings-checkin' => 'Umeldung: $1',
	'listings-checkout' => 'Ofmeldung: $1',
	'listings-position' => 'Positioun: $1',
);

/** Lithuanian (lietuvių)
 * @author Eitvys200
 */
$messages['lt'] = array(
	'listings-phone' => 'telefonas',
	'listings-fax' => 'faksas',
	'listings-email' => 'el. paštas',
	'listings-position' => 'pareigos: $1',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'listings-desc' => 'Додај ознаки за наведување на места',
	'listings-unknown' => 'Непознато одредиште',
	'listings-phone' => 'телефон',
	'listings-fax' => 'факс',
	'listings-email' => 'е-пошта',
	'listings-tollfree' => 'бесплатно',
	'listings-checkin' => 'Пријава: $1',
	'listings-checkout' => 'одјава: $1',
	'listings-position' => 'положба: $1',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'listings-phone' => 'ഫോൺ',
	'listings-fax' => 'ഫാക്സ്',
	'listings-email' => 'ഇമെയിൽ',
	'listings-tollfree' => 'ടോൾ-ഫ്രീ',
	'listings-checkin' => 'പ്രവേശിച്ചത്: $1',
	'listings-checkout' => 'ഇറങ്ങിയത്: $1',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'listings-desc' => 'Menambahkan teg untuk menyenaraikan lokasi',
	'listings-unknown' => 'Destinasi tidak dikenali',
	'listings-phone' => 'telefon',
	'listings-fax' => 'faks',
	'listings-email' => 'e-mel',
	'listings-tollfree' => 'talian percuma',
	'listings-checkin' => 'Daftar masuk: $1',
	'listings-checkout' => 'daftar keluar: $1',
	'listings-position' => 'kedudukan: $1',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'listings-unknown' => 'Destinazzjoni mhux magħrufa',
	'listings-phone' => 'telefown',
	'listings-fax' => 'fax',
	'listings-email' => 'ittre',
	'listings-tollfree' => "b'xejn",
	'listings-checkin' => 'Check-in: $1',
	'listings-checkout' => 'check-out: $1',
	'listings-position' => 'pożizzjoni: $1',
);

/** Low German (Plattdüütsch)
 * @author Joachim Mos
 */
$messages['nds'] = array(
	'listings-fax' => 'Fax',
	'listings-email' => 'E-Mail',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'listings-desc' => 'Voegt tags toe voor adressen',
	'listings-unknown' => 'Onbekende bestemming',
	'listings-phone' => 'telefoonnummer',
	'listings-fax' => 'fax',
	'listings-email' => 'e-mailadres',
	'listings-tollfree' => 'gratis nummer',
	'listings-checkin' => 'Ingecheckt: $1',
	'listings-checkout' => 'Uitgecheckt: $1',
	'listings-position' => 'positie: $1',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'listings-desc' => 'Gionté le tichëtte për listé le locassion',
	'listings-unknown' => 'Destinassion pa conossùa',
	'listings-phone' => 'teléfon',
	'listings-fax' => 'fax',
	'listings-email' => 'pòsta eletrònica',
	'listings-tollfree' => 'a gràtis',
	'listings-checkin' => 'Anscrission: $1',
	'listings-checkout' => 'contròl: $1',
	'listings-position' => 'posission: $1',
);

/** Brazilian Portuguese (português do Brasil)
 * @author Luckas
 */
$messages['pt-br'] = array(
	'listings-position' => 'posição: $1',
);

/** Romanian (română)
 * @author Firilacroco
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'listings-unknown' => 'Destinație necunoscută',
	'listings-phone' => 'telefon',
	'listings-fax' => 'fax',
	'listings-email' => 'e-mail',
	'listings-position' => 'poziție: $1',
);

/** tarandíne (tarandíne)
 * @author Joetaras
 */
$messages['roa-tara'] = array(
	'listings-desc' => 'Aggiunge le tag pe elengà le località',
	'listings-unknown' => 'Destinazione scanusciute',
	'listings-phone' => 'telefone',
	'listings-fax' => 'fax',
	'listings-email' => 'e-mail',
	'listings-tollfree' => 'aggratis',
	'listings-checkin' => 'Committe: $1',
	'listings-checkout' => 'estraje: $1',
	'listings-position' => 'posizione: $1',
);

/** Russian (русский)
 * @author DCamer
 * @author Okras
 * @author ShinePhantom
 */
$messages['ru'] = array(
	'listings-desc' => 'Добавляет теги для перечисления мест',
	'listings-unknown' => 'Неизвестное назначение',
	'listings-phone' => 'телефон',
	'listings-fax' => 'Факс',
	'listings-email' => 'эл. почта',
	'listings-tollfree' => 'бесплатно',
	'listings-checkin' => 'Заезд: $1',
	'listings-checkout' => 'отъезд: $1',
	'listings-position' => 'позиция: $1',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'listings-desc' => 'ලැයිස්තුගතකෙරුම් ස්ථාන සඳහා ටැගයන් එක් කරන්න',
	'listings-unknown' => 'නොදන්නා ගමනාන්තය',
	'listings-phone' => 'දුරකථනය',
	'listings-fax' => 'ෆැක්ස්',
	'listings-email' => 'විද්‍යුත්-තැපෑල',
	'listings-tollfree' => 'ගාස්තුවෙන්-තොර',
	'listings-checkin' => 'පරීක්ෂා කරන්න: $1',
	'listings-checkout' => 'පිටවීම පරීක්ෂා කරන්න: $1',
	'listings-position' => 'තරාතිරම: $1',
);

/** Swedish (svenska)
 * @author Jopparn
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'listings-unknown' => 'Okänd destination',
	'listings-phone' => 'telefon',
	'listings-fax' => 'fax',
	'listings-email' => 'e-post',
	'listings-tollfree' => 'avgiftsfri',
	'listings-checkin' => 'Incheckning: $1',
	'listings-checkout' => 'utcheckning: $1',
	'listings-position' => 'position: $1',
);

/** Tamil (தமிழ்)
 * @author Shanmugamp7
 */
$messages['ta'] = array(
	'listings-unknown' => 'அறியப்படாத இலக்கு',
	'listings-phone' => 'தொலைபேசி',
	'listings-fax' => 'தொலைநகல்',
	'listings-email' => 'மின்னஞ்சல்',
);

/** Uyghur (Arabic script) (ئۇيغۇرچە)
 * @author Sahran
 */
$messages['ug-arab'] = array(
	'listings-email' => 'ئېلخەت',
);

/** Ukrainian (українська)
 * @author Andriykopanytsia
 * @author Base
 */
$messages['uk'] = array(
	'listings-desc' => 'Додати теґи для переліку місць',
	'listings-unknown' => 'Невідоме місце',
	'listings-phone' => 'телефон',
	'listings-fax' => 'факс',
	'listings-email' => 'електронна пошта',
	'listings-tollfree' => 'безкоштовно',
	'listings-checkin' => 'Заїзд: $1',
	'listings-checkout' => 'виїзд: $1',
	'listings-position' => 'розташування: $1',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 */
$messages['vi'] = array(
	'listings-desc' => 'Gắn thẻ vào các nơi trong danh mục',
	'listings-unknown' => 'Nơi đến không rõ',
	'listings-phone' => 'điện thoại',
	'listings-fax' => 'fax',
	'listings-email' => 'thư điện tử',
	'listings-tollfree' => 'miễn phí',
	'listings-checkin' => 'Đăng nhập: $1',
	'listings-checkout' => 'đăng xuất: $1',
	'listings-position' => 'vị trí: $1',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Hzy980512
 * @author Yfdyh000
 */
$messages['zh-hans'] = array(
	'listings-desc' => '为列表中的地点添加标签',
	'listings-unknown' => '未知目标',
	'listings-phone' => '电话',
	'listings-fax' => '传真',
	'listings-email' => '电子邮件',
	'listings-tollfree' => '免费电话',
	'listings-checkin' => '登入：$1',
	'listings-checkout' => '登出：$1',
	'listings-position' => '位置：$1',
);
