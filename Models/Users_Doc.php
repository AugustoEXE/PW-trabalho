<?php
class Users_Doc extends Model
{
    public function deleteWithAcess($idUser, $idDoc ){
       
        
        $sql = "DELETE FROM {$this->table}";
        


        $sql .= ' WHERE users_id = :idUser AND documents_id = :idDoc';
        
        
        $del = $this->conex->prepare($sql);
        $del->execute([
            'idUser' => $idUser, 
            'idDoc' => $idDoc]);
        // var_dump($del);die;
        
    }
}
