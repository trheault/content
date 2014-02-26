<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <form action="http://fishandgame.idaho.gov/search" id="formSiteSearch" method="get"><input id="search" name="search" placeholder="Search" required="true" type="text" /><input id="searchUsing" name="searchUsing" type="hidden" value="Google Web Search" /><input id="cmdSubmit" type="submit" value="Go" /></form>
  <?php
function curPageURI() {
// $pageURI = "http";
// if ($_SERVER["HTTPS"] == "on") {$pageURI .= "s";}
 $pageURI = "https://fishandgame.idaho.gov".$_SERVER["REQUEST_URI"];
 return $pageURI;
}
$pageurl = urlencode(curPageURI()."?cachebuster=".rand());
global $user;
 if (user_is_logged_in()) { ?> 
       <span id="ifwis-accountUsername"><a href="https://fishandgame.idaho.gov/ifwis/accounts/profile" title="Edit my Profile"><?php print $user->name; ?></a></span>
        <span id="ifwis-accountLogout"><a href="https://fishandgame.idaho.gov/ifwis/accounts/user/logout?returnUrl=<?php print $pageurl ?>" title="Logout of Fish and Game">logout</a></span>
<?php } else { ?> 
       <span id="ifwis-accountRegister"><a href="https://fishandgame.idaho.gov/ifwis/accounts/user/register?returnUrl=<?php print $pageurl ?>" title="Create a Fish and Game Account">register</a></span>
        <span id="ifwis-accountLogin"><a href="https://fishandgame.idaho.gov/ifwis/accounts/user/login?returnUrl=<?php print $pageurl ?>" title="Sign In">login</a></span>
<?php } ?>
	<?php print $content; ?>
  </div>
</div>