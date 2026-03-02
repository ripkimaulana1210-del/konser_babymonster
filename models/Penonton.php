<?php
class Penonton {
    private $conn;
    private $table_name = "penonton";

    public $id;
    public $nama;
    public $no_hp;
    public $tipe_tiket;
    public $jumlah_tiket;
    public $tanggal_pesan;

    public function __construct($db) {
        $this->conn = $db;
    }

    // READ ALL
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // READ BY ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->id]);
        return $stmt;
    }

    // CREATE
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                  (nama, no_hp, tipe_tiket, jumlah_tiket, tanggal_pesan)
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->nama,
            $this->no_hp,
            $this->tipe_tiket,
            $this->jumlah_tiket,
            $this->tanggal_pesan
        ]);
    }

    // UPDATE
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET nama=?, no_hp=?, tipe_tiket=?, jumlah_tiket=?, tanggal_pesan=?
                  WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->nama,
            $this->no_hp,
            $this->tipe_tiket,
            $this->jumlah_tiket,
            $this->tanggal_pesan,
            $this->id
        ]);
    }

    // DELETE
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    }
}
?>