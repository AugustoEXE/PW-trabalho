<?php
class Document extends Model
{
    public function getWithUser($id)
    {
        $conex = $this->conex;
        $sql = $conex->prepare(
            "SELECT documents.*, users_docs.permissions from documents
                    join users_docs on users_docs.documents_id = documents.id
                    where users_docs.users_id = ? and active = 1"
        );
        $sql->execute([$id]);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
