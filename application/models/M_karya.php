<?php
class M_karya extends CI_Model
{

    function get_all_karya()
    {
        $sql = "SELECT tbl_karya.*,DATE_FORMAT(karya_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_karya ORDER BY karya_id DESC";

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
        $sql = "SELECT tbl_karya.*, DATE_FORMAT(karya_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_karya WHERE karya_id = $id";

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
        $sql = "SELECT comment_id, comment, commentator, comment_tanggal, comment_active, tbl_karya_comment.karya_id, karya_judul 
        FROM `tbl_karya_comment` 
        LEFT JOIN tbl_karya ON tbl_karya_comment.karya_id = tbl_karya.karya_id
        ORDER BY comment_active ASC, comment_tanggal DESC";

        $q = $this->db->query($sql);
        return $q->result_array();
    }

    function add_comment($comment, $commentator,   $comment_active, $karya_id)
    {
        $sql = "INSERT INTO tbl_karya_comment (comment, commentator,  comment_active,  karya_id) VALUES (?,  ?, ?, ?)";
        $this->db->query($sql, array($comment, $commentator, $comment_active, $karya_id));

        return $this->db->insert_id();
    }

    function update_comment($comment_id, $comment_active)
    {
        $sql = "UPDATE tbl_karya_comment SET comment_active = '$comment_active' WHERE comment_id = '$comment_id'";

        $q = $this->db->query($sql);
        return $q;
    }

    function delete_comment($comment_id)
    {
        $sql = "DELETE FROM tbl_karya_comment WHERE comment_id = '$comment_id'";

        $q = $this->db->query($sql);
        return $q;
    }

    //Front-End

    function karya()
    {
        $hsl = $this->db->query("SELECT tbl_karya.*,DATE_FORMAT(karya_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_karya ORDER BY karya_id DESC");
        return $hsl;
    }
    function karya_perpage($offset, $limit)
    {
        $hsl = $this->db->query("SELECT tbl_karya.*,DATE_FORMAT(karya_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_karya ORDER BY karya_id DESC limit $offset,$limit");
        return $hsl;
    }
    function countComment($karyaId)
    {
        $hsl = $this->db->query("SELECT COUNT(*) AS jumlah FROM tbl_karya_comment WHERE karya_id = '$karyaId' AND comment_active = 1");
        return $hsl;
    }

    function getCommentById($karyaId)
    {
        $sql = "SELECT tbl_karya_comment.*,DATE_FORMAT(comment_tanggal,'%d/%m/%Y') AS tgl_comment FROM `tbl_karya_comment` WHERE karya_id = '$karyaId' AND comment_active = 1";
        $q = $this->db->query($sql);
        return $q->result_array();
    }

    function addLike($karyaid, $react)
    {
        $sql = "UPDATE tbl_karya SET karya_reaction = karya_reaction+1  WHERE karya_id = '$karyaid'";
        $q = $this->db->query($sql);
    }

    function unLike($karyaid, $react)
    {
        $sql = "UPDATE tbl_karya SET karya_reaction = karya_reaction-1  WHERE karya_id = '$karyaid'";
        $q = $this->db->query($sql);
    }

    function getPopularKarya()
    {
        $sql = "SELECT * FROM tbl_karya ORDER BY karya_reaction DESC LIMIT 1";
        $q = $this->db->query($sql);
        return $q->result_array();
    }
}
