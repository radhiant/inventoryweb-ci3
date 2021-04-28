<?php
class barangMasuk_model extends ci_model{


    function data()
    {
        $this->db->order_by('id_barang_masuk','DESC');
        return $query = $this->db->get('barang_masuk');
    }

    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('barang_masuk as bm');
      $this->db->join('barang as b', 'b.id_barang = bm.id_barang');
      $this->db->join('supplier as s', 's.id_supplier = bm.id_supplier');

      $this->db->order_by('bm.id_barang_masuk','DESC');
      return $query = $this->db->get();
    }

    public function dataJoinLike($tahun)
    {
      $this->db->select('*');
      $this->db->from('barang_masuk as bm');
      $this->db->join('barang as b', 'b.id_barang = bm.id_barang');
      $this->db->join('supplier as s', 's.id_supplier = bm.id_supplier');
      
      $this->db->like('bm.tgl_masuk', $tahun);
      $this->db->order_by('bm.id_barang_masuk','DESC');
      return $query = $this->db->get();
    }

    public function transaksiTerakhir()
    {
      $this->db->select('*');
      $this->db->from('barang_masuk as bm');
      $this->db->join('barang as b', 'b.id_barang = bm.id_barang');
      $this->db->join('supplier as s', 's.id_supplier = bm.id_supplier');

      $this->db->order_by('bm.id_barang_masuk','DESC');
      $this->db->limit(5);
      return $query = $this->db->get();
    }

    function lapdata($tglAwal, $tglAkhir)
    {
      $this->db->select('*');
      $this->db->from('barang_masuk as bm');
      $this->db->join('barang as b', 'b.id_barang = bm.id_barang');
      $this->db->join('supplier as s', 's.id_supplier = bm.id_supplier');

      $this->db->where('bm.tgl_masuk >=', $tglAwal);
      $this->db->where('bm.tgl_masuk <=', $tglAkhir);
      return $query = $this->db->get();
    }

    function jmlperbulan($tglAwal, $tglAkhir)
    {
      $this->db->select('*');
      $this->db->from('barang_masuk as bm');
      $this->db->join('barang as b', 'b.id_barang = bm.id_barang');
      $this->db->join('supplier as s', 's.id_supplier = bm.id_supplier');

      $this->db->where('bm.tgl_masuk >=', $tglAwal);
      $this->db->where('bm.tgl_masuk <=', $tglAkhir);
      return $query = $this->db->get();
    }


    public function detailJoin($where)
    {
      $this->db->select('*');
      $this->db->from('barang_masuk as bm');
      $this->db->join('barang as b', 'b.id_barang = bm.id_barang');
      $this->db->join('supplier as s', 's.id_supplier = bm.id_supplier');
      $this->db->where('bm.id_barang_masuk',$where);
      $this->db->order_by('bm.id_barang_masuk','DESC');
      return $query = $this->db->get();
    }


    public function ambilId($table, $where)
   {
       return $this->db->get_where($table, $where);
    }

 

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
         if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return false;

    }


    public function detail_data($where, $table)
    {
       return $this->db->get_where($table,$where);
    }

    public function tambah_data($data, $table)
    {
       $this->db->insert($table, $data);
    }

    public function ubah_data($where, $data, $table)
    {
       $this->db->where($where);
       $this->db->update($table, $data);

    }


    public function buat_kode()   {
		  $this->db->select('RIGHT(barang_masuk.id_barang_masuk,4) as kode', FALSE);
		  $this->db->order_by('id_barang_masuk','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('barang_masuk');      //cek dulu apakah ada sudah ada kode di tabel.
		  if($query->num_rows() <> 0){
		   //jika kode ternyata sudah ada.
		   $data = $query->row();
		   $kode = intval($data->kode) + 1;
		  }
		  else {
		   //jika kode belum ada
		   $kode = 1;
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "BRG-M-".$kodemax;    // hasilnya 
		  return $kodejadi;
	}





}
