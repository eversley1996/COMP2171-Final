<?php
    class ShippingRecord{
        private $refnumber;
        private $senbranchname;
        private $sendername;
        private $sendercontnum;
        private $senderadd;
        private $sendercity;
        private $senderstate;
        private $SenderEMail;
        private $sendercountry;
        private $recname;
        private $reccontactnumber;
        private $recadd;
        private $reccity;
        private $recstate;
        private $recpEMail;
        private $reccountry;
        private $shipvessel;
        private $shipcontainer;
        private $shipmanifest;
        private $courierdes;
        private $courierwt;
        private $parlength;
        private $parwidth;
        private $parheight;
        private $parprice;


        //How to get the ID from the database?
        
        function __contruct($refnumber,$senderbranchname, $sendername,$sendercontnum,$senderadd,$sendercity,$senderstate,$SenderEMail,$sendercountry,$recname,$reccontactnumber,$recadd,
        $reccity,$recstate,$recpEMail,$reccountry,$shipvessel,$shipcontainer,$shipmanifest,$courierdes,$courierwt,$parlength,$parwidth,$parheight,$parprice){
            $this->$refnumber=$refnumber;
            $this->$senderbranchname=$senbranchname;
            $this->$sendername=$sendername;
            $this->$sendercontnum=$sendercontnum;
            $this->$senderadd=$senderadd;
            $this->$sendercity=$sendercity;
            $this->senderstate=$senderstate;
            $this->$SenderEMail=$SenderEMail;
            $this->$sendercountry=$sendercountry;
            $this->recname=$recname;
            $this->reccontactnumber=$reccontactnumber;
            $this->$recadd=$recadd;
            $this->$reccity=$reccity;
            $this->$recstate=$recstate;
            $this->$recpEMail=$recpEMail;
            $this->$reccountry=$reccountry;
            $this->$shipvessel=$shipvessel;
            $this->$shipcontainer=$shipcontainer;
            $this->$shipmanifest=$shipmanifest;
            $this->$courierdes=$courierdes;
            $this->$courierwt=$courierwt;
            $this->$parlength=$parlength;
            $this->$parwidth=$parwidth;
            $this->$parheight=$parheight;
            $this->$parprice=$parprice;

        }

    }


?>