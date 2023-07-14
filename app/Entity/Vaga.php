<?php 

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Vaga{
    public $id;
    public $titulo;
    public $descricao;
    public $ativo;
    public $data;

    /**
    * Método responsável por cadastrar nova vaga
    * @return boolean
    */
    public function cadastrar(){
        $this->data = date('Y-m-d H:i:s');
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
                                        'titulo'    => $this->titulo,
                                        'descricao' => $this->descricao,
                                        'ativo'     => $this->ativo,
                                        'data'      => $this->data
                                    ]);
        return true;
    }

    public function editar(){
        return (new Database('vagas'))->update('id='.$this->id, [
                            'titulo'    => $this->titulo,
                            'descricao' => $this->descricao,
                            'ativo'     => $this->ativo,
                        ]);
    }

    public function excluir(){
        return (new Database('vagas'))->delete('id='.$this->id);
    }

    public static function getVagas($where = null, $order = null, $limit = null){
        return (new Database('vagas'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    public static function getVaga($where = null){
        return (new Database('vagas'))->select('id='.$where)
                                      ->fetchObject(self::class);
    }
}