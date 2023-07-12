<?php 

namespace App\Entity;

use App\Db\Database;

class Vaga{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga está ativa
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Data de publicação da vaga
     * @var string
     */
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
        echo '<pre>'; print_r($this); echo '</pre>'; exit;
    }
}