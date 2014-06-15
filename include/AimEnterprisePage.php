<?php
class AimEnterprisePage {
  private $id;
  private $title;
  private $desc;
  private $onload;

  function __construct($id, $title, $desc='AIM Enterprise', $onload=null) {
    $this->id = $id;
    $this->title = $title;
    $this->desc = $desc;
    $this->onload = $onload;
  }

  // renders the whole page using passed content
  function render($content) {
    $this->renderHeader();
    echo '<div class="content">'.$content.'</div>';
    $this->renderFooter();
  }

// renders everything up through page header, navigation set based on $page->id
// determined by $this->id passed in
function renderHeader() {
echo <<<EOF
<!doctype html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="IE=Edge"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<link href="/css/style.css" rel="stylesheet" type="text/css">
<title>$this->title</title>
<meta name="description" content="$this->desc">
EOF;

// Omniture
echo <<<EOF

<script type="text/javascript">

//bN_cfg = {
//	current page
//     h: location.hostname
//};

function runOmni() 
{
s_265.pfxID="aim";
s_265.pageName=document.title;
s_265.channel="us.enterprise";
s_265.linkInternalFilters="javascript:,aol.com";
s_265.prop1="marketing";
s_265.prop2="$this->id";
s_265.mmxgo=true;
var s_code=s_265.t();
}

s_265_account ="devaolsvc";
(function(){
    var d = document, s = d.createElement('script');
    s.type = 'text/javascript';
    s.src = (location.protocol == 'https:' ? 'https://s' : 'http://o') + '.aolcdn.com/os_merge/?file=/aol/beacon.min.js&file=/aol/omniture.min.js';
    d.getElementsByTagName('head')[0].appendChild(s);
})();
</script>

EOF;



if(!is_null($this->onload)) {
echo <<<EOF
<script type="text/javascript" src="/js/main.js"></script>
</head>
<body id="$this->id" onload="$this->onload">
EOF;
} else {
echo <<<EOF
</head>
<body id="$this->id">
EOF;
}

echo <<<EOF
<div class="wrapper">

<div class="header">
     <div id='menu'>
          <ul>
               <li><a href='/'><span>HOME</span></a></li>
               <li><a href='#'><span>SERVICES</span></a>
                    <ul>
                         <li><a href='/federation'><span>AIM FEDERATION</span></a></li>
                         <li><a href='/assurance'><span>AIM ASSURANCE</span></a></li>
                         <li><a href='/bots'><span>BOTS</span></a></li>
                    </ul>
               </li>
               <li><a href='/partners'><span>PARTNERS</span></a></li>
               <li><a href='/contact'><span>CONTACT</span></a></li>
               <li class='last'><a href='https://tickettracker.aol.com' target="_blank"><span>SUPPORT</span></a></li>
               </ul>
     </div>
     
     <a href="/" class="logo">Aol.</a>
     
     <p class="promo">
     <span class="text-box">AIM Enterprise.<br />No matter how you<br />touch the AIM Network,<br />we have you covered.</span>
     </p>
</div>

EOF;
}



// renders page footer
function renderFooter() {
echo <<<EOF

<div id="footer">
	<div class="links">
		<img class="links-logo" src="http://components.premiumservices.aol.com/aimenterprise/images/footer_aim_logo.png"/>
		<span class="links-container">
			<sup>&copy;</sup> 2014 AOL Inc. All Rights Reserved. | <a href="http://privacy.aol.com">Privacy Policy</a> |<a href="http://legal.aol.com/aimTOS">AIM Terms of Service</a>
          </span>
	</div>
</div>

</body>
</html>
EOF;


}

}
?>
