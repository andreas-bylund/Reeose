<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model  {

    /*
    *   Skippar butiken [API-Adrecord]
    */
    public function skip_store($butik_id)
    {
      $this->db->set('status', 0);
      $this->db->where('id',  $butik_id);
      $this->db->update('api_adrecord_stores_dump');
    }

    /*
    *   Hold butiken [API-Adrecord]
    */
    public function hold_store($butik_id)
    {
      $this->db->set('status', 2);
      $this->db->where('id',  $butik_id);
      $this->db->update('api_adrecord_stores_dump');
    }

    /*
    *   Delete - butiken [API-Adrecord]
    */
    public function delete_api_store($store_id)
    {
      $this->db->where('id',  $store_id);
      $this->db->delete('api_adrecord_stores_dump');
    }

    /*
    * Hämta antal klick som har gjords baserad på $week
    */
    public function num_clicks_week($week)
    {
      $this->db->where('week', $week);
      $query = $this->db->get('clicks');

      return $query->num_rows();
    }

    /*
    * Hämta antal klick som har gjords baserad på $date
    */
    public function num_clicks_today($today)
    {
      $this->db->where('time >=', $today);
      $query = $this->db->get('clicks');

      return $query->num_rows();
    }

    /**
    * Lägger till butik
    * Admin_offer_controller/add_offer_process
    * Admin_sale_controller/add_sale_page_process
    * Admin_sale_controller/add_sale_campaign_process
    */
    public function add_data($data, $tabel)
    {
      $this->db->insert($tabel, $data);

      $id = $this->db->insert_id();

      //Return, varumärke ID
      return $id;
    }

    /**
    * Lägger till kategori
    */
    public function add_kategori($data)
    {
      $this->db->insert('kategorier', $data);
    }

    /**
    * Lägger till REA-sida
    */
    public function add_rea_page($data)
    {
      $this->db->insert('rea_sidor', $data);

      $page_id = $this->db->insert_id();

      //Return, varumärke ID
      return $page_id;
    }

    /**
    * Lägger till slugs
    */
    public function add_slug($data)
    {
      $this->db->insert('slugs', $data);
    }

    /**
    * Lägger till Affiliate länk
    */
    public function add_affiliate_routing($data)
    {
      $this->db->insert('link_routing', $data);
    }

    /*
    * Hämtar url baserad på ID
    */
    public function fetch_store_url($id)
    {
      $this->db->where('id =', $id);
      $this->db->select('url');
      $this->db->from('stores');

      $query = $this->db->get();

      return $query->row();
    }

    /**
    * Lägger till erbjudande
    */
    public function add_erbjudande($data)
    {
      $this->db->insert('erbjudanden', $data);

      $id = $this->db->insert_id();

      return $id;
    }

    /**
    * Lägger till REA-kampanj
    */
    public function add_rea_kampanj($data)
    {
      $this->db->insert('rea_kampanjer', $data);

      $page_id = $this->db->insert_id();

      //Return, varumärke ID
      return $page_id;
    }

    /**
    * Hämtar alla butiker till dropdowns
    * Admin_offer_controller/edit_offer
    * Admin_offer_controller/add_offer
    * Admin_sale_controller/add_sale_campaign
    * Admin_sale_controller/edit_sale_page
    */
    public function dropdown_fetch_all_stores()
    {
      $this->db->where('online =', 1);
      $this->db->order_by('name', 'asc');

      return $this->db->get('stores');
    }

    /**
    * Hämtar alla rabattkoder - With slug´s
    */
    public function overview_fetch_coupons()
    {
      $this->db->select('
        coupons.coupon_id,
        coupons.active,
        coupons.title,
        coupons.text,
        coupons.store_id,
        coupons.code,
        coupons.end_date,
        coupons.featured_home,
        stores.name
      ');
      $this->db->from('coupons');
      $this->db->join('stores', 'stores.id = coupons.store_id');

      $query = $this->db->get();

      return $query->result();
    }

    /**
    * Hämtar alla "REA" - With slug´s
    * Admin_sale_controller/sale_overview
    */
    public function overview_fetch_sale()
    {
      $this->db->select('
        sale_campaigns.sale_campaign_id,
        sale_campaigns.active,
        sale_campaigns.show_coupon_detail,
        sale_campaigns.sale_page_id,
        sale_campaigns.link_routing_id,
        sale_campaigns.title,
        sale_campaigns.text,
        sale_campaigns.end_date,
        sale_campaigns.num_products,
        sale_pages.nisch,
        stores.name,
        sale_categories.subcategory_id
      ');

      $this->db->from('sale_campaigns');
      $this->db->join('sale_pages', 'sale_pages.sale_id = sale_campaigns.sale_page_id');
      $this->db->join('stores', 'stores.id = sale_campaigns.store_id');
      $this->db->join('sale_categories', 'sale_campaigns.sale_page_id = sale_categories.page_id');

      $query = $this->db->get();

      return $query->result();
    }

    /**
    * Hämtar alla erbjudanden
    * Används av: Admin_offer_controller/offer_overview
    */
    public function overview_fetch_offers()
    {
      $this->db->select('
        offers.offer_id,
        offers.active,
        offers.show_coupon_detail,
        offers.title,
        offers.text,
        offers.store_id,
        offers.end_date,
        offers.featured,
        offers.link_routing_id,
        stores.name
      ');
      $this->db->from('offers');
      $this->db->join('stores', 'stores.id = offers.store_id');

      $query = $this->db->get();

      return $query->result();
    }

    /**
    * Hämtar alla butiker - With slug´s
    */
    public function overview_fetch_stores()
    {
      $this->db->select('
        stores.id,
        stores.name,
        stores.url,
        stores.online,
        stores.coupons,
        stores.store_logo,
        stores.updated,
        stores.featured,
        header_data.title,
        header_data.meta_description,
        header_data.meta_tags,
        slugs.slug
      ');

      $this->db->from('stores');
      $this->db->join('slugs', 'stores.id = slugs.store_id');
      $this->db->where('slugs.slug_category =', 'rabattkod');
      $this->db->join('content', 'content.content_id = stores.content_id');
      $this->db->join('header_data', 'header_data.header_data_id = stores.header_id');

      $query = $this->db->get();

      return $query->result();
    }

    /**
    * Hämtar alla butiker som måste uppdateras - With slug´s
    */
    public function fetch_store_that_need_update($date)
    {
      $this->db->select('
        butiker.id,
        butiker.url,
        butiker.uppdaterad,
        butiker.namn,
        butiker.rabattkoder,
        butiker.online
      ');

      $this->db->join('slugs', 'butiker.id = slugs.butik_id');
      $this->db->where('butiker.uppdaterad <=', $date);

      $query = $this->db->get('butiker');

      return $query->result();
    }

    /*
    * Hämtar alla REA-sidor
    * Admin_sale_controller/edit_sale_page
    * Admin_sale_controller/add_sale_campaign
    */
    public function dropdown_fetch_all_sale_pages()
    {
      $this->db->select('
        sale_pages.sale_id,
        sale_pages.nisch,
        slugs.slug_id
      ');

      $this->db->from('sale_pages');
      $this->db->where('slug_category', 'rea');
      $this->db->join('slugs', 'sale_pages.sale_id = slugs.store_id');

      return $this->db->get();
    }

    /**
    * Hämtar alla kategorier
    * Admin_sale_controller/add_sale_page
    */
    public function fetch_all_categories()
    {
      return $this->db->get('all_categories');
    }

    /**
    * Hämtar alla sale_campaigs
    */
    public function fetch_all_sale_campaings()
    {
      return $this->db->get('sale_campaigns');
    }

    /*
    * Hämtar alla subkategorier
    * Admin_sale_controller/add_sale_page
    */
    public function fetch_all_subcategories()
    {
      return $this->db->get('all_subcategories');
    }

    /**
    * Uppdatera "Uppdaterad" - För rabattkoder
    */
    public function update_data($data)
    {
      $this->db->set('updated', $data['todays_date']);
      $this->db->where('id',  $data['id']);
      $this->db->update($data['table']);
    }

    /**
    * Uppdatera "Uppdaterad" - För REA-sida
    */
    public function update_uppdatera_rea_sida($page_id, $today)
    {
      $this->db->set('uppdaterad', $today);
      $this->db->where('id',  $page_id);
      $this->db->update('rea_sidor');
    }

    /**
    * Hämtar produktinformation som ska Ändras
    * Används för reeo.se/admin/edit/:num
    */
    public function fetch_store_edit($id)
    {
      $this->db->select('*');
      $this->db->from('stores');
      $this->db->where('stores.id', $id);
      $this->db->join('slugs', 'stores.id = slugs.store_id');
      $this->db->join('store_categories', 'stores.id = store_categories.store_id');
      $this->db->join('header_data', 'stores.header_id = header_data.header_data_id');
      $this->db->join('content', 'content.content_id = stores.content_id');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->row();
      }
      else
      {
        return FALSE;
      }
    }

    /**
    * Hämtar rabattkodinformation som ska Ändras
    * Används för reeo.se/admin/edit/:num
    */
    public function fetch_coupon_edit($coupon_id)
    {
      $this->db->select('
        coupons.coupon_id,
        coupons.active,
        coupons.store_id,
        coupons.code,
        coupons.end_date,
        coupons.title,
        coupons.text,
        coupons.featured_home,
        stores.name
      ');
      $this->db->from('coupons');
      $this->db->where('coupons.coupon_id', $coupon_id);
      $this->db->join('slugs', 'coupons.store_id = slugs.store_id');
      $this->db->join('stores', 'coupons.store_id = stores.id');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->row();
      }
      else
      {
        return FALSE;
      }
    }

    /*
    * Hämta erbjudande information för edit
    * Admin_offer_controller/edit_offer
    */
    public function fetch_offer_edit($offer_id)
    {
      $this->db->select('
        offers.offer_id,
        offers.store_id,
        offers.title,
        offers.end_date,
        offers.text,
        offers.featured,
        offers.active,
        link_routing.target_url,
        link_routing.link_routing_id,
        stores.name
      ');
      $this->db->from('offers');
      $this->db->where('offers.offer_id', $offer_id);
      $this->db->join('link_routing', 'link_routing.link_routing_id = offers.link_routing_id');
      $this->db->join('stores', 'offers.store_id = stores.id');

      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->row();
      }
      else
      {
        return FALSE;
      }
    }

    /*
    * Hämta REA-sida information som ska ändras
    * Admin_sale_controller/edit_sale_page
    */
    public function fetch_sale_edit($sale_campaign_id)
    {
      $this->db->select('
        sale_campaigns.sale_campaign_id,
        sale_campaigns.active,
        sale_campaigns.show_coupon_detail,
        sale_campaigns.store_id,
        sale_campaigns.sale_page_id,
        sale_campaigns.title,
        sale_campaigns.link_routing_id,
        sale_campaigns.end_date,
        sale_campaigns.text,
        sale_campaigns.num_products,
        stores.name,
        sale_pages.nisch,
        link_routing.target_url,
        sale_page_content.bottom_text,
        sale_page_content.sale_content_id
      ');

      $this->db->from('sale_campaigns');
      $this->db->where('sale_campaigns.sale_campaign_id', $sale_campaign_id);
      $this->db->join('stores', 'stores.id = sale_campaigns.store_id');
      $this->db->join('sale_pages', 'sale_campaigns.sale_page_id = sale_pages.sale_id');
      $this->db->join('link_routing', 'sale_campaigns.link_routing_id = link_routing.link_routing_id');
      $this->db->join('sale_page_content', 'sale_pages.content_id = sale_page_content.sale_content_id');


      $query = $this->db->get();

      if ($query->num_rows() > 0)
      {
        return $query->row();
      }
      else
      {
        return FALSE;
      }
    }

    /*
        Hämta API loggar
    */
    public function fetch_api_logs()
    {
      $this->db->select('*');
      $this->db->order_by('api_logs_id', 'desc');

      $query = $this->db->get('api_logs');

      return $query->result();
    }

    /*
        Hämta API loggar
    */
    public function fetch_api_salelogs()
    {
      $this->db->select('*');
      $this->db->order_by('autosale_id', 'desc');

      $query = $this->db->get('api_logs_autosale');

      return $query->result();
    }

    /**
    * Uppdatera butik
    */
    public function update_butik($data, $id)
    {
      $this->db->where('id', $id);
      $this->db->update('butiker', $data);
    }

    /**
    * Uppdatera link_routing - Coupons
    */
    public function update_link_routing_coupon($data, $id)
    {
      $this->db->where('coupon_id', $id);
      $this->db->update('Coupons', $data);
    }

    /**
    * Uppdatera Content - Sale
    */
    public function update_sale_content($data, $id)
    {
      $this->db->where('sale_content_id', $id);
      $this->db->update('sale_page_content', $data);
    }

    /**
    * Uppdatera link_routing
    * Admin_offer_controller/add_offer_process
    */
    public function update_link_routing_offer($data, $id)
    {
      $this->db->where('offer_id', $id);
      $this->db->update('offers', $data);
    }

    /**
    * Uppdatera link_routing - Campaigns
    * Admin_sale_controller/add_sale_campaign_process
    */
    public function update_link_routing_campaign($data, $id)
    {
      $this->db->where('sale_campaign_id', $id);
      $this->db->update('sale_campaigns', $data);
    }

    /**
    * Uppdatera link_routing - Store
    */
    public function update_link_routing_store($data, $id)
    {
      $this->db->where('link_routing_id', $id);
      $this->db->update('link_routing', $data);
    }

    /**
    * Uppdatera link_routing - EPI
    * Admin_offer_controller/add_offer_process
    * Admin_sale_controller/add_sale_campaign_process
    */
    public function update_link_routing_epi($data, $id)
    {
      $this->db->where('link_routing_id', $id);
      $this->db->update('link_routing', $data);
    }

    /**
    * Uppdatera rabattkod
    */
    public function update_coupon($data, $id)
    {
      $this->db->where('coupon_id', $id);
      $this->db->update('coupons', $data);
    }

    /**
    * Uppdatera sale
    * Admin_sale_controller/edit_sale_page_process
    */
    public function update_sale($data, $id)
    {
      $this->db->where('sale_campaign_id', $id);
      $this->db->update('sale_campaigns', $data);
    }

    /**
    * Uppdatera erbjudande
    * Admin_offer_controller/edit_offer_process
    */
    public function update_offer($data, $offer_id)
    {
      $this->db->where('offer_id', $offer_id);
      $this->db->update('offers', $data);
    }

    /**
    * Uppdatera link_routing
    * Admin_offer_controller/edit_offer_process
    * Admin_sale_controller/edit_sale_page_process
    */
    public function update_link_routing($data, $link_routing_id)
    {
      $this->db->where('link_routing_id', $link_routing_id);
      $this->db->update('link_routing', $data);
    }

    /**
    * Hämtar alla butiker med online = 3 [API]
    */
    public function fetch_api_adrecord_stores()
    {
        $this->db->select('*');
        $this->db->where('status =', 1);
        $this->db->limit(1);

        $query = $this->db->get('api_adrecord_stores_dump');

        return $query->row();
    }

    public function fetch_adrecord_store($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);

        $query = $this->db->get('api_adrecord_stores_dump');

        return $query->row();
    }

    public function update_edit_content($data, $content_id)
    {
        $this->db->where('content_id',  $content_id);
        $this->db->update('content', $data);
    }

    public function update_edit_header($data, $header_data_id)
    {
        $this->db->where('header_data_id',  $header_data_id);
        $this->db->update('header_data', $data);
    }

    public function update_edit_stores($data, $store_id)
    {
        $this->db->where('id',  $store_id);
        $this->db->update('stores', $data);
    }

    public function update_edit_categories($data, $store_id)
    {
        $this->db->where('store_id',  $store_id);
        $this->db->update('store_categories', $data);
    }

    public function update_edit_slugs($data, $store_id)
    {
        $this->db->where('store_id',  $store_id);
        $this->db->update('slugs', $data);
    }

    public function update_edit_linkrouting($data, $link_routing_id)
    {
        $this->db->where('link_routing_id',  $link_routing_id);
        $this->db->update('link_routing', $data);
    }
}
