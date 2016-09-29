<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Public_controller extends CI_Controller
{
    //Testar om det uppdaterar

    /*
    * Startsidan - View
    * http://reeo.se/
    */
    public function index()
    {
        $data['title'] = 'Reeo.se - Handla din vara billigare!';
        $data['meta_des'] = 'På Reeo.se hittar du tips på rabattkoder, erbjudanden, REA på din produkt och mycket mer.';
        $data['active_coupon_modal'] = false;

        //Dagens datum
        $today = date('Y-m-d');

        $this->load->model('public_model');

        $data['startsidan_meny'] = true;

        //Hämta antalet aktiva REA-kampanjer
        //$data['num_active_rea_kampanjer'] = $this->public_model->num_active_rea_kampanjer($today);

        //Hämtar "X" antal random butiker
        $data['featured_stores'] = $this->public_model->fetch_featured_stores(5);

        //Hämta antalet aktiva rabattkoder
        //$data['num_active_rabattkoder'] = $this->public_model->num_active_rabattkoder($today);

        //Hämta antalet aktiva butiker
        //$data['num_active_butiker'] = $this->public_model->num_active_butiker();

        //Hämtar totalta antalet produkter på rean.
        $num_products_herrskor = $this->public_model->total_products_on_sale($today, 2)->num_products;

        $num_products_damskor = $this->public_model->total_products_on_sale($today, 3)->num_products;

        $num_products_barnskor = $this->public_model->total_products_on_sale($today, 4)->num_products;


        $data['num_products_herrskor'] = $this->thousand_number($num_products_herrskor);

        $data['num_products_damskor'] = $this->thousand_number($num_products_damskor);

        $data['num_products_barnskor'] = $this->thousand_number($num_products_barnskor);

        //Hämta rabattkoder som ska visas på startsidan
        $data['featured_coupons'] = $this->public_model->fetch_featured_coupons($today, 5);

        $data['sale_campaigns'] = $this->public_model->fetch_sale_campaigns($today, 5);

        $data['five_active_coupons'] = $this->public_model->fetch_5_last_active_coupons($today);


        $this->template->load('templates/homepage_template', 'public/homepage', $data);
    }

    /*
    * Kontakta oss - View
    */
    public function kontakta_oss()
    {
        $data['title'] = 'Kontakta oss - Reeo.se';
        $data['meta_des'] = '';
        $data['active_coupon_modal'] = false;

        $this->template->load('templates/homepage_template', 'public/contact_us', $data);
    }

    /*
    * Sekretessinformation - View
    */
    public function sekretessinformation()
    {
        $data['title'] = 'Sekretessinformation - Reeo.se';
        $data['meta_des'] = '';
        $data['active_coupon_modal'] = false;

        $this->template->load('templates/homepage_template', 'public/sekretessinformation', $data);
    }

    /*
    * Affiliate link routing - function
    * http://reeo.se/ut/XXXX
    */
    public function link_routing($link_routing_id)
    {
        $this->load->model('public_model');

        //Kontrollerar om länken finns, om den finns skickar den tillbaka värden
        $row = $this->public_model->check_affiliate_routing($link_routing_id);

        //Tar bort -[RABATTKOD] eller -[REA] from epi
        $raw_epi = substr($row->epi, 0, strpos($row->epi, '-'));

        //Om det inte finns någon affiliate länk med det ID:et
        if (!$row) {
            show_404();
        } else {
            $this->load->library('user_agent');

            $time = date('Y-m-d H:i:s');

            //KOntrollerar om "klickaren" är en robot eller crawler
            if (!$this->agent->is_robot()) {
                //Tracking
                $tracking_data = array(
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'time' => $time,
                    'store_id' => $row->id,
                    'week' => date('W'),
                    'epi' => $row->epi,
                    'type' => $row->type,
                    'link_routing_id' => $row->link_routing_id,
                );

                //Lägger till klick till databasen
                $this->public_model->add_click($tracking_data);

                $click_data = array(
                    'epi' => $row->epi,
                    'type' => $row->type,
                    'store_id' => $row->id,
                );

                //Uppdatera antal klick länken har fått
                $this->public_model->update_click_count($click_data);
            }

            //Fixar till affiliate-länken med verkliga värden URL och EPI som Hämtas från databasen (check_affiliate_routing()).
            if ($row->affiliate_link) {
                $aff = array('{url}', '{epi}');

                //Kontrollera om det finns någon target_url
                $result = $this->public_model->check_if_targeturl($link_routing_id);

                if ($result->target_url) {
                    $keywords = array($result->target_url, $row->epi);
                } else {
                    $keywords = array($row->url, $row->epi);
                }

                $link_out = str_replace($aff, $keywords, $row->affiliate_link);
            } else {
                $link_out = $row->url;
            }

            redirect($link_out, 302);
        }
    }

    /*
    * REA - View
    * http://reeo.se/rea
    */
    public function sale()
    {
        $this->load->model('public_model');

        $data['title'] = 'REA - Finns din produkt på REA? - Reeo.se';

        $data['meta_des'] = 'Letar du efter någon speciell produkt och undra om den finns på REA? Här finns en lista på många olika produkter och aktuella reor.';

        //Inaktivera rabattkod modal
        $data['active_coupon_modal'] = false;

        //Aktivera Rea_menyn
        $data['rea_meny'] = true;

        $sale_pages = $this->public_model->fetch_all_sale_pages();

        foreach ($sale_pages as $row) {
            $firstletter = substr($row->nisch, 0, 1);
            $result[$firstletter][] = $row;
        }

        $data['all_sale_pages'] = $result;

        $this->template->load('templates/homepage_template', 'public/all_sale', $data);
    }

    /*
    * REA Detail - View
    * T.ex; http://reeo.se/rea/herrskor
    */
    public function sale_detail($segment_2)
    {
        $this->load->model('public_model');

        //URI-segment
        $segment_1 = 'rea';

        //Inaktivera rabattkod modal
        $data['active_coupon_modal'] = false;

        //Aktivera Rea_menyn
        $data['rea_meny'] = true;

        //Dagens datum
        $today = date('Y-m-d');

        //Kontroller om Slug finns, hämtar "page_id" för sidan om kombinationen finns i databasen
        $page_id = $this->public_model->check_if_slug_exists($segment_1, $segment_2);

        //Om det inte finns någon matchande slug, 404!
        if (!$page_id) {
            show_404();
        }

        //Hämta information om REA-sidan
        $data['page_info'] = $this->public_model->fetch_sale_page($page_id);

        //Kontrollerar om sidan är en "Huvudsida", eller en undersida
        if ($data['page_info']->subcategory_id == 0) {
            //Det är en Huvudsida
            $result = $this->public_model->check_if_any_subcat($data['page_info']->category_id);

            if ($result) {
                //Hämta namn på kategorin på nuvarande sidan
                $current_category_name = $this->public_model->category_name_by_id($data['page_info']->category_id);

                foreach ($result as $row) {
                    $array_data[] = array(
                        'current_cat' => $current_category_name->cat_name,
                        'swe_nisch' => $this->swe_characters($row->nisch),
                        'nisch' => $row->nisch,
                     );
                }

                $data['subcategories'] = $array_data;
            }
        }

        //Hämtar antal rabattkoder som är AKTIVA
        $data['num_active_sale'] = $this->public_model->num_active_sales($page_id, $today);

        //Om AKTIVA rabattkoder är över 0 så hämtar vi alla aktiva rabattkoder
        if ($data['num_active_sale'] > 0) {
            $data['all_active_sale'] = $this->public_model->fetch_active_sales($page_id, $today);
        }

        //Hämtar totalta antalet produkter på rean.
        $num_products_on_sale = $this->public_model
            ->total_products_on_sale($today, $data['page_info']->sale_id)
            ->num_products;

        $data['nisch'] = $data['page_info']->nisch;

        $data['meta_des'] = 'Köp billiga '.$data['page_info']->nisch.' online - Totalt '.$num_products_on_sale.' '.$data['page_info']->nisch.' på REA - Från '.''.$data['num_active_sale'].' olika onlinebutiker';

        $data['num_products_on_sale'] = $this->thousand_number($num_products_on_sale);

        $data['title'] = 'Billiga '.$data['page_info']->nisch.' - Just nu '.$data['num_products_on_sale'].' '.$data['page_info']->nisch.' på REA';

        $this->template->load('templates/homepage_template', 'public/sale_detail', $data);
    }

    public function swe_characters($string)
    {
        $search = array('å', 'ä', 'ö');
        $replace = array('a', 'a', 'o');

        $string = str_replace($search, $replace, $string);

        return $string;
    }

    public function sale_detail_under_cat($category, $subcategory)
    {
        $this->load->model('public_model');

        $cat_result = $this->public_model->get_cat_id_by_name(strtolower($category));
        $subcat_result = $this->public_model->get_subcat_id_by_name(strtolower($subcategory));

        if (!$cat_result or !$subcat_result) {
            show_404();
        }

        $cat_id = $cat_result->all_categories_id;
        $subcat_id = $subcat_result->subcat_id;

        $data['category_data'] = array(
            'cat_id' => $category,
            'subcat_id' => $subcategory,
            'swe_cat_id' => $this->swe_characters($category),
            'swe_subcat_id' => $this->swe_characters($subcategory),
        );

        //kontrollera om denna kombination finns
        $result = $this->public_model->check_catid_and_subcatid_relationship($cat_id, $subcat_id);

        //Inaktivera rabattkod modal
        $data['active_coupon_modal'] = false;

        //Aktivera Rea_menyn
        $data['rea_meny'] = true;

        //Dagens datum
        $today = date('Y-m-d');

        $page_id = $result->page_id;

        $data['page_info'] = $this->public_model->fetch_sale_page($page_id);

        //Hämtar antal rabattkoder som är AKTIVA
        $data['num_active_sale'] = $this->public_model->num_active_sales($page_id, $today);

        //Hämtar totalta antalet produkter på rean.
        $num_products_on_sale = $this->public_model
            ->total_products_on_sale($today, $data['page_info']->sale_id)
            ->num_products;

        $data['num_products_on_sale'] = $this->thousand_number($num_products_on_sale);

        //Om AKTIVA rabattkoder är över 0 så hämtar vi alla aktiva rabattkoder
        if ($data['num_active_sale'] > 0) {
            $data['all_active_sale'] = $this->public_model->fetch_active_sales($page_id, $today);
        }

        $data['nisch'] = $data['page_info']->nisch;

        $data['meta_des'] = 'Köp billiga '.$data['page_info']->nisch.' online - Totalt '.$num_products_on_sale.' '.$data['page_info']->nisch.' på REA - Från '.''.$data['num_active_sale'].' olika onlinebutiker';

        $data['title'] = 'Billiga '.$data['page_info']->nisch.' - Just nu '.

        $data['num_products_on_sale'].' '.$data['page_info']->nisch.' på REA';

        $this->template->load('templates/homepage_template', 'public/sale_detail', $data);
    }

    /*
    * Gör om ett tal med mellanrum (tusental)
    * Tex. 1000 blir 1 000
    */
    public function thousand_number($number)
    {

        return number_format($number, 0, '', ' ');
    }

    /*
    * Rabattkod - View
    * T.ex; http://reeo.se/rabattkoder
    */
    public function coupons()
    {
        $this->load->model('public_model');

        //Dagens datum
        $today = date('Y-m-d');

        $num_active_stores = $this->public_model->num_active_stores();

        $num_active_coupons = $this->public_model->num_active_coupons($today);

        $data['title'] = 'Aktiva rabattkoder - över '.$num_active_stores.' butiker och '.$num_active_coupons.' aktiva rabattkoder';

        $data['meta_des'] = '';

        $data['rabattkod_meny'] = true;

        $data['canonical_coupon'] = true;

        //Hämtar 5 senaste aktiva rabattkoder
        $data['five_active_coupons'] = $this->public_model->fetch_5_last_active_coupons($today);

        //Hämtar 5 "populära" rabattkoder
        $data['featured_coupons'] = $this->public_model->fetch_featured_coupons($today, 5);

        //Hämtar "X" antal random butiker
        $data['random_stores'] = $this->public_model->fetch_random_stores(4);

        /*
            -- Rabattkod special --
        */

        // Denna del aktiveras när besökaren vill se en rabattkod
        if ($this->input->get('k')) {

            $k_value = $this->input->get('k');

            //Kontrollerar om rabattkoden fortfarande finns/är aktiv. Om den är aktiv
            //så skickas datan tillbaka
            $row = $this->public_model->controll_coupon($k_value, $today);

            //Om det INTE återkommer data. Kör en 301 redirect till http://reeo.se/rabattkoder
            if (!$row) {
                redirect('rabattkoder', 'location', 301);
            }

            $epi = $k_value.'-[coupon]';

            //Affiliate länk
            $affiliate_link = $this->public_model->fetch_affiliate_link_by_epi($epi, 'coupon');

            //Aktiverar modelen så koden kan visas
            $data['active_coupon_modal'] = true;

            //Rabattkod modal
            $data['coupon_modal'] = '
				<div id="coupon-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
		          <div class="modal-dialog">
		            <div class="modal-content">
		              <div class="modal-header">
		                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
		                <h3 class="modal-title text-center">Använd rabattkoden nedan</h3>
		              </div>
		              <div class="modal-body">
		                <p class="text-center" style="font-size: 26px; color:#ff7473;"><strong>' .$row->code.'</strong></p>
						<p class="text-center">
						<a type="button" class="btn btn-success btn-sm" href="'.base_url('ut/'.$affiliate_link->link_routing_id).'" style="color:white; font-size: 16px;">Gå till butiken</a></p>
						<hr>
		                <p class="text-muted">
						<strong>'.$row->title.'</strong>!<br>'.$row->text.'<br>Slutdatum: '.$row->end_date.'</p>
		              </div>
		            </div>
		          </div>
		        </div>';
        } else {
            $data['active_coupon_modal'] = false;
        }

        $this->template->load('templates/homepage_template', 'public/all_coupons', $data);
    }

    /*
    * Rabattkod Detail - View
    * T.ex; http://reeo.se/rabattkod/ellos
    */
    public function coupon_detail($store)
    {
        $this->load->model('public_model');

        //Dagens datum
        $today = date('Y-m-d');

        //Kontrollera om det slugen matchar med någon slug i databasen.
        $store_id = $this->public_model->check_if_slug_exists('rabattkod', $store);

        //Om det inte finns någon matchande slug, 404!
        if (!$store_id) {
            show_404();
        }

        $data['store_info'] = $this->public_model->fetch_product_info($store_id);

        $data['affiliate_img'] = $data['store_info']->affiliate_img;

        //Kontrollerar om butiken är satt för Online bruk eller ej
        if ($data['store_info']->online == 0) {
            show_404();
        }

        if ($data['store_info']->coupons == 0) {
            show_404();
        }

        //Hämtar antal rabattkoder som är AKTIVA
        $num_coupons = $this->public_model->fetch_num_coupons($store_id, $today);

        $num_sales = $this->public_model->fetch_num_sales($store_id, $today);

        $num_offers = $this->public_model->fetch_num_offers($store_id, $today);

        $total_items = $num_coupons + $num_sales + $num_offers;

        //Hämtar antal rabattkoder som är INAKTIVA
        $data['num_inactive'] = $this->public_model->fetch_num_inactive($store_id, $today);

        //Om AKTIVA rabattkoder är över 0 så hämlink_routingtar vi alla aktiva rabattkoder
        if ($num_coupons > 0 or $num_sales > 0 or $num_offers > 0) {

            $data['num_active'] = 10;

            $raw_result = $this->public_model->fetch_active_items($store_id, $today);

            usort($raw_result, array($this, 'cmp_clicks'));

            $data['active_coupons'] = $raw_result;

        } else {
            $data['num_active'] = 0;
        }

        //Om INAKTIVA rabattkoder är över 0 så hämtar vi alla INaktiva rabattkoder
        if ($data['num_inactive'] > 0)
        {
            //Hämtar alla inaktiva rabattkoder (Fem senaste)
            $data['all_inactive_rabattkoder'] = $this->public_model->fetch_inactive_items($store_id, $today);
        }

        $data['rabattkod_meny'] = true;

        $data['active_coupon_modal'] = false;

        if ($data['store_info']->title)
        {
            $data['title'] = $data['store_info']->title;
        }
        else
        {
            $data['title'] = $data['store_info']->name.' Rabattkod - '.$this->fix_month(date('F')).' '.date('Y').' - Reeo.se';
        }

        if($data['store_info']->meta_description)
        {
            $data['meta_des'] = $data['store_info']->meta_description;
        }
        else
        {
            $data['meta_des'] = 'Aktiv ' . $data['store_info']->name . ' rabattkod - Här hittar olika typer av information som gör att ni handlar billigt hos ' . $data['store_info']->name . '!';
        }


        $this->template->load('templates/homepage_template', 'public/coupon_detail', $data);
    }

    /*
    * Month till Månad (Engelska till svenska)
    */
    private function fix_month($month)
    {
        if ($month == 'January') {
            return 'Januari';
        }

        if ($month == 'February') {
            return 'Februari';
        }

        if ($month == 'March') {
            return 'Mars';
        }

        if ($month == 'April') {
            return 'April';
        }

        if ($month == 'May') {
            return 'Maj';
        }

        if ($month == 'June') {
            return 'Juni';
        }

        if ($month == 'July') {
            return 'Juli';
        }

        if ($month == 'August') {
            return 'Augusti';
        }

        if ($month == 'September') {
            return 'September';
        }

        if ($month == 'October') {
            return 'Oktober';
        }

        if ($month == 'November') {
            return 'November';
        }

        if ($month == 'December') {
            return 'December';
        }
    }

    /* Sort array - Funktion
    * Används in: rabattkod_detail
    */
    private function cmp($a, $b)
    {
        return strcmp($a->end_date, $b->end_date);
        //return strcmp($b->id, $a->id);
    }

    /* Sort array by clicks! - Funktion
    * Används in: rabattkod_detail
    */
    private function cmp_clicks($a, $b)
    {
        return strcmp($b->clicks, $a->clicks);
        //return strcmp($b->id, $a->id);
    }

    /*
    * Alla butiker - View
    * T.ex; http://reeo.se/butiker
    */
    public function stores()
    {
        $this->load->model('public_model');

        $data['title'] = 'Alla butiker';

        $data['meta_des'] = '';

        $data['active_coupon_modal'] = false;

        $data['butiker_meny'] = true;

        $all_stores = $this->public_model->fetch_all_stores();

        foreach ($all_stores as $row) {
            $firstletter = substr($row->name, 0, 1);
            $result[$firstletter][] = $row;
        }

        $data['all_stores'] = $result;

        $this->template->load('templates/homepage_template', 'public/stores', $data);
    }

    /*
    * Login - View
    * T.ex; http://reeo.se/login
    */
    public function login_view()
    {
        $this->load->view('admin/login');
    }

    /*
    * Login - Process
    */
    public function login_process()
    {
        $this->load->library('authentication');

        // Read the username
        $username = $this->input->post('username');

        // Read the password
        $password = $this->input->post('password');

        // Try to log the user in
        if ($this->authentication->login($username, $password)) {
            // The user was SUCCESSFULLY logged in
            redirect('admin/index');
        } else {
            // The details provided were incorrect
            // No feedback is given as to why the login failed
            redirect('login');
        }
    }

    /*
    * Robot chcker
    *
    */
    public function robot_checker()
    {
        //http://stackoverflow.com/questions/17515381/exclude-bots-and-spiders-from-a-view-counter-in-php
        // basic crawler detection and block script (no legit browser should match this)
        if (!empty($_SERVER['HTTP_USER_AGENT']) and preg_match('~(bot|crawl)~i', $_SERVER['HTTP_USER_AGENT'])) {
            // this is a crawler and you should not show ads here
            return false;
        }

        return true;
    }

    /*
    * Antal dagar sedan DAGENS DATUM och ett annat DATUM - Funktion
    */
    public function days_since_date($date)
    {
        //Dagens datum
        $today = date('Y-m-d');

        $date1 = new DateTime($today);
        $date2 = new DateTime($date);
        $interval = $date2->diff($date1);

        return $interval->days;
    }
}
