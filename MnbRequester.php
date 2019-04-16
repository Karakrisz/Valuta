<?php

class MnbRequester {

    public function request() {
        $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?wsdl");
        $xml = $client->GetCurrentExchangeRates()->GetCurrentExchangeRatesResult;
        return $this->xmlToArray($xml);
    }

    private function xmlToArray($xml) {
        $p = xml_parser_create();
        xml_parse_into_struct($p, $xml, $vals, $index);
        xml_parser_free($p);

        $rates = []; //$rates=array();
        // $rates['AUD'] = '198,18'
         var_dump($vals);
        // datum visszadas nem történik meg
        // xmlbol az adatok , jönnek de az adatbázisba majd . kell elmenteni.
        // csak azokat menti el amit a currencies táblában szerepelnek.
        foreach ($vals as $v) {
            if ($v['tag'] == 'RATE') {
                $rates[$v['attributes']['CURR']] = $v['value'];
            }
        }
        return $rates;
    }

}
