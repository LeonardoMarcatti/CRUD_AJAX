<?php

    class Produto {
        private int $id;
        private string $nome;
        private int $categoria;

        public function setID(int $id){
            $this->id = $id;
        }
        
        public function setNome(string $nome){
            $this->nome = $nome;
        }

        public function setCategoria(int $categoria){
            $this->categoria = $categoria;
        }

        public function getID(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getCategoria(){
            return $this->categoria;
        }
    };
    class Produto_DAO {
        private $pdo;

        public function __construct(PDO $driver){
            $this->pdo = $driver;
        }

        public function selectAll(){
            $sql = "select p.id as 'id', p.nome as 'nome', c.nome as 'categoria', c.id as 'idcategoria' from produto p join categoria c on p.idcategoria = c.id order by p.id";
            $select = $this->pdo->prepare($sql);
            $select->execute();
            $result = $select->fetchAll(pdo::FETCH_ASSOC);
            return $result;
        }

        public function add(Produto $p){
            $sql = "insert into produto(nome, idcategoria) values(:produto, :categoria)";
            $insere = $this->pdo->prepare($sql);
            $insere->bindParam(':produto', $p->getNome());
            $insere->bindParam(':categoria', $p->getCategoria());
            $insere->execute();

            $p->setID($this->pdo->lastInsertId());
            return $p->getID();
        }

        public function update(Produto $p){
            $sql = "update produto set nome = :nome, idcategoria = :idcategoria where id = :id";
            $update = $this->pdo->prepare($sql);
            $update->bindParam(':nome', $p->getNome());
            $update->bindParam(':idcategoria', $p->getCategoria());
            $update->bindParam(':id', $p->getID());
            $update->execute();

            $check_sql = "select p.id as 'id', p.nome as 'nome', c.nome as 'categoria', c.id as 'idcategoria' from produto p join categoria c on p.idcategoria = c.id where p.nome = :nome and c.id = :idcategoria and p.id = :id";
            $checked = $this->pdo->prepare($check_sql);
            $checked->bindParam(':nome', $p->getNome());
            $checked->bindParam(':idcategoria', $p->getCategoria());
            $checked->bindParam(':id', $p->getID());
            $checked->execute();

            if ($checked->rowCount() == 1) {
                return true;
            } else {
                return false;
            };
        }

        public function delete($id){
            $sql = "delete from produto where id = :id";
            $delete = $this->pdo->prepare($sql);
            $delete->bindParam(':id', $id);
            $delete->execute();
        }

    };
    
?>