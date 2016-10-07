<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    public function __construct()
    {
        parent :: __construct();
        $this->load->library('authentication');

        //Check if user logged in or not
        if (!$this->authentication->is_loggedin())
        {
            redirect('/');
        }
    }

    public function index()
    {
        $this->load->model('admin_model');
        $data['title'] = 'Admin';
        $data['rubrik'] = 'Startsidan';

        $data['num_clicks_this_week'] = $this->admin_model->num_clicks_week(date("W"));

        $data['num_clicks_today'] = $this->admin_model->num_clicks_today(date("Y-m-d"));

        $this->template->load('templates/admin_template', 'admin/start', $data);
    }

    public function new_cronjob()
    {
        $this->load->model('admin_model');
        $data['title'] = 'Admin';
        $data['rubrik'] = 'Startsidan';

        $data['sale_campaigns'] = $this->admin_model->fetch_all_sale_campaings();

        $this->template->load('templates/admin_template', 'admin/add_cronjob', $data);
    }

    public function new_cronjob_process()
    {
        $this->load->model('admin_model');
        $today = date("Y-m-d");

        $cronjob_data = array(
            'url'       =>  $this->input->post('url'),
            'product'   =>  $this->input->post('product'),
            'store'     =>  $this->input->post('store'),
            'xpath'     =>  $this->input->post('xpath'),
            'sale_campaign_id'  =>  $this->input->post('sale_campaign_id'),
            'last_update'   =>  $today
        );

        $this->admin_model->add_data($cronjob_data, 'cronjobs');

        redirect('admin/new_cronjob');
    }

    public function api_logs()
    {
        $data['title'] = 'Admin - API-loggar';

        $data['rubrik'] = 'API-loggar';

        $this->load->model('admin_model');

        $data['api_logs'] = $this->admin_model->fetch_api_logs();

        $this->template->load('templates/admin_template', 'admin/api_logs', $data);
    }

    public function sale_logs()
    {
        $data['title'] = 'Admin - API-loggar';

        $data['rubrik'] = 'API-loggar';

        $this->load->model('admin_model');

        $data['api_logs'] = $this->admin_model->fetch_api_salelogs();

        $this->template->load('templates/admin_template', 'admin/api_sale_logs', $data);
    }

    public function adrecord_handle()
    {
        $data['title'] = 'Admin [API] - Adrecod Hantering';

        $data['rubrik'] = '[API] - Adrecod Hantering';

        $this->load->model('admin_model');

        $data['all_stores'] = $this->admin_model->fetch_api_adrecord_stores('adrecord');

        $data['categories'] = $this->admin_model->fetch_all_categories();

        $this->template->load('templates/admin_template', 'admin/api_handle', $data);
    }

    public function adrecord_handle_skip($uri)
    {
        $this->load->model('admin_model');

        $this->admin_model->skip_store($uri);

        redirect('admin/api/adrecod');
    }

    public function adrecord_handle_hold($uri)
    {
        $this->load->model('admin_model');

        $this->admin_model->hold_store($uri);

        redirect('admin/api/adrecod');
    }

    public function swe_characters($string)
  	{
  		$search = array('å', 'ä', 'ö');
  		$replace = array('a', 'a', 'o');

  		$string = str_replace($search, $replace, $string);

  		return $string;
  	}

    public function adrecord_handle_process()
    {
        $this->load->model('admin_model');
        $today = date("Y-m-d");

        $post_butik_id = $this->input->post('butik_id');


        $result = $this->admin_model->fetch_adrecord_store($post_butik_id);

        $content_data = array(
            'lead_text'     =>  $this->input->post('lead_text'),
            'bottom_text'   =>  $this->input->post('bottom_text')
        );

        $content_data_id = $this->admin_model->add_data($content_data, 'content');

        $header_data = array(
            'meta_description'  =>  $this->input->post('meta_des'),
            'meta_tags'         =>  $this->input->post('meta_tag'),
            'title'             =>  $this->input->post('title')
        );

        $header_data_id = $this->admin_model->add_data($header_data, 'header_data');

        $link_routing_data = array(
            'epi'   =>  'homelink',
            'type'  =>  'homelink',
        );

        $link_routing_id = $this->admin_model->add_data($link_routing_data, 'link_routing');

        $store_data = array(
            'name'              =>  $this->input->post('name'),
            'store_logo'        =>  $this->input->post('logo_src'),
            'url'               =>  $this->input->post('url'),
            'link_routing_id'   =>  $link_routing_id,
            'content_id'        =>  $content_data_id,
            'header_id'         =>  $header_data_id,
            'online'            =>  1,
            'coupons'           =>  $this->input->post('coupons'),
            'affiliate_link'    =>  $this->input->post('affiliate_url'),
            'affiliate_img'     =>  $this->input->post('affiliate_img')
        );

        $store_id = $this->admin_model->add_data($store_data, 'stores');

        $categories_data = array(
            'store_id'          =>  $store_id,
            'category_id'       =>  $result->category
        );

        $categories_data_id = $this->admin_model->add_data($categories_data, 'store_categories');


        //Slug data
        $slug_data = array(
            'store_id'      =>  $store_id,
            'slug'          =>  $this->input->post('slug'),
            'slug_category' =>  'rabattkod'
        );

        $this->admin_model->add_data($slug_data, 'slugs');

        //Uppdatera offers med link_routing_id
        $update_data = array(
            'store_id'      =>  $store_id,
            'target_url'    =>  $this->input->post('url')
        );

        $this->admin_model->update_link_routing_store($update_data, $link_routing_id);

        $this->admin_model->delete_api_store($post_butik_id);

        $this->session->set_flashdata('msg', 'Butiken är nu tillagd');

        redirect('admin/api/adrecod');
    }

    public function todo()
    {
        $data['title'] = 'Admin - Todo';

        $data['rubrik'] = 'Todo - Vad behöver uppdateras/checkas?';

        $this->load->model('admin_model');

        $date = date('Y-m-d', strtotime('-5 days'));

        $data['all_butiker'] = $this->admin_model->fetch_store_that_need_update($date);

        $this->template->load('templates/admin_template', 'admin/todo', $data);
    }

    public function update_uppdaterad_datum()
    {
        $butik_id = $this->uri->segment(4);
        $date = date('Y-m-d');

        $this->load->model('admin_model');

        $this->admin_model->update_uppdatera_rabattkoder($butik_id, $date);

        redirect('admin/todo');
    }

    public function store_overview()
    {
        $this->load->model('admin_model');

        $data['title'] = 'Admin';

        $data['rubrik'] = 'Butiker - Överblick';

        $data['all_stores'] = $this->admin_model->overview_fetch_stores();

        $this->template->load('templates/admin_template', 'admin/store_overview', $data);
    }

    public function coupons_overview()
    {
        $this->load->model('admin_model');

        $data['title'] = 'Admin';
        $data['rubrik'] = 'Rabattkoder - Överblick';

        $data['all_coupons'] = $this->admin_model->overview_fetch_coupons();

        $this->template->load('templates/admin_template', 'admin/coupons_overview', $data);
    }

    /*public function offer_overview()
    {
        $this->load->model('admin_model');

        $data['title'] = 'Admin';
        $data['rubrik'] = 'Erbjudanden - Överblick';

        $data['all_offers'] = $this->admin_model->overview_fetch_offers();

        $this->template->load('templates/admin_template', 'admin/offers_overview', $data);
    }*/

    /*
    public function edit_offer($offer_id)
    {
        $data['title'] = 'Ändra Erbjudanden';

        $data['rubrik'] = 'Ändra erbjudanden';

        $this->load->model('admin_model');

        $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

        $data['offer_info'] = $this->admin_model->fetch_offer_edit($offer_id);

        $data['offer_id'] = $offer_id;

        $this->template->load('templates/admin_template', 'admin/edit_offer', $data);
    }

    public function edit_offer_process()
    {
        $this->load->model('admin_model');

        $update_data = array(
            'active'    =>  $this->input->post('active'),
            'store_id'  =>  $this->input->post('store_id'),
            'featured'  =>  $this->input->post('featured'),
            'title'     =>  $this->input->post('title'),
            'end_date'  =>  $this->input->post('end_date'),
            'text'      =>  $this->input->post('text')
        );

        $this->admin_model->update_offer($update_data, $this->input->post('offer_id'));

        //Target url
        $target_url_data = array(
            'target_url'    =>  $this->input->post('target_url')
        );

        $this->admin_model->update_link_routing($target_url_data, $this->input->post('link_routing_id'));

        $this->session->set_flashdata('msg', 'Erbjudandet är nu uppdaterad');

        redirect('admin/edit_offer/' . $this->input->post('offer_id'));
    } */

    /*

    public function add_sale_page()
    {
        $data['title'] = 'Add Rea';

        $data['rubrik'] = 'Lägg till ny REA-sida';

        $this->load->model('admin_model');

        $data['categories'] = $this->admin_model->fetch_all_categories();

        $data['subcategories'] = $this->admin_model->fetch_all_subcategories();

        $this->template->load('templates/admin_template', 'admin/add_sale_page', $data);
    }

    public function add_sale_page_process()
    {
        $this->load->model('admin_model');
        $today = date("Y-m-d");

        //Ladda upp LOGON
        $config['upload_path'] = './assets/img/rea';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '20000';
		$config['max_width']  = '1600';
		$config['max_height']  = '600';
		$config['file_name'] = $this->random_string_generator();

		$this->load->library('upload', $config);

		//Error, något blev fel med bilden.
		if (!$this->upload->do_upload('header_img'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->template->load('templates/admin_template', 'admin/add_store', $error);
		}

        //Header data
        $header_data = array(
            'title'             =>  $this->input->post('title'),
            'meta_description'  =>  $this->input->post('meta_des'),
            'meta_tags'         =>  $this->input->post('meta_tag')
        );

        $header_data_id = $this->admin_model->add_data($header_data, 'sale_page_header');

        $content_data = array(
            'lead_text'     =>  $this->input->post('lead_text'),
            'bottom_text'   => $this->input->post('bottom_text')
        );

        $content_data_id = $this->admin_model->add_data($content_data, 'sale_page_content');

        $sale_data = array(
            'content_id'    =>  $content_data_id,
            'nisch'         =>  $this->input->post('nisch'),
            'header_id'     =>  $header_data_id,
            'header_img'    =>  $config['file_name']
        );

        $sale_page_id = $this->admin_model->add_data($sale_data, 'sale_pages');

        //categories
        $categories_data = array(
            'page_id'           =>  $sale_page_id,
            'category_id'       =>  $this->input->post('category'),
            'subcategory_id'    =>  $this->input->post('subcategory')
        );

        $categories_data_id = $this->admin_model->add_data($categories_data, 'sale_categories');

        //Slug data
        $slug_data = array(
            'store_id'      =>  $sale_page_id,
            'slug'          =>  $this->input->post('slug'),
            'slug_category' =>  'rea'
        );

        $slug_data_id = $this->admin_model->add_data($slug_data, 'slugs');

        $this->session->set_flashdata('msg', 'REA-sidan är nu tillagd');

        redirect('admin/add_sale_page');

    }

    public function add_sale_campaign()
    {
        $data['title'] = 'Add REA Kampanj';

        $data['rubrik'] = 'Lägg till ny REA-kampanj';

        $this->load->model('admin_model');

        $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

        $data['sale_pages'] = $this->admin_model->dropdown_fetch_all_sale_pages();

        $this->template->load('templates/admin_template', 'admin/add_sale_campaign', $data);
    }

    public function add_sale_campaign_process()
    {
        $this->load->model('admin_model');

        //Link rounting
        $link_routing_data = array(
            'target_url'    =>  $this->input->post('target_url'),
            'type'          =>  'sale',
            'store_id'      =>  $this->input->post('store_id')
        );

        $link_routing_id = $this->admin_model->add_data($link_routing_data, 'link_routing');

        $sale_campaign_data = array(
            'store_id'          =>  $this->input->post('store_id'),
            'sale_page_id'      =>  $this->input->post('sale_page_id'),
            'title'             =>  $this->input->post('title'),
            'end_date'          =>  $this->input->post('end_date'),
            'text'              =>  $this->input->post('text'),
            'num_products'      =>  $this->input->post('num_products'),
            'link_routing_id'   =>  $link_routing_id
        );

        $sale_campaign_id = $this->admin_model->add_data($sale_campaign_data, 'sale_campaigns');

        //Uppdatera offers med link_routing_id
        $update_sale_data = array(
            'link_routing_id'   =>  $link_routing_id
        );

        $this->admin_model->update_link_routing_campaign($update_sale_data, $sale_campaign_id);

        //Uppdatera epi
        $update_epi = array(
            'epi'   =>  $sale_campaign_id .'-[sale]'
        );

        $this->admin_model->update_link_routing_epi($update_epi, $link_routing_id);

        $this->session->set_flashdata('msg', 'REA-kampanjen är nu tillagd');

        redirect('admin/add_sale_campaign');
    }



    public function add_offer()
    {
        $data['title'] = 'Nytt erbjudanden';

        $data['rubrik'] = 'Lägg till nytt erbjudande';

        $this->load->model('admin_model');

        $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

        $this->template->load('templates/admin_template', 'admin/add_offer', $data);
    }

    public function add_offer_process()
    {
        $today = date("Y-m-d");

        $this->load->model('admin_model');

        $link_routing_data = array(
            'target_url'    =>  $this->input->post('target_url'),
            'type'          =>  'offer',
            'store_id'      =>  $this->input->post('store_id')
        );

        $link_routing_id = $this->admin_model->add_data($link_routing_data, 'link_routing');

        $offer_data = array(
            'store_id'  =>  $this->input->post('store_id'),
            'title'     =>  $this->input->post('title'),
            'end_date'  =>  $this->input->post('end_date'),
            'text'      =>  $this->input->post('text')
        );

        $offers_id = $this->admin_model->add_data($offer_data, 'offers');

        //Uppdatera "uppdaterad" på Butiker
        //$this->admin_model->update_store($this->input->post('store_id'), $today);

        //Link rounting


        //Uppdatera offers med link_routing_id
        $update_data = array(
            'link_routing_id'   =>  $link_routing_id
        );

        $this->admin_model->update_link_routing_offer($update_data, $offers_id);

        //Uppdatera epi
        $update_epi = array(
            'epi'   =>  $offers_id .'-[offer]'
        );

        $this->admin_model->update_link_routing_epi($update_epi, $link_routing_id);

        $this->session->set_flashdata('msg', 'Erbjudandet är nu tillagd');

        redirect('admin/add_offer');
    } */

    public function add_coupon()
    {
        $data['title'] = 'Add coupon';

        $data['rubrik'] = 'Lägg till ny Rabattkod';

        $this->load->model('admin_model');

        $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

        $this->template->load('templates/admin_template', 'admin/add_coupon', $data);
    }

    public function add_coupon_process()
    {
        $this->load->model('admin_model');

        $store_url = $this->admin_model->fetch_store_url($this->input->post('store_id'));

        //Link rounting
        $link_routing_data = array(
            'target_url'    =>  $store_url->url,
            'type'          =>  'coupon',
            'store_id'      =>  $this->input->post('store_id')
        );

        $link_routing_id = $this->admin_model->add_data($link_routing_data, 'link_routing');

        $coupon_data = array(
            'store_id'          =>  $this->input->post('store_id'),
            'end_date'          =>  $this->input->post('end_date'),
            'code'              =>  $this->input->post('code'),
            'title'             =>  $this->input->post('title'),
            'text'              =>  $this->input->post('text'),
            'link_routing_id'   =>  $link_routing_id
        );

        $coupon_id = $this->admin_model->add_data($coupon_data, 'coupons');

        //Uppdatera offers med link_routing_id
        $update_coupon_data = array(
            'link_routing_id'   =>  $coupon_id
        );

        $this->admin_model->update_link_routing_campaign($update_coupon_data, $coupon_id);


        //Uppdatera epi
        $update_epi_data = array(
            'epi'   =>  $coupon_id .'-[coupon]'
        );

        $this->admin_model->update_link_routing_epi($update_epi_data, $link_routing_id);


        //Uppdatera "uppdaterad" på Butiker/stores
        $update_data = array(
            'todays_date'   =>  date("Y-m-d"),
            'id'            =>  $this->input->post('store_id'),
            'table'         =>  'stores'
        );

        $this->admin_model->update_data($update_data);

        $this->session->set_flashdata('msg', 'Rabattkoden är nu tillagd');

        redirect('admin/add_coupon');
    }

    public function add_category()
    {

        $data['rubrik'] = 'Lägg till ny Kategori';
        $data['title'] = 'Add kategori';
        $this->template->load('templates/admin_template', 'admin/add_category', $data);
    }

    public function add_category_process()
    {
        $this->load->model('admin_model');

        $data = array(
            'cat_name'  =>  $this->input->post('category'),
            'slug_cat_name' =>  $this->swe_characters($this->input->post('category'))
        );

        $this->admin_model->add_data($data, 'all_categories');

        $this->session->set_flashdata('msg', 'Kategorin är nu tillagd');

        redirect('admin/add_category');
    }

    public function add_subcategory()
    {
        $this->load->model('admin_model');

        $data['rubrik'] = 'Lägg till ny Sub-kategori';

        $data['title'] = 'Add Sub-kategori';

        $data['categories'] = $this->admin_model->fetch_all_categories();


        $this->template->load('templates/admin_template', 'admin/add_subcategory', $data);
    }

    public function add_subcategory_process()
    {
        $this->load->model('admin_model');

        $data = array(
            'head_category_id'  => $this->input->post('category'),
            'subcat_name'       =>  $this->input->post('subcategory'),
            'slug_subcat_name'  =>  $this->swe_characters($this->input->post('subcategory'))
        );

        $test = $this->admin_model->add_data($data, 'all_subcategories');

        $this->session->set_flashdata('msg', 'Kategorin är nu tillagd');

        redirect('admin/add_subcategory');
    }

    public function add_store()
    {
        $data['title'] = 'Add store';

        $data['rubrik'] = 'Lägg till ny Butik';

        $this->load->model('admin_model');

        $data['categories'] = $this->admin_model->fetch_all_categories();

        $data['subcategories'] = $this->admin_model->fetch_all_subcategories();

        $this->template->load('templates/admin_template', 'admin/add_store', $data);
    }

    public function add_store_process()
    {
        $this->load->model('admin_model');
        $today = date("Y-m-d");

        //Ladda upp LOGON
        $config['upload_path'] = './img/logos';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '250';
		$config['max_height']  = '250';
        $config['create_thumb'] = TRUE;
		$config['file_name'] = $this->random_string_generator();

		$this->load->library('upload', $config);

		//Error, något blev fel med bilden.
		if (!$this->upload->do_upload('logo'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->template->load('templates/admin_template', 'admin/add_store', $error);
		}

        $content_data = array(
            'lead_text'     =>  $this->input->post('lead_text'),
            'bottom_text'   =>  $this->input->post('bottom_text')
        );

        $content_data_id = $this->admin_model->add_data($content_data, 'content');

        $header_data = array(
            'meta_description'  =>  $this->input->post('meta_des'),
            'meta_tags'         =>  $this->input->post('meta_tag'),
            'title'             =>  $this->input->post('title')
        );

        $header_data_id = $this->admin_model->add_data($header_data, 'header_data');


        $link_routing_data = array(
            'epi'   =>  'homelink',
            'type'  =>  'homelink',
        );

        $link_routing_id = $this->admin_model->add_data($link_routing_data, 'link_routing');

        $store_data = array(
            'name'              =>  $this->input->post('name'),
            'store_logo'        => 'img/logos/' . $this->upload->data('file_name'),
            'url'               =>  $this->input->post('url'),
            'link_routing_id'   =>  $link_routing_id,
            'content_id'        =>  $content_data_id,
            'header_id'         =>  $header_data_id,
            'online'            =>  1,
            'coupons'           =>  $this->input->post('coupons'),
            'affiliate_link'    =>  $this->input->post('affiliate_url'),
            'affiliate_img'     =>  $this->input->post('affiliate_img')
        );

        $store_id = $this->admin_model->add_data($store_data, 'stores');

        $categories_data = array(
            'store_id'          =>  $store_id,
            'category_id'       =>  $this->input->post('category'),
            'subcategory_id'    =>  $this->input->post('subcategory')
        );

        $categories_data_id = $this->admin_model->add_data($categories_data, 'store_categories');

        //Slug data
        $slug_data = array(
            'store_id'      =>  $store_id,
            'slug'          =>  $this->input->post('slug'),
            'slug_category' =>  'rabattkod'
        );

        $this->admin_model->add_data($slug_data, 'slugs');

        //Uppdatera offers med link_routing_id
        $update_data = array(
            'store_id'      =>  $store_id,
            'target_url'    =>  $this->input->post('url')
        );

        $this->admin_model->update_link_routing_store($update_data, $link_routing_id);

        $this->session->set_flashdata('msg', 'Butiken är nu tillagd');

        redirect('admin/add_store');
    }

    /*

    public function sale_overview()
    {
        $this->load->model('admin_model');

        $data['title'] = 'REA - Överblick';
        $data['rubrik'] = 'REA - Överblick';

        $data['all_sale'] = $this->admin_model->overview_fetch_sale();

        $this->template->load('templates/admin_template', 'admin/sale_overview', $data);
    }

    public function edit_sale_page($sale_campaign_id)
    {
        $data['title'] = 'Add REA Kampanj';

        $data['rubrik'] = 'Lägg till ny REA-kampanj';

        $this->load->model('admin_model');

        $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

        $data['sale_pages'] = $this->admin_model->dropdown_fetch_all_sale_pages();

        $data['sale_info'] = $this->admin_model->fetch_sale_edit($sale_campaign_id);

        $data['sale_campaign_id'] = $sale_campaign_id;

        $this->template->load('templates/admin_template', 'admin/edit_sale_page', $data);
    }

    public function edit_sale_page_process()
    {
        $this->load->model('admin_model');

        $update_sale_campains = array(
            'active'                =>  $this->input->post('active'),
            'show_coupon_detail'    => $this->input->post('show_coupon_detail'),
            'store_id'              =>  $this->input->post('store_id'),
            'sale_page_id'          =>  $this->input->post('sale_page_id'),
            'title'                 =>  $this->input->post('title'),
            'end_date'              =>  $this->input->post('end_date'),
            'text'                  =>  $this->input->post('text'),
            'num_products'          =>  $this->input->post('num_products'),
        );

        $this->admin_model->update_sale($update_sale_campains, $this->input->post('sale_campaign_id'));

        //target_url
        $target_url_data = array(
            'target_url'    =>  $this->input->post('target_url')
        );

        $this->admin_model->update_link_routing($target_url_data, $this->input->post('link_routing_id'));

        $content_data = array(
            'bottom_text'   =>  $this->input->post('bottom_text')
        );

        $this->admin_model->update_sale_content($content_data, $this->input->post('sale_content_id'));

        $this->session->set_flashdata('msg', 'Rabattkoden är nu uppdaterad');

        redirect('admin/edit_sale_page/' . $this->input->post('sale_campaign_id'));
    } */

    public function edit_store($store_id)
    {
        $data['title'] = 'Edit store';

        $data['rubrik'] = 'Ändra butik';

        $this->load->model('admin_model');
        $this->load->model('public_model');

        $data['categories'] = $this->admin_model->fetch_all_categories();

        $data['product_info'] = $this->admin_model->fetch_store_edit($store_id);

        $data['store_id'] = $store_id;

        $this->template->load('templates/admin_template', 'admin/edit_store', $data);
    }

    public function edit_store_process()
    {
        $this->load->model('admin_model');

        $content_data = array(
            'lead_text'     =>  $this->input->post('lead_text'),
            'bottom_text'   =>  $this->input->post('bottom_text')
        );

        $this->admin_model->update_edit_content($content_data, $this->input->post('content_id'));

        $header_data = array(
            'meta_description'  =>  $this->input->post('meta_des'),
            'meta_tags'         =>  $this->input->post('meta_tag'),
            'title'             =>  $this->input->post('title')
        );

        $this->admin_model->update_edit_header($header_data, $this->input->post('header_data_id'));

        $store_data = array(
            'name'              =>  $this->input->post('name'),
            'url'               =>  $this->input->post('url'),
            'online'            =>  1,
            'coupons'           =>  $this->input->post('coupons'),
            'affiliate_link'    =>  $this->input->post('affiliate_url'),
            'affiliate_img'     =>  $this->input->post('affiliate_img'),
            'featured'          =>  $this->input->post('featured')
        );

        $this->admin_model->update_edit_stores($store_data, $this->input->post('store_id'));

        $categories_data = array(
            'category_id'       =>  $this->input->post('category'),
            'subcategory_id'    =>  $this->input->post('subcategory')
        );

        $this->admin_model->update_edit_categories($categories_data, $this->input->post('store_id'));

        //Slug data
        $slug_data = array(
            'slug'          =>  $this->input->post('slug'),
        );

        $this->admin_model->update_edit_slugs($slug_data, $this->input->post('store_id'));

        //Uppdatera offers med link_routing_id
        $update_data = array(
            'target_url'    =>  $this->input->post('url')
        );

        $this->admin_model->update_edit_linkrouting($update_data, $this->input->post('link_routing_id'));

        $this->session->set_flashdata('msg', 'Butiken är nu uppdaterad');

        redirect('admin/edit_store/' . $this->input->post('store_id'));
    }

    public function edit_coupon($coupon_id)
    {
        $data['title'] = 'Ändra rabattkod';

        $data['rubrik'] = 'Ändra rabattkod';

        $this->load->model('admin_model');

        $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

        $data['coupon_info'] = $this->admin_model->fetch_coupon_edit($coupon_id);

        $data['coupon_id'] = $coupon_id;

        $this->template->load('templates/admin_template', 'admin/edit_coupon', $data);
    }

    public function edit_coupon_process()
    {
        $this->load->model('admin_model');

        $data = array(
            'coupon_id'     =>  $this->input->post('coupon_id'),
            'code'          =>  $this->input->post('code'),
            'end_date'      =>  $this->input->post('end_date'),
            'title'         =>  $this->input->post('title'),
            'text'          =>  $this->input->post('text'),
            'active'        =>  $this->input->post('active'),
            'featured_home' =>  $this->input->post('featured_home')
        );

        $this->admin_model->update_coupon($data, $this->input->post('coupon_id'));

        $this->session->set_flashdata('msg', 'Rabattkoden är nu uppdaterad');

        redirect('admin/edit_coupon/' . $this->input->post('coupon_id'));
    }

	function random_string_generator()
	{
		$string = md5(uniqid(rand(), true));
		return $string;
	}

    public function logout()
    {
        $this->authentication->logout();

        redirect('/');
    }

    public function test()
    {

        $this->load->library('Simple_html_dom');
        $html = file_get_html('http://www.ellos.se/rea/skor');

        $num_women_shoes = $html->find('//*[@id="GenderDepartment"]/li/ul/li[1]/span', 0)->plaintext;

        $num_women_shoes = str_replace("(","", $num_women_shoes);
        $num_women_shoes = str_replace(")","", $num_women_shoes);
        echo $num_women_shoes;






        //$elems = $xpath->query("//*[@id='GenderDepartment']/li/ul/li[1]/span/text()");




    }

    private function remove_Parentheses($string)
    {
        $string = str_replace("(","", $string);
        $string = str_replace(")","", $string);

        return $string;
    }
}
