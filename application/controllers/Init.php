<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Init extends CI_Controller {

    public function index() {
        $tables = $this->db->list_tables();
        
        // Check if settings table exists and has data
        $has_settings = false;
        if (in_array('setting', $tables)) {
            $has_settings = ($this->db->count_all('setting') > 0);
        }

        // If we have tables AND settings, we're likely initialized
        if (count($tables) > 0 && $has_settings) {
            echo "Database sudah terinisialisasi. Menghapus file ini sangat disarankan untuk keamanan.";
            echo "<br><a href='".base_url('auth')."'>Pergi ke Halaman Login</a>";
            return;
        }

        echo "Sedang memproses database... Mohon tunggu.<br>";

        // 1. Run master.sql if tables are missing or if we need to ensure structure
        // Note: master.sql in this project doesn't have IF NOT EXISTS, so we only run it on empty DB
        if (count($tables) === 0) {
            echo "Mengimpor struktur database...<br>";
            $sql_file = FCPATH . 'assets/app/db/master.sql';
            if (!file_exists($sql_file)) {
                show_error("File SQL tidak ditemukan di: " . $sql_file);
                return;
            }

            $sql = file_get_contents($sql_file);
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
                    if ($result = $conn->store_result()) { $result->free(); }
                } while ($conn->next_result());
                echo "✅ Struktur database berhasil diimpor.<br>";
            } else {
                show_error("Gagal mengimpor SQL: " . $conn->error);
                $conn->close();
                return;
            }
            $conn->close();
        }

        // 2. Ensure default settings exist
        if ($this->db->table_exists('setting') && $this->db->count_all('setting') == 0) {
            echo "Menambahkan pengaturan default...<br>";
            $this->db->insert('setting', [
                'nama_aplikasi' => 'ScholaCBT',
                'versi' => '1.0',
                'db_versi' => '1.0',
                'satuan_pendidikan' => '1' // Default value
            ]);
        }

        // 3. Ensure default admin exists
        if ($this->db->table_exists('users') && $this->db->count_all('users') == 0) {
            echo "Membuat akun admin default...<br>";
            $password = password_hash('admin', PASSWORD_BCRYPT, ['cost' => 10]); // Default pass: admin
            $this->db->insert('users', [
                'ip_address' => '127.0.0.1',
                'username' => 'admin',
                'password' => $password,
                'email' => 'admin@admin.com',
                'active' => 1,
                'first_name' => 'Admin',
                'last_name' => 'Schola'
            ]);
            $user_id = $this->db->insert_id();
            
            // Assign to admin group (id 1)
            $this->db->insert('users_groups', [
                'user_id' => $user_id,
                'group_id' => 1
            ]);
            echo "✅ Akun admin dibuat (Username: <b>admin</b>, Password: <b>admin</b>).<br>";
        }

        echo "🚀 Inisialisasi Selesai!<br>";
        echo "<a href='".base_url('auth')."'>Klik di sini untuk Login</a>";
    }
}
