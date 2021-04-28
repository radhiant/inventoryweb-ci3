<?php
class barangKeluar_model extends ci_model{


    function data()
    {
        $this->db->order_by('id_barang_keluar','DESC');
        return $query = $this->db->get('barang_keluar');
    }

    public function dataJoin()
    {
      $this->db->select('*');
      $this->db->from('barang_keluar as bk');
      $this->db->join('barang as b', 'b.id_barang = bk.id_barang');
      $this->db->order_by('bk.id_barang_keluar','DESC');
      return $query = $this->db->get();
    }

    public function dataJoinLike($tahun)
    {
      $this->db->select('*');
      $this->db->from('barang_keluar as bk');
      $this->db->join('barang as b', 'b.id_barang = bk.id_barang');

      $this->db->like('bk.tgl_keluar', $tahun);
      $this->db->order_by('bk.id_barang_keluar','DESC');
      return $query = $this->db->get();
    }

    public function transaksiTerakhir()
    {
      $this->db->select('*');
      $this->db->from('barang_keluar as bk');
      $this->db->join('barang as b', 'b.id_barang = bk.id_barang');
      $this->db->order_by('bk.id_barang_keluar','DESC');
      $this->db->limit(5);
      return $query = $this->db->get();
    }

    function lapdata($tglAwal, $tglAkhir)
    {
      $this->db->select('*');
      $this->db->from('barang_keluar as bk');
      $this->db->join('barang as b', 'b.id_barang = bk.id_barang');

      $this->db->where('bk.tgl_keluar >=', $tglAwal);
      $this->db->where('bk.tgl_keluar <=', $tglAkhir);
      return $query = $this->db->get();
    }

    function jmlperbulan($tglAwal, $tglAkhir)
    {
      $this->db->select('*');
      $this->db->from('barang_keluar as bk');
      $this->db->join('barang as b', 'b.id_barang = bk.id_barang');

      $this->db->where('bk.tgl_keluar >=', $tglAwal);
      $this->db->where('bk.tgl_keluar <=', $tglAkhir);
      return $query = $this->db->get();
    }


    public function detailJoin($where)
    {
      $this->db->select('*');
      $this->db->from('barang_keluar as bk');
      $this->db->join('barang as b', 'b.id_barang = bk.id_barang');
      $this->db->where('bk.id_barang_keluar',$where);
      $this->db->order_by('bk.id_barang_keluar','DESC');
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
		  $this->db->select('RIGHT(barang_keluar.id_barang_keluar,4) as kode', FALSE);
		  $this->db->order_by('id_barang_keluar','DESC');
		  $this->db->limit(1);
		  $query = $this->db->get('barang_keluar');      //cek dulu apakah ada sudah ada kode di tabel.
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
		  $kodejadi = "BRG-K-".$kodemax;    // hasilnya 
		  return $kodejadi;
	}





}
