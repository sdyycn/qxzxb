﻿<{include file="header.tpl"}>
最热资源分享

<ul>
    <{section name=h2 loop=$erwei}>  
   <li> id:<{$erwei[h2].id}>  </li>
    <li>name:<{$erwei[h2].name}>  </li>
    <li>address:<{$erwei[h2].address}>  </li>
    <{/section}>  
</ul>
<{include file="footer.tpl"}> 