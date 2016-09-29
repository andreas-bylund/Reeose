<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API_adrecord_controller extends CI_Controller {

    public function fetch_stores()
    {

        $key = $_GET['key'];

        $secret_key = '70C75240DAE7C28ECEF082CDF866768E84429579D1F45227CDEFEEE70A0B2A12';

        if($key !== $secret_key)
        {
            echo 'you are not allowed here';
            exit();
        }

        $this->load->model('api_model');

        $url = "https://api.adrecord.com/v1/programs?apikey=DnpvKEeySqaImx8I";
        $response = file_get_contents($url);

        $data = json_decode($response);

        //Det gick inte att hämta datan av någon anledning
        if($data->status != 'OK')
        {
            $status = array(
                'message'       =>  'Gick inte att hämta Adrecord-datan av någon anledning',
                'message_from'  =>  '[Adrecord] - Fetch Stores',
                'date'          =>  $time = date("Y-m-d H:i:s"),
                'status'        =>  0
            );

            $this->api_model->add_status($status);

            //Stannar scriptet
            exit();
        }

        $rows = $data->result;

        $antal_butiker = 0;

        foreach ($rows as $row)
        {
            if($row->country == 'SE')
            {
                //Ladda ner loggan
                $img_url = "https://www.adrecord.com/img/logos/$row->id.gif";

                $img_src = $this->download_adrecord_logo($img_url);

                $data = array(
                    'a_id'      =>  $row->id,
                    'name'      =>  $row->name,
                    'url'       =>  $row->url,
                    'category'  =>  $this->adrecord_category_fix($row->category),
                    'logo_src'  =>  $img_src
                );

                //Lägger in i tabellen; adrecord_butiker
                $this->api_model->add_adrecord_raw_store($data);

                $antal_butiker = $antal_butiker + 1;
            }
        }

        //Uppdaterar status meddelandet
        $status = array(
            'message'       =>  'Hämtningen av alla butiker lyckades. ' .$antal_butiker. ' butiker lades in',
            'message_from'  =>  '[Adrecord] - Fetch Stores - klar',
            'date'          =>  date("Y-m-d H:i:s"),
            'status'        =>  1
        );

        $this->api_model->add_status($status);


    }

    private function download_adrecord_logo($url)
    {
        //http://stackoverflow.com/questions/10589704/php-gd-add-padding-to-image

		//Temp filnamn på filen som vi laddar ner
		$filename = md5(uniqid(rand(), true));

		//Var ska filen sparas?
		$dest_temp = "C:/wamp\www/reeo/img/logos/filename.jpg";

		//Ladda ner bilden
		$downloaded_image = copy($url, $dest_temp);

		//Orginal filnamn (Nuvarande Temp)
		$orig_filename = $dest_temp;

		//Nytt filnamn
		$new_filename = "C:/wamp/www/reeo/img/logos/$filename.jpg";

		list($orig_w, $orig_h) = getimagesize($orig_filename);

		$orig_img = imagecreatefromstring(file_get_contents($orig_filename));

		$output_w = 150;
		$output_h = 150;

		// determine scale based on the longest edge
		if ($orig_h > $orig_w) {
		    $scale = $output_h/$orig_h;
		} else {
		    $scale = $output_w/$orig_w;
		}

	    // calc new image dimensions
		$new_w =  $orig_w * $scale;
		$new_h =  $orig_h * $scale;

		// determine offset coords so that new image is centered
		$offest_x = ($output_w - $new_w) / 2;
		$offest_y = ($output_h - $new_h) / 2;

	    // create new image and fill with background colour
		$new_img = imagecreatetruecolor($output_w, $output_h);
		$bgcolor = imagecolorallocate($new_img, 255, 255, 255); // red
		imagefill($new_img, 0, 0, $bgcolor); // fill background colour

	    // copy and resize original image into center of new image
		imagecopyresampled($new_img, $orig_img, $offest_x, $offest_y, 0, 0, $new_w, $new_h, $orig_w, $orig_h);

		    //save it
		imagejpeg($new_img, $new_filename, 100);

		//Raderar bilden (temp)
		unlink($dest_temp);

        $return = "img/logos/$filename.jpg";

		return $return;

    }

    public function fetch_details()
    {
        $key = $_GET['key'];

        $secret_key = 'Vz3RVt7c3qThi1P1GlNxLIvWlTrfzlEA';

        if($key !== $secret_key)
        {
            echo 'you are not allowed here';
            exit();
        }


        $this->load->model('api_model');

        $result = $this->api_model->fetch_store_id();

        $nya_sidor = 0;

        foreach ($result as $row)
        {
            //Kontrollera om jag inte redan har butiken i databasen.
            //Förhindrar dubbla butiker.
            if(!$this->api_model->controll_if_site_exits($row->a_id, 'adrecord'))
            {
                $url = 'https://api.adrecord.com/v1/programs/'.$row->a_id.'?apikey=DnpvKEeySqaImx8I';
                $response = file_get_contents($url);

                $data = json_decode($response);

                //Det gick inte att hämta datan av någon anledning
                if($data->status != 'OK')
                {
                    $status = array(
                    'meddelande'    =>  '[Detaljer] Gick inte att hämta datan av någon anledning',
                    'natverk'       =>  'adrecord',
                    'date'          =>  date("Y-m-d H:i:s"),
                    'status'        =>  0
                    );

                    $this->api_model->add_status($status);

                    //Stannar scriptet
                    exit();
                }

                $rows = $data->result;

                $some_data = $this->api_model->fetch_some_data($row->a_id);

                $data = array(
                    'affiliate_id'      =>  $rows->id,
                    'online'            =>  1,
                    'rabattkoder'       =>  1,
                    'namn'              =>  $rows->name,
                    'inlaggd'           =>  date("Y-m-d"),
                    'uppdaterad'        =>  date("Y-m-d"),
                    'url'               =>  $rows->url,
                    'affiliate_natverk' =>  'adrecord',
                    'logo_src'          =>  $some_data->logo_src,
                    'kategori_id'       =>  1
                );

                $butik_id = $this->api_model->add_store($data);

                //Slug data
                $data_slug = array(
                    'butik_id'  =>  $butik_id,
                    'slug'      =>  $this->get_slug($rows->name),
                    'kategori'  =>  'rabattkod'
                );

                $this->api_model->add_slug($data_slug);


                $affiliate_link = array(
                    'butik_id'  =>  $butik_id,
                    'url'       =>  $some_data->url,
                    'epi'       =>  'rabattkod-hemmalank',
                    'type'      =>  'rabattkod'
                );

                $this->api_model->add_affiliate_routing($affiliate_link);

                $nya_sidor = $nya_sidor + 1;
            }
        }

        //Tömmer tabellen adrecord_butiker
        $this->api_model->empty_table('adrecord_butiker');

        $status = array(
            'meddelande'    =>  $nya_sidor . ' nya butiker laddades upp i tabellen "butiker" med status "3"',
            'natverk'       =>  'adrecord',
            'date'          =>  date("Y-m-d H:i:s"),
            'status'        =>  1
        );

        $this->api_model->add_status($status);
    }

    public function fetch_rabattkoder()
    {

        $key = $_GET['key'];

        $secret_key = 'F8A81E5271F629B35761FEA8F3BC286857C06001DB2E2E858A205BBAB8996EA2';

        if($key !== $secret_key)
        {
            echo 'you are not allowed here';
            exit();
        }

        $this->load->model('api_model');

        $xml = simplexml_load_file('https://www.adrecord.com/api/discountCodes.xml');

        $butiken_finns_inte = 0;

        $rabattkoden_fanns_redan = 0;

        $rabattkod_added = 0;

        foreach($xml->discountcode as $discountcode)
        {
            $rabattkod['id']            = $discountcode->id;
            $rabattkod['program']       = $discountcode->program;
            $rabattkod['programID']     = $discountcode->programID;
            $rabattkod['description']   = $discountcode->description;
            $rabattkod['code']          = $discountcode->code;
            $rabattkod['from']          = $discountcode->from;
            $rabattkod['to']            = $discountcode->to;
            $rabattkod['logo']          = $discountcode->logo;
            $rabattkod['url']           = $discountcode->url;
            $rabattkod['trackUrl']      = $discountcode->trackUrl;

            //Kontrollerar rabattkoden
            if(!$this->api_model->check_rabattkod($discountcode->id, $discountcode->code))
            {
                //Kontrollerar om butiken finns
                if($this->api_model->store_exists($discountcode->programID))
                {
                    //Kontrollerar om rabattkoden finns i tabellen (Rabattkoder)
                    if(!$this->api_model->rabattkod_exists($discountcode->id))
                    {
                        //Kontrollerar om rabattkoden redan väntar på godkännande
                        if(!$this->api_model->rabattkod_exists_api($discountcode->id))
                        {
                            if($discountcode->to)
                            {
                                $slutdatum = $discountcode->to;
                            }
                            else
                            {
                                $slutdatum = '0000-00-00';
                            }

                            $rabattkod_data = array(
                                'affiliate_id'          =>  $discountcode->id,
                                'affiliate_butik_id'    =>  $discountcode->programID,
                                'rabattkod'             =>  $discountcode->code,
                                'type'                  =>  'rabattkoder',
                                'slutdatum'             =>  $slutdatum
                            );

                            $this->api_model->add_rabattkod($rabattkod_data);

                            $rabattkod_added = $rabattkod_added + 1;
                        }
                    }
                }
                else
                {
                    $butiken_finns_inte = $butiken_finns_inte + 1;
                }
            }
            else
            {
                $rabattkoden_fanns_redan = $rabattkoden_fanns_redan + 1;
            }
        }


        //Logga det hela
        if($rabattkod_added > 0)
        {
            $status = array(
                'meddelande'    =>  $rabattkod_added . ' nya rabattkod(er) väntar på att godkännas',
                'natverk'       =>  'adrecord',
                'date'          =>  date("Y-m-d H:i:s"),
                'status'        =>  1
            );

            $this->api_model->add_status($status);
        }

        if($butiken_finns_inte > 0)
        {
            $status = array(
                'meddelande'    =>  $butiken_finns_inte . ' rabattkoder kan läggas till. Men saknar online butik',
                'natverk'       =>  'adrecord',
                'date'          =>  date("Y-m-d H:i:s"),
                'status'        =>  1
            );

            $this->api_model->add_status($status);
        }

        $status = array(
            'meddelande'    =>  'Kontroll av rabattkoder [Adrecord] genomförd.',
            'natverk'       =>  'adrecord',
            'date'          =>  date("Y-m-d H:i:s"),
            'status'        =>  1
        );

        $this->api_model->add_status($status);
    }

    private function get_slug($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
        return 'n-a';
        }

        return $text;
    }


    public function adrecord_category_fix($category)
    {
        switch ($category) {
            case "kids":
                return "Barn";
                break;
            case "Blogging & social media":
                return "Blogging och social media";
                break;
            case "Books":
                return "Böcker";
                break;
            case "Animals":
                return "Djur";
                break;
            case "Economy":
                return "Ekonomi";
                break;
            case "Electronics & computers":
                return "Elektronik och datorer";
                break;
            case "Photography & media":
                return "Foto och bild";
                break;
            case "Home, interior & garden":
                return "Hem, inredning och trädgård";
                break;
            case "Internet department stores":
                return "Internetvaruhus";
                break;
            case "Clothes & accessories":
                return "Kläder och accessoarer";
                break;
            case "Office & business":
                return "Kontor och företagande";
                break;
            case "Mobile":
                return "Mobil";
                break;
            case "Motor":
                return "Motor";
                break;
            case "Gifts & experiences":
                return "Presenter och upplevelser";
                break;
            case "Travel":
                return "Resor";
                break;
            case "Beauty & health":
                return "Skönhet och hälsa";
                break;
            case "Sports & leisure":
                return "Sport och fritid";
                break;
            case "Security & safety":
                return "Säkerhet och trygghet";
                break;
            case "Magazines":
                return "Tidningar";
                break;
            case "Services":
                return "Tjänster";
                break;
            case "Adult stores":
                return "Vuxenbutiker";
                break;
            case "Webhotel & hosting":
                return "Webbhotell och hosting";
                break;
            case "Insurances":
                return "Försäkringar";
                break;
            default:
                echo "Övrigt";
        }
    }

}
