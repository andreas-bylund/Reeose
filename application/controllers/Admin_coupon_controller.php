<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_coupon_controller extends CI_Controller {

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
  * Lägg till ny rabattkod
  */
  public function add_coupon()
  {
      $data['title'] = 'Add coupon';
      $data['rubrik'] = 'Lägg till ny Rabattkod';

      //Hämtar butiker som används till dropdowns
      $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

      $this->template->load('templates/admin_template', 'admin/add_coupon', $data);
  }

  /*
  * Lägg till ny rabattkod - Process
  */
  public function add_coupon_process()
  {
    //Hämtar url
    $store_url = $this->admin_model->fetch_store_url($this->input->post('store_id'));

    //Link rounting
    $link_routing_data = array(
      'target_url' =>  $store_url->url,
      'type'       =>  'coupon',
      'store_id'   =>  $this->input->post('store_id')
    );

    //Lägger till Link routing data
    $link_routing_id = $this->admin_model->add_data($link_routing_data, 'link_routing');

    $coupon_data = array(
      'store_id'        =>  $this->input->post('store_id'),
      'end_date'        =>  $this->input->post('end_date'),
      'code'            =>  $this->input->post('code'),
      'title'           =>  $this->input->post('title'),
      'text'            =>  $this->input->post('text'),
      'link_routing_id' =>  $link_routing_id
    );

    //Lägger till Coupon data
    $coupon_id = $this->admin_model->add_data($coupon_data, 'coupons');

    //Uppdatera offers med link_routing_id
    $update_coupon_data = array(
      'link_routing_id' => $coupon_id
    );

    //Uppdaterar link rounting campaign data
    $this->admin_model->update_link_routing_campaign($update_coupon_data, $coupon_id);

    //Uppdatera epi
    $update_epi_data = array(
      'epi' => $coupon_id .'-[coupon]'
    );

    //Uppdaterar link_routing_epi
    $this->admin_model->update_link_routing_epi($update_epi_data, $link_routing_id);

    //Uppdatera "uppdaterad" på Butiker/stores
    $update_data = array(
      'todays_date' => date("Y-m-d"),
      'id'          => $this->input->post('store_id'),
      'table'       => 'stores'
    );

    //Uppdaterar uppdaterad datumet
    $this->admin_model->update_data($update_data);

    //Sätter flash-meddelandet
    $this->session->set_flashdata('msg', 'Rabattkoden är nu tillagd');

    redirect('admin/add_coupon');
  }

  /*
  * Ändra kupongkod
  */
  public function edit_coupon($coupon_id)
  {
    $data['title'] = 'Ändra rabattkod';
    $data['rubrik'] = 'Ändra rabattkod';

    //Hämtar butiker som används till dropdowns
    $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

    //Hämtar kupong data som ska ändras
    $data['coupon_info'] = $this->admin_model->fetch_coupon_edit($coupon_id);

    $data['coupon_id'] = $coupon_id;

    $this->template->load('templates/admin_template', 'admin/edit_coupon', $data);
  }

  /*
  * Ändra kupongkod - Process
  */
  public function edit_coupon_process()
  {
    $data = array(
      'coupon_id'     =>  $this->input->post('coupon_id'),
      'code'          =>  $this->input->post('code'),
      'end_date'      =>  $this->input->post('end_date'),
      'title'         =>  $this->input->post('title'),
      'text'          =>  $this->input->post('text'),
      'active'        =>  $this->input->post('active'),
      'featured_home' =>  $this->input->post('featured_home')
    );

    //Uppdatera kupong-data
    $this->admin_model->update_coupon($data, $this->input->post('coupon_id'));

    //Sätter flash data
    $this->session->set_flashdata('msg', 'Rabattkoden är nu uppdaterad');

    redirect('admin/edit_coupon/' . $this->input->post('coupon_id'));
  }

}
