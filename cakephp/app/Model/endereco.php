1    <?php
2    class Endereco extends AppModel
3    {
4        var $name = "Endereco";
5        var $primaryKey = "codigo_endereco"; //padrao é id
6        var $codigo_endereco;
7        var $codigo_cliente;
8        var $logradouro;
9        var $numero;
10        var $cep;
11        var $estado;
12        var $cidade;
13        var $bairro;
14
15        public function get()
16        {
17            $where = array('conditions' => array());
18
19            if($this->codigo_endereco)
20                $where['conditions']['Endereco.codigo_endereco ='] = $this->codigo_endereco;
21            if($this->codigo_cliente)
22                $where['conditions']['Endereco.codigo_cliente ='] = $this->codigo_cliente;
23
24            return $this->find('all', $where);
25        }
26
27        public function insert()
28        {
29            $data = array(
30                'codigo_cliente'=> $this->codigo_cliente,
31                'logradouro'=> $this->logradouro,
32                'numero'=> $this->numero,
33                'cep'=> $this->cep,
34                'estado'=> $this->estado,
35                'cidade'=> $this->cidade,
36                'bairro'=> $this->bairro
37            );
38
39            $this->save($data);
40        }
41        public function remove()
42        {
43            $this->delete($this->codigo_endereco);
44        }
45    }
46    ?>