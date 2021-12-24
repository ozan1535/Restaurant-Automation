<?php


class Restoran extends CI_Controller {

    public function index() {
        $this->load->view("anasayfa.php");
    }

    public function yenisiparis() {
        $this->load->view("siparisal.php");
    }

    public function masaekle() {
        $this->load->view("yenimasaekle.php");
    }

    public function eklendi() {
        $this->load->view("eklendi.php");
    }

    public function masaduzenle() {
        $this->load->view("masaduzenle.php");
    }

    public function masaduzenlendi() {
        $this->load->view("masaduzenlendi.php");
    }

    public function masasil() {
        $this->load->view("masasil.php");
    }

    public function menuekle() {
        $this->load->view("yenimenuekle.php");
    }

    public function menueklendi() {
        $this->load->view("menueklendi.php");
    }

    public function menuduzenle() {
        $this->load->view("menuduzenle.php");
    }

    public function menuduzenlendi() {
        $this->load->view("menuduzenlendi.php");
    }

    public function menusil() {
        $this->load->view("menusil.php");        
    }

    public function siparisekrani() {
        $this->load->view("siparisekrani.php");
    }

    public function siparisalindi() {
        $this->load->view("siparisalindi.php");
    }

    public function acikmasalar() {
        $this->load->view("acikmasalar.php");
    }

    public function acikmasagoster() {
        $this->load->view("acikmasagoster.php");
    }

    public function siparisguncelle() {
        $this->load->view("siparisguncelle.php");
    }

    public function siparisguncellendi() {
        $this->load->view("siparisguncellendi.php");
    }

    public function hesapodendi() {
        $this->load->view("hesapodendi.php");
    }

    public function istatistikler() {
        $this->load->view("istatistikler.php");
    }

    public function veritabani() {
        $this->load->view("veritabani.php");
    }

    public function hesapmakinesi() {
        $this->load->view("hesapmakinesi.php");
    }

}

?>