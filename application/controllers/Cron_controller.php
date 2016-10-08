<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_controller extends CI_Controller {

    public function backup_database()
    {

      $key = $_GET['key'];

      $secret_key = '70C75240DAE7ASDJLKASD98234SLK1F45227CDEFEEE70A0B2A12';

      if($key !== $secret_key)
      {
          echo 'you are not allowed here';
          exit();
      }

      // Load the DB utility class
      $this->load->dbutil();

      $filename = date('Y-m-d') . '-backup.txt';

      $prefs = array(
        'format'        => 'txt',         // gzip, zip, txt
        'filename'      => $filename,     // File name - NEEDED ONLY WITH ZIP FILES
        'add_drop'      => TRUE,          //Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,          // Whether to add INSERT data to backup file
        'newline'       => "\n"           // Newline character used in backup file
      );

      $this->dbutil->backup($prefs);

      // Backup your entire database and assign it to a variable
      $backup =& $this->dbutil->backup($prefs);

      // Load the file helper and write the file to your server
      $this->load->helper('file');
      write_file('db-backups/' . $filename, $backup);

      // Load the download helper and send the file to your desktop
      $this->load->helper('download');
      force_download($filename, $backup);

    }
}
