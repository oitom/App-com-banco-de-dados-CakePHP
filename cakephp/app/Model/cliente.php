1    <?php
2    App::import('Model','Endereco');
3    class Cliente extends AppModel
4    {
5        var $name = "Cliente";
6        var $primaryKey = "codigo_cliente"; // padrão é id
7        var $codigo_cliente;
8        var $nome;
9        var $telefone;
10        var $cpf;
11
12        public function get()
13        {
14            $where = array('conditions' =>
15                array('Cliente.codigo_cliente =' => $this->codigo_cliente)
16            );
17
18            return $this->find('all', $where);
19        }
20
21        public function getJoin($join = array())
22        {
23            $where = array('Cliente.codigo_cliente =' => $this->codigo_cliente);
24
25            $query = $this->find('all', array(
26                     'joins' => array($join),
27                     'conditions' => array($where),
28                     'fields' => array($join['table'].'.*', 'Cliente.*'))
29                    );
30
31            return $query;
32        }
33
34        public function insert()
35        {
36            $data = array(
37                'nome'  => $this->nome,
38                'telefone'  => $this->telefone,
39                'cpf'  => $this->cpf
40            );
41            $this->save($data);
42        }
43
44        public function update()
45        {
46            $data = array(
47                'nome'  => $this->nome,
48                'telefone'  => $this->telefone,
49                'cpf'  => $this->cpf
50            );
51            $this->updateAll($data, array('codigo_cliente' => $this->codigo_cliente));
52        }
53
54        public function remove()
55        {
56            $endereco = new Endereco();
57            $endereco->codigo_cliente = $this->codigo_cliente;
58            $enderecoDeletar = $endereco->get();
59
60            if(!empty($enderecoDeletar)){
61                $endereco->codigo_endereco = $enderecoDeletar[0]['Endereco']['codigo_endereco'];
62                $endereco->remove();
63                $this->delete($this->codigo_cliente);
64            }else
65                $this->delete($this->codigo_cliente);
66        }
67    }
68    ?>