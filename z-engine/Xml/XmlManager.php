<?php

namespace Manager;

class XmlManager{

    /**
     * @var array
     */
    private $nameRow = [];

    /**
     * @var \DOMDocument
     */
    private $xml;

    /**
     * @param $e
     */
    public function explodeException( $e )
    {
        $this->xml = new \DOMDocument('1.0', 'utf-8');
        
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

        $filePath = dirname(__DIR__).'\\Xml\\Files\\'.get_class($e).'.xml';
        $file = fopen($filePath, 'w');

        if(file_exists($filePath))
            fputs($file,$this->xml->saveXML());

        fclose($file);

    }

    /**
     * @param $array
     * @param $keyName
     * @return \DOMElement
     */
    public function addTabValuesInXmlFile( $array , $keyName )
    {
        $xmlBloc = $this->xml->createElement( $keyName );

        foreach($array as $key => $value){
            if($key != "args"){
                $xml_infos = $this->xml->createElement( $key , $value );
                $xmlBloc->appendChild($xml_infos);
            }
        }

        return $xmlBloc;
    }

    public function test(){
        echo "manager";
    }

}