<?php

namespace App\Models;

use App\Core\Model;

class Url extends Model
{
    private $table = 'urls';

    public function getURls($limit = null, $from = null)
    {
        $query = "SELECT * FROM $this->table";

        if($limit) {
            $query .= " LIMIT $limit";
            if($from) {
                $query .= ", $from";
            }
        }
        $stm = $this->db->prepare($query);

        $stm->execute();

        return $stm->fetchAll();
    }

    public function add($data)
    {
        $stm = $this->db->prepare("INSERT INTO $this->table 
(original_url, shorten_url, created_date) VALUES(:original,:shorten,:created_date)");
        $stm->bindValue(':original', $data['original_url']);
        $stm->bindValue(':shorten', $data['shorten_url']);
        $stm->bindValue(':created_date', $data['created_date']);

        $stm->execute();

        return $this->db->lastInsertId();
    }

    public function update($id, $shorten)
    {
        $stm = $this->db->prepare("UPDATE $this->table SET shorten_url = :shorten WHERE id = :id");
        $stm->bindValue(':id', $id);
        $stm->bindValue(':shorten', $shorten);

        $stm->execute();
    }

    public function getByOriginalUrl($url)
    {
        $stm = $this->db->prepare("SELECT * FROM $this->table WHERE original_url = ? LIMIT 1");
        $stm->bindValue(1, $url);
        $stm->execute();

        return $stm->fetch();
    }

    public function getByShortenedUrl($shortened)
    {
        $stm = $this->db->prepare("SELECT * FROM $this->table WHERE shorten_url = ? LIMIT 1");
        $stm->bindValue(1, $shortened);
        $stm->execute();

        return $stm->fetch();
    }
}