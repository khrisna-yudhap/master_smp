<?php
class M_karya extends CI_Model
{

    function get_all_karya()
    {
        $sql = "
            SELECT tbl_karya.*,DATE_FORMAT(karya_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_karya ORDER BY karya_id DESC
        ";

        $q = $this->db->query($sql);
        return $q->result_array();
    }

    function simpan_karya($judul_karya, $isi_karya, $nama_penulis, $jenis_karya)
    {
        $sql = "INSERT INTO tbl_karya (karya_judul, karya_isi, karya_penulis,  karya_jenis) VALUES (?, ?, ?, ?)";
        $this->db->query($sql, array($judul_karya, $isi_karya, $nama_penulis, $jenis_karya));

        return $this->db->insert_id();
    }

    function getKaryaById($id)
    {
        $sql = "SELECT * FROM tbl_karya WHERE karya_id = $id";

        $q = $this->db->query($sql);
        return $q->row_array();
    }

    function update_karya($karya_id, $judul_karya, $isi_karya, $nama_penulis, $jenis_karya)
    {
        $sql = "UPDATE tbl_karya SET karya_judul ='$judul_karya', karya_isi='$isi_karya', karya_penulis='$nama_penulis', karya_jenis='$jenis_karya' WHERE karya_id ='$karya_id'";

        $q = $this->db->query($sql);
        return $q;
    }

    function hapus_karya($id)
    {
        $sql = "DELETE FROM tbl_karya WHERE karya_id = ?";
        return $this->db->query($sql, array($id));
    }

    //Comment Control

    function get_all_comment()
    {
        $sql = "SELECT * FROM `tbl_karya_comment` ORDER BY comment_active ASC, comment_tanggal DESC";

        $q = $this->db->query($sql);
        return $q->result_array();
    }

    //Front-End

    function berita_perpage($offset, $limit)
    {
        $hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC limit $offset,$limit");
        return $hsl;
    }
    function get_berita_by_kode($kode)
    {
        $hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
        return $hsl;
    }

    function cari_berita($keyword)
    {
        $hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_judul LIKE '%$keyword%' LIMIT 5");
        return $hsl;
    }
}
