<?php


    namespace utils; 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("../classe/Usuario.php");
    use classe\Usuario;
    
  class CEP{

    private $cepJson;

     public function lerCEP($cep){
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $this->cepJson = file_get_contents($url);
        if ($this->cepJson === false) {
            echo "Erro ao acessar a API ViaCEP.";
            return;
        }
        
        $data = json_decode($this->cepJson, true);

        if ($data === null) {
            echo "Erro ao decodificar o JSON.";
            return;
        }

        if (isset($data["erro"])) {
            echo "CEP não encontrado.";
            return;
        }
    }

    public function adaptarJson($cliente){

        $data = json_decode($this->cepJson, true);

        $cliente = new Usuario();
        $cliente->cep =  $data["cep"];
        $cliente->rua =  $data["logradouro"];
        $cliente->complemento =  $data["complemento"];
        $cliente->bairro =  $data["bairro"];
        $cliente->cidade =  $data["localidade"];
        $cliente->estado = $data["uf"];
    }

    public function exibirDados(){
        $data = json_decode($this->cepJson, true);
        echo "CEP: " . $data["cep"] . "<br>";
        echo "Logradouro: " . $data["logradouro"] . "<br>";
        echo "Complemento: " . $data["complemento"] . "<br>";
        echo "Bairro: " . $data["bairro"] . "<br>";
        echo "Cidade: " . $data["localidade"] . "<br>";
        echo "UF: " . $data["uf"] . "<br>";
    }
}

?>
    
    
