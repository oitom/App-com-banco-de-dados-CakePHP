1    <?php
2    class HomeController  extends AppController
3    {
4        var $name = "home";
5
6        public function index()
7        {
8            // INSERT CLIENTE
9            $this->loadModel('Cliente');
10            $this->Cliente->nome = $this->request->data("nome");
11            $this->Cliente->telefone = $this->request->data("telefone");
12            $this->Cliente->cpf = $this->request->data("cpf");
13            $this->Cliente->insert();
14
15            // INSERT CLIENTE ENDEREÇO
16            $this->loadModel('Cliente');
17            $this->Cliente->nome = $this->request->data("nome");
18            $this->Cliente->telefone = $this->request->data("telefone");
19            $this->Cliente->cpf = $this->request->data("cpf");
20            $this->Cliente->insert();
21
22            $this->loadModel('Endereco');
23            $this->Endereco->codigo_cliente = $this->Cliente->getLastInsertId();;
24            $this->Endereco->logradouro = $this->request->data("logradouro");
25            $this->Endereco->numero = $this->request->data("numero");
26            $this->Endereco->cep = $this->request->data("cep");
27            $this->Endereco->estado = $this->request->data("estado");
28            $this->Endereco->cidade = $this->request->data("cidade");
29            $this->Endereco->bairro = $this->request->data("bairro");
30            $this->Endereco->insert();
31
32            // UPDATE CLIENTE
33            $this->loadModel('Cliente');
34            $this->Cliente->codigo_cliente = $this->request->data("codigo");
35            $this->Cliente->nome = $this->request->data("nome");
36            $this->Cliente->telefone = $this->request->data("telefone");
37            $this->Cliente->cpf = $this->request->data("cpf");
38            $this->Cliente->update();
39
40            // DELETE ENDEREÇO
41            $this->loadModel('Endereco');
42            $this->Endereco->codigo_endereco = $this->request->data("codigo");
43            $this->Endereco->remove();
44
45            // DELETE CLIENTE
46            $this->loadModel('Cliente');
47            $this->Cliente->codigo_cliente = $this->request->data("codigo");
48            $this->Cliente->remove();
49
50            // SELECT CLIENTE
51            $this->loadModel('Cliente');
52            $this->Cliente->codigo_cliente = $this->request->data("codigo");
53            $cliente = $this->Cliente->get();
54
55            // SELECT CLIENTE ENDEREÇO
56            $this->loadModel('Cliente');
57            $this->Cliente->codigo_cliente = $this->request->data("codigo");
58            $cliente = $this->Cliente->getJoin(array('table' => 'enderecos'));
59        }
60    }
61    ?>