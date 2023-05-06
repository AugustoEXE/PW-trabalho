<?php
class User extends Model{
    public function getByEmail($email){
        $sql = $this->conex->prepare("SELECT * FROM {$this->table} WHERE email=?");
        $sql->execute([$email]);
        return $sql->fetch(PDO::FETCH_OBJ);
    }
}