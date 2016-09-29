<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Custom */



$route['default_controller'] = 'Public_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['sekretessinformation'] = 'Public_controller/sekretessinformation';
$route['kontakta-oss'] = 'Public_controller/kontakta_oss';

$route['rabattkoder'] = 'Public_controller/coupons';
$route['rabattkod/(:any)'] = 'Public_controller/coupon_detail/$1';

$route['rea'] = 'Public_controller/sale';
$route['rea/(:any)'] = 'Public_controller/sale_detail/$1';
$route['rea/(:any)/(:any)'] = 'Public_controller/sale_detail_under_cat/$1/$2';

$route['ut/(:any)'] = 'Public_controller/link_routing/$1';

$route['imba_login'] = 'Public_controller/login_view';
$route['process_adminlogin'] = 'Public_controller/login_process';

$route['butiker'] = 'Public_controller/stores';

//admin
$route['admin/index'] = 'Admin_controller/index';

$route['logout'] = 'Admin_controller/logout';

$route['admin/new_cronjob'] = 'Admin_controller/new_cronjob';
$route['admin/new_cronjob_process'] = 'Admin_controller/new_cronjob_process';

$route['admin/api/logs'] = 'Admin_controller/api_logs';
$route['admin/api/sale_logs'] = 'Admin_controller/sale_logs';

$route['admin/add_sale_page'] = 'Admin_controller/add_sale_page';
$route['admin/add_sale_page_process'] = 'Admin_controller/add_sale_page_process';

$route['admin/add_sale_campaign'] = 'Admin_controller/add_sale_campaign';
$route['admin/add_sale_campaign_process'] = 'Admin_controller/add_sale_campaign_process';

$route['admin/add_store'] = 'Admin_controller/add_store';
$route['admin/add_store_process'] = 'Admin_controller/add_store_process';

$route['admin/edit_store/(:any)'] = 'Admin_controller/edit_store/$1';
$route['admin/edit_store_process'] = 'Admin_controller/edit_store_process';



$route['admin/add_category'] = 'Admin_controller/add_category';
$route['admin/add_category_process'] = 'Admin_controller/add_category_process';

$route['admin/add_subcategory'] = 'Admin_controller/add_subcategory';
$route['admin/add_subcategory_process'] = 'Admin_controller/add_subcategory_process';

$route['admin/add_coupon'] = 'Admin_controller/add_coupon';
$route['admin/add_coupon_process'] = 'Admin_controller/add_coupon_process';

//asdasdasd
$route['admin/add_offer'] = 'Admin_controller/add_offer';
$route['admin/add_offer_process'] = 'Admin_controller/add_offer_process';

$route['admin/store_overview'] = 'Admin_controller/store_overview';
$route['admin/coupons_overview'] = 'Admin_controller/coupons_overview';
$route['admin/offer_overview'] = 'Admin_controller/offer_overview';
$route['admin/sale_overview'] = 'Admin_controller/sale_overview';

$route['admin/edit_coupon/(:any)'] = 'Admin_controller/edit_coupon/$1';
$route['admin/edit_coupon_process'] = 'Admin_controller/edit_coupon_process';

$route['admin/edit_offer/(:any)'] = 'Admin_controller/edit_offer/$1';
$route['admin/edit_offer_process'] = 'Admin_controller/edit_offer_process';

$route['admin/edit_sale_page/(:any)'] = 'Admin_controller/edit_sale_page/$1';
$route['admin/edit_sale_page_process'] = 'Admin_controller/edit_sale_page_process';


$route['admin/todo'] = 'Admin_controller/todo';
$route['admin/todo/uppdatera/:num'] = 'Admin_controller/update_uppdaterad_datum';

$route['admin/api/adrecod'] = 'Admin_controller/adrecord_handle';
$route['admin/api/adrecod/skip/(:any)'] = 'Admin_controller/adrecord_handle_skip/$1';
$route['admin/api/adrecod/hold/(:any)'] = 'Admin_controller/adrecord_handle_hold/$1';
$route['admin/api/adrecod_process'] = 'Admin_controller/adrecord_handle_process';

//$route['test'] = 'Public_controller/swe_characters/';

//API
$route['api/adrecord_butiker'] = 'API_adrecord_controller/fetch_stores';
$route['api/adrecord_butiker_2'] = 'API_adrecord_controller/fetch_details';
$route['api/adrecord_rabattkoder'] = 'API_adrecord_controller/fetch_rabattkoder';

//Cronjob
//$route['cron/backup-database'] = 'Cron_controller/backup_database';


$route['croni/autosale_update'] = 'Sale_update_controller/update_shoes_ellos_1';

$route['croni/autosale_5min_update'] = 'Sale_update_controller/cronjob_from_database';
