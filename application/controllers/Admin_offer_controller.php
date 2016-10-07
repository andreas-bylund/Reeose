<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_offer_controller extends CI_Controller {

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
  * Överblick på alla Erbjudanden
  */
  public function offer_overview()
  {
    $data['title'] = 'Admin';
    $data['rubrik'] = 'Erbjudanden - Överblick';

    //Hämta alla erbjudanden
    $data['all_offers'] = $this->admin_model->overview_fetch_offers();

    $this->template->load('templates/admin_template', 'admin/offers_overview', $data);
  }

  /*
  * Ändra ett erbjudande
  */
  public function edit_offer($offer_id)
  {
    $data['title'] = 'Ändra Erbjudanden';
    $data['rubrik'] = 'Ändra erbjudanden';

    //Hämtar butiker som används till dropdowns
    $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

    //Hämta erbjudande information som ska ändras
    $data['offer_info'] = $this->admin_model->fetch_offer_edit($offer_id);

    $data['offer_id'] = $offer_id;

    $this->template->load('templates/admin_template', 'admin/edit_offer', $data);
  }

  /*
  * Ändra ett erbjudande - Process
  */
  public function edit_offer_process()
  {

    $update_data = array(
      'active'    =>  $this->input->post('active'),
      'store_id'  =>  $this->input->post('store_id'),
      'featured'  =>  $this->input->post('featured'),
      'title'     =>  $this->input->post('title'),
      'end_date'  =>  $this->input->post('end_date'),
      'text'      =>  $this->input->post('text')
    );

    //Uppdatera erbjudandet
    $this->admin_model->update_offer($update_data, $this->input->post('offer_id'));

    //Target url
    $target_url_data = array(
      'target_url' => $this->input->post('target_url')
    );

    //Uppdaterar target_url
    $this->admin_model->update_link_routing($target_url_data, $this->input->post('link_routing_id'));

    //Set flash-meddelande
    $this->session->set_flashdata('msg', 'Erbjudandet är nu uppdaterad');

    redirect('admin/edit_offer/' . $this->input->post('offer_id'));
  }

  /*
  * Lägg till nytt erbjudande
  */
  public function add_offer()
  {
    $data['title'] = 'Nytt erbjudanden';
    $data['rubrik'] = 'Lägg till nytt erbjudande';

    //Hämtar butiker som används till dropdowns
    $data['stores'] = $this->admin_model->dropdown_fetch_all_stores();

    $this->template->load('templates/admin_template', 'admin/add_offer', $data);
  }
  /*
  * Lägg till nytt erbjudande - Process
  */
  public function add_offer_process()
  {
    $today = date("Y-m-d");

    $link_routing_data = array(
      'target_url'  =>  $this->input->post('target_url'),
      'type'        =>  'offer',
      'store_id'    =>  $this->input->post('store_id')
    );

    //Lägger till link_routing
    $link_routing_id = $this->admin_model->add_data($link_routing_data, 'link_routing');

    $offer_data = array(
      'store_id'  =>  $this->input->post('store_id'),
      'title'     =>  $this->input->post('title'),
      'end_date'  =>  $this->input->post('end_date'),
      'text'      =>  $this->input->post('text')
    );

    $offers_id = $this->admin_model->add_data($offer_data, 'offers');

    //Uppdatera offers med link_routing_id
    $update_data = array(
      'link_routing_id'   =>  $link_routing_id
    );

    //Uppdaterar till aktuell link_routing
    $this->admin_model->update_link_routing_offer($update_data, $offers_id);

    //Uppdatera epi
    $update_epi = array(
      'epi'   =>  $offers_id .'-[offer]'
    );

    //Uppdaterar link_routing EPI
    $this->admin_model->update_link_routing_epi($update_epi, $link_routing_id);

    //Sätter flash-meddelande
    $this->session->set_flashdata('msg', 'Erbjudandet är nu tillagd');

    redirect('admin/add_offer');
  }

}
