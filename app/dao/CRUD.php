<?php
interface CRUD{
    public function create($objet);
    public function read($champ, $valeur);
    public function update($objet);
    public function delete($objet);
}
?>