<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_sale_controller extends CI_Controller {

  public function __construct()
  {
    parent :: __construct();

    $this->load->model('admin_model');

    $this->load->library('authentication');

    //Check if user logged in or not
    if (!$this->authentication->is_loggedin())
    {
      redirect('/');
    }
  }

  /*
  * REA - överblick
  */
  public function sale_overview()
  {
    $data['title'] = 'REA - Överblick';
    $data['rubrik'] = 'REA - Överblick';

    //Hämta alla butiker
    $data['all_sale'] = $this->admin_model->overview_fetch_sale();

    $this->template->load('templates/admin_template', 'admin/sale_overview', $data);
  }

  /*
  * Ändra REA-sida
  */
  public function edit_sale_page($sale_campaign_id)
  {
    $data['title'] = 'Add REA Kampanj';
    $data['rubrik'] = 'Lägg till ny REA-kampanj';

    //Hämtar butiker som används till dropdowns
    $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

    //Hämtar REA-sidor som används till dropdowns
    $data['sale_pages'] = $this->admin_model->dropdown_fetch_all_sale_pages();

    //Hämta REA-sida information som ska ändras
    $data['sale_info'] = $this->admin_model->fetch_sale_edit($sale_campaign_id);

    $data['sale_campaign_id'] = $sale_campaign_id;

    $this->template->load('templates/admin_template', 'admin/edit_sale_page', $data);
  }

  /*
  * Ändra REA-sida -Process
  */
  public function edit_sale_page_process()
  {
    $update_sale_campains = array(
      'active'              =>  $this->input->post('active'),
      'show_coupon_detail'  =>  $this->input->post('show_coupon_detail'),
      'store_id'            =>  $this->input->post('store_id'),
      'sale_page_id'        =>  $this->input->post('sale_page_id'),
      'title'               =>  $this->input->post('title'),
      'end_date'            =>  $this->input->post('end_date'),
      'text'                =>  $this->input->post('text'),
      'num_products'        =>  $this->input->post('num_products'),
    );

    $this->admin_model->update_sale($update_sale_campains, $this->input->post('sale_campaign_id'));

    $target_url_data = array(
      'target_url' => $this->input->post('target_url')
    );

    $this->admin_model->update_link_routing($target_url_data, $this->input->post('link_routing_id'));

    $content_data = array(
      'bottom_text' => $this->input->post('bottom_text')
    );

    $this->admin_model->update_sale_content($content_data, $this->input->post('sale_content_id'));

    $this->session->set_flashdata('msg', 'Rabattkoden är nu uppdaterad');

    redirect('admin/edit_sale_page/' . $this->input->post('sale_campaign_id'));
  }

  public function add_sale_page()
  {
    $data['title'] = 'Add Rea';
    $data['rubrik'] = 'Lägg till ny REA-sida';

    $data['categories'] = $this->admin_model->fetch_all_categories();

    $data['subcategories'] = $this->admin_model->fetch_all_subcategories();

    $this->template->load('templates/admin_template', 'admin/add_sale_page', $data);
  }

  public function add_sale_page_process()
  {

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
      'title'            =>  $this->input->post('title'),
      'meta_description' =>  $this->input->post('meta_des'),
      'meta_tags'        =>  $this->input->post('meta_tag')
    );

    $header_data_id = $this->admin_model->add_data($header_data, 'sale_page_header');

    $content_data = array(
      'lead_text'   =>  $this->input->post('lead_text'),
      'bottom_text' => $this->input->post('bottom_text')
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

    $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

    $data['sale_pages'] = $this->admin_model->dropdown_fetch_all_sale_pages();

    $this->template->load('templates/admin_template', 'admin/add_sale_campaign', $data);
  }

  public function add_sale_campaign_process()
  {
    //Link rounting
    $link_routing_data = array(
      'target_url' => $this->input->post('target_url'),
      'type'       => 'sale',
      'store_id'   => $this->input->post('store_id')
    );

    $link_routing_id = $this->admin_model->add_data($link_routing_data, 'link_routing');

    $sale_campaign_data = array(
      'store_id'        =>  $this->input->post('store_id'),
      'sale_page_id'    =>  $this->input->post('sale_page_id'),
      'title'           =>  $this->input->post('title'),
      'end_date'        =>  $this->input->post('end_date'),
      'text'            =>  $this->input->post('text'),
      'num_products'    =>  $this->input->post('num_products'),
      'link_routing_id' =>  $link_routing_id
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

  function random_string_generator()
  {
    $string = md5(uniqid(rand(), true));
    return $string;
  }
}
