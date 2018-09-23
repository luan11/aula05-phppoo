<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContaCorrente
 *
 * @author Luan
 */
class ContaCorrente {
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;
    
//  setters
    function setNumConta($numConta) {
        $this->numConta = $numConta;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDono($dono) {
        $this->dono = $dono;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }
    
    function setStatus($status) {
        $this->status = $status;
    }
    
//  getters
    function getNumConta() {
        return $this->numConta;
    }
                
    function getTipo() {
        return $this->tipo;
    }

    function getDono() {
        return $this->dono;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function getStatus() {
        return $this->status;
    }
            
//  methods
    public function abrirConta($nC, $t, $d){
        $this->setNumConta($nC);
        $this->setTipo($t);
        $this->setDono($d);
        $this->setStatus(true);
        
        if($t == "CC"){
            $this->setSaldo(50);
        }else if($t == "CP"){
            $this->setSaldo(150);
        }
    }
    
    public function fecharConta(){
        if($this->getStatus()){            
            if($this->getSaldo() == 0){            
                $this->setStatus(false);
                echo "<b>SUCESSO!</b> Nenhum valor foi encontrado na conta e o encerramento foi concluído.<br>";
            }else{
                echo "Ainda há dinheiro na conta, retire-o e tente efetuar encerramento novamente.<br>";
            }
        }else{
            echo "Esta conta já foi encerrada.<br>";
        }
    }
    
    public function depositar($qtd){
        if($this->getStatus()){
            if($qtd > 0){
                $this->setSaldo($this->saldo + $qtd);
                echo "Deposito no valor de R$".$qtd." realizado com sucesso!<br>";
            }else{
                echo "Impossivel depositar o valor de R$".$qtd." na conta, tente um valor depositar um valor maior.<br>";
            }
        }else{
            echo "Impossível realizar o deposito em uma conta encerrada.<br>";
        }
    }
    
    public function sacar($qtd){
        if($this->getStatus()){
            if($qtd == 0){
             echo "Impossivel sacar o valor de R$".$qtd.", tente sacar um valor maior.<br>";
            }else if($this->getSaldo() >= $qtd){
                $this->setSaldo($this->getSaldo() - $qtd);
                echo "Saque no valor de R$".$qtd." realizado com sucesso!<br>";
            }else{
                echo "Saldo insuficiente na conta para a realização deste saque!, tente um valor menor.<br>";
            } 
        }else{
            echo "Impossível realizar o saque em uma conta encerrada.<br>";
        }        
    }
    
    public function tarifaMensal(){
        $valor;
        
        if($this->getTipo() == "CC"){
            $valor = 12;
        }else if($this->getTipo() == "CP"){
            $valor = 20;
        }
        
        if($this->getStatus()){
            if($this->getSaldo() > $valor){
                $this->setSaldo($this->getSaldo() - $valor);
            }else{
                echo "Saldo insuficiente!<br>";
            }
        }else{
            echo "Impossivel pagar!!!<br>";
        }
    }
    
    public function statusEscrito(){
        $stsEscrito;
        switch($this->getStatus()){
            case true:
                $stsEscrito = "Conta aberta";
            break;            
            case false:
                $stsEscrito = "Conta encerrada";
            break;
        }
        return $stsEscrito;
    }
}
