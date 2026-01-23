<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Init extends CI_Controller {

    public function index() {
        // Only allow if database is empty
        if (count($this->db->list_tables()) > 0) {
            echo "Database sudah terinisialisasi. Menghapus file ini sangat disarankan untuk keamanan.";
            return;
        }

        $sql_file = FCPATH . 'assets/app/db/master.sql';
        
        if (!file_exists($sql_file)) {
            show_error("File SQL tidak ditemukan di: " . $sql_file);
            return;
        }

        echo "Sedang menginisialisasi database... Mohon tunggu.<br>";
        
        // Load the SQL file
        $sql = file_get_contents($sql_file);
        
        // CodeIgniter 3 doesn't have a built-in multiple query runner that handles large imports well
        // We'll use a standard PDO or mysqli approach for efficiency
        $db_hostname = $this->db->hostname;
        $db_username = $this->db->username;
        $db_password = $this->db->password;
        $db_name     = $this->db->database;

        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_name);

        if ($conn->connect_error) {
            show_error("Koneksi gagal: " . $conn->connect_error);
            return;
        }

        if ($conn->multi_query($sql)) {
            do {
                // Keep consuming results
                if ($result = $conn->store_result()) {
                    $result->free();
                }
            } while ($conn->next_result());
            
            echo "✅ Database berhasil diinisialisasi!<br>";
            echo "<a href='".base_url('auth')."'>Klik di sini untuk Login</a>";
        } else {
            show_error("Gagal mengimpor SQL: " . $conn->error);
        }

        $conn->close();
    }
}
