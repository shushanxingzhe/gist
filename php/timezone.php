<?php

  /**
    * To get countries that current time equal localTime value
    */
  public function getCurrentTimezoneCountry($localTime=1730)
    {
        $gmtTime = gmdate('Hi');
        $remainder = $gmtTime % 100;

        if($remainder <= 10){
            $remainder = 0;
        }elseif($remainder >10 && $remainder < 20){
            $remainder = 15;
        }elseif($remainder >40 && $remainder < 50){
            $remainder = 45;
        }elseif($remainder >= 50){
            $remainder = 100;
        }else{
            $remainder = 30;
        }

        $gmtTime = $gmtTime - ($gmtTime % 100) + $remainder;


        $map = [
            '-1100' => 'TO',
            '-1000' => 'CK',
            '-930' => 'PF',
            '-800' => 'PM,PN',
            '-600' => 'NI,GT,SV,CR,HN,MX,BZ',
            '-500' => 'PE,CO,PA,KY,EC,US,CA,BS,CU,HT,JM,UM',
            '-400' => 'PR,VE,LC,GP,DO,BO,MQ,VC,BM,TT,GD,BB,DM,AG,AI,GY,KN,VG,VI',
            '-300' => 'CL,GF,PY,SR,UY,AR,FK',
            '-200' => 'BR',
            '-100' => 'CV,CX,XH',
            '0' => 'SN,MA,IE,GH,IS,CI,GW,GB,PT,BF,GM,GN,HM,LR,ML,MR,MS,ST,TG',
            '100' => 'NL,PL,SK,DZ,TN,CH,BE,NO,AT,SE,CZ,NG,HR,RS,CM,BA,AO,SI,AL,DK,LU,MT,MK,ME,AD,LI,CD,HU,ES,FR,IT,DE,IL,AN,AS,AW,BJ,CC,CF,CG,EH,ER,FX,GA,GG,GI,GL,GQ,GS,IC,JE,MC,NE,NF,SH,SJ,SL,SM,TD,VA,WS,XB,XC,XD,XE,XG,XI,XJ,XK,XM,XN',
            '200' => 'EG,ZA,LT,IL,MD,BG,RO,EE,LB,LV,FI,MZ,CY,BW,MW,JO,ZM,ZW,BI,NA,PS,GR,BV,LS,LY,RW,SY,SZ,TA,TC,ZR,MF,IM,AX',
            '300' => 'SA,QA,BY,KW,IQ,TZ,MG,KE,SD,BH,UG,TR,RU,UA,DJ,ET,JU,KI,KM,KV,SO,XS,XY,YT',
            '330' => 'IR',
            '400' => 'AE,GE,SC,AZ,OM,MU,RE,AM,IO,YE',
            '430' => 'AF',
            '500' => 'PK,MV,NR,NU,TF,TJ,TM',
            '530' => 'LK,UZ,IN',
            '545' => 'NP',
            '600' => 'BD,KG,KZ,BT',
            '630' => 'MM',
            '700' => 'VN,TH,KH,ID,LA,TK',
            '800' => 'TW,HK,PH,SG,BN,MO,CN,MY,MN',
            '900' => 'JP,KR,KP,PW,TL',
            '1000' => 'GU,MP,FO,SP,PG',
            '1100' => 'NC,AU,FM,SB,VU,WF',
            '1200' => 'FJ,NZ,MH,TV',
        ];
        
        $rightTimezone = $localTime - $gmtTime;
        if($rightTimezone >1200){
            $rightTimezone -= 2400;
        }elseif($rightTimezone < -1100){
            $rightTimezone = 2400 - $rightTimezone;
        }

        $remainder = $rightTimezone % 100;

        if($remainder > 60){
            $remainder -= 40;
        }elseif($remainder < -60){
            $remainder += 40;
        }

        $rightTimezone = $rightTimezone - ($rightTimezone % 100) + $remainder;

        return $map[$rightTimezone] ?? '';
    }
