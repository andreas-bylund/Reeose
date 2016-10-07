<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Public_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
*   Public
*
*/

/* Statiska sidor */
$route['sekretessinformation'] = 'Public_controller/sekretessinformation';
$route['kontakta-oss'] = 'Public_controller/kontakta_oss';
$route['imba_login'] = 'Public_controller/login_view';

/* Rabattkoder */
$route['rabattkoder'] = 'Public_controller/coupons';
$route['rabattkod/(:any)'] = 'Public_controller/coupon_detail/$1';

/* REA */
$route['rea'] = 'Public_controller/sale';
$route['rea/(:any)'] = 'Public_controller/sale_detail/$1';
$route['rea/(:any)/(:any)'] = 'Public_controller/sale_detail_under_cat/$1/$2';

/* Övriga funktioner */
$route['ut/(:any)'] = 'Public_controller/link_routing/$1';

/* Process routes */
$route['process_adminlogin'] = 'Public_controller/login_process';

/* Butiker */
$route['butiker'] = 'Public_controller/stores';

/*
*   Admin
*
*/

/* Admin - Todo */
$route['admin/todo'] = 'Admin_controller/todo';
$route['admin/todo/uppdatera/:num'] = 'Admin_controller/update_uppdaterad_datum';

/* Admin - Statiska sidor */
$route['logout'] = 'Admin_controller/logout';
$route['admin/index'] = 'Admin_controller/index';
$route['admin/sale_overview'] = 'Admin_sale_controller/sale_overview';
$route['admin/offer_overview'] = 'Admin_offer_controller/offer_overview';
$route['admin/store_overview'] = 'Admin_controller/store_overview';
$route['admin/coupons_overview'] = 'Admin_controller/coupons_overview';

/* Admin - Cronjob */
$route['admin/new_cronjob'] = 'Admin_controller/new_cronjob';
$route['admin/new_cronjob_process'] = 'Admin_controller/new_cronjob_process';

/* Admin - API */
$route['admin/api/logs'] = 'Admin_controller/api_logs';
$route['admin/api/sale_logs'] = 'Admin_controller/sale_logs';

/* Admin - Add sales */
$route['admin/add_sale_page'] = 'Admin_sale_controller/add_sale_page';
$route['admin/add_sale_page_process'] = 'Admin_sale_controller/add_sale_page_process';

/* Admin - Add sale campain */
$route['admin/add_sale_campaign'] = 'Admin_sale_controller/add_sale_campaign';
$route['admin/add_sale_campaign_process'] = 'Admin_sale_controller/add_sale_campaign_process';

/* Admin - Add store campaign */
$route['admin/add_store'] = 'Admin_controller/add_store';
$route['admin/add_store_process'] = 'Admin_controller/add_store_process';

/* Admin - Edit store */
$route['admin/edit_store/(:any)'] = 'Admin_controller/edit_store/$1';
$route['admin/edit_store_process'] = 'Admin_controller/edit_store_process';

/* Admin - Add category */
$route['admin/add_category'] = 'Admin_controller/add_category';
$route['admin/add_category_process'] = 'Admin_controller/add_category_process';

/* Admin - Add subcategory */
$route['admin/add_subcategory'] = 'Admin_controller/add_subcategory';
$route['admin/add_subcategory_process'] = 'Admin_controller/add_subcategory_process';

/* Admin - Add coupon */
$route['admin/add_coupon'] = 'Admin_controller/add_coupon';
$route['admin/add_coupon_process'] = 'Admin_controller/add_coupon_process';

/* Admin - Add offer */
$route['admin/add_offer'] = 'Admin_offer_controller/add_offer';
$route['admin/add_offer_process'] = 'Admin_offer_controller/add_offer_process';

/* Admin - Edit coupon */
$route['admin/edit_coupon/(:any)'] = 'Admin_controller/edit_coupon/$1';
$route['admin/edit_coupon_process'] = 'Admin_controller/edit_coupon_process';

/* Admin - Edit offer */
$route['admin/edit_offer/(:any)'] = 'Admin_offer_controller/edit_offer/$1';
$route['admin/edit_offer_process'] = 'Admin_offer_controller/edit_offer_process';

/* Admin - Edit Sale page */
$route['admin/edit_sale_page/(:any)'] = 'Admin_sale_controller/edit_sale_page/$1';
$route['admin/edit_sale_page_process'] = 'Admin_sale_controller/edit_sale_page_process';

/*
*   API
*
*/

/* API - Adrecord */
$route['admin/api/adrecod'] = 'Admin_controller/adrecord_handle';
$route['admin/api/adrecod/skip/(:any)'] = 'Admin_controller/adrecord_handle_skip/$1';
$route['admin/api/adrecod/hold/(:any)'] = 'Admin_controller/adrecord_handle_hold/$1';
$route['admin/api/adrecod_process'] = 'Admin_controller/adrecord_handle_process';

/* API - Adrecord butiker */
$route['api/adrecord_butiker'] = 'API_adrecord_controller/fetch_stores';
$route['api/adrecord_butiker_2'] = 'API_adrecord_controller/fetch_details';
$route['api/adrecord_rabattkoder'] = 'API_adrecord_controller/fetch_rabattkoder';

/*
*   Cronjob
*
*/

//Uppdaterar endast Ellos och deras aktuell REA
$route['croni/autosale_update'] = 'Sale_update_controller/update_shoes_ellos_1';

//Hämtar information från databasen var 5:e minut - FUNGERAR EJ som den ska just nu
$route['croni/autosale_5min_update'] = 'Sale_update_controller/cronjob_from_database';
