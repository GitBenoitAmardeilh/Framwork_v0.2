<?php

Abstract class ExceptionManagerXml{

    private $nameRow = [];

    private $xml;

    public function managerXml( $e ){

        $this->explodeException($e );

    }

    public function explodeException( $e ){

        $file = fopen(__DIR__.'\\Xml\\'.get_class($e).'.xml', 'w');
        $this->xml = new DOMDocument('1.0', 'utf-8');
        
        $xmlBloc = $this->xml->createElement( "body");

        $xml_id = $this->xml->createElement( "id" , "1");
        $xmlBloc->appendChild($xml_id);

        $infos = get_class($e);
        $xml_m = $this->xml->createElement( "type" , $infos );
        $xmlBloc->appendChild($xml_m);

        $infos = $e->getMessage();
        $xml_m = $this->xml->createElement( "message" , $infos );
        $xmlBloc->appendChild($xml_m);

        $infos = $e->getCode();
        $xml_c = $this->xml->createElement( "code" , $infos );
        $xmlBloc->appendChild($xml_c);

        $infos = $e->getFile();
        $xml_f = $this->xml->createElement( "file" , $infos );
        $xmlBloc->appendChild($xml_f);

        $infos = $e->getLine();
        $xml_l = $this->xml->createElement( "line" , $infos );
        $xmlBloc->appendChild($xml_l);

        foreach($e->getTrace() as $key => $value){

            $xml_a = $this->addTabValuesInXmlFile($value , "arg".$key);
            $xmlBloc->appendChild($xml_a);
            $this->xml->appendChild( $xmlBloc ); 

        }

        fputs($file,$this->xml->saveXML());
        fclose($file);

    }

    public function addTabValuesInXmlFile( $array , $keyName ){

        $xmlBloc = $this->xml->createElement( $keyName );

        foreach($array as $key => $value){
            
            if($key != "args"){

                $xml_infos = $this->xml->createElement( $key , $value );
                $xmlBloc->appendChild($xml_infos);

            }

        }

        return $xmlBloc;

    }

    public function deleteXmlFile(){

        $files1 = scandir(__DIR__.'\\Xml');

        foreach($files1 as $key => $value){

            if($files1[$key] != "." && $files1[$key] != "..")
                unlink(__DIR__.'\\Xml\\'.$files1[$key]);

        }
        
    }

}