<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>View: dept_emp_latest_date - Adminer</title>
<link rel="stylesheet" type="text/css" href="adminer.php?file=default.css&amp;version=4.6.4-dev">
<script src='adminer.php?file=functions.js&amp;version=4.6.4-dev' nonce="NzY4M2MwODNjOTcyOWU5NjQ2M2RhYzkwMWYxMWJlMmQ="></script>
<link rel="shortcut icon" type="image/x-icon" href="adminer.php?file=favicon.ico&amp;version=4.6.4-dev">
<link rel="apple-touch-icon" href="adminer.php?file=favicon.ico&amp;version=4.6.4-dev">

<body class="ltr nojs">
<script nonce="NzY4M2MwODNjOTcyOWU5NjQ2M2RhYzkwMWYxMWJlMmQ=">
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
var thousandsSeparator = ',';
</script>

<div id="help" class="jush-sql jsonly hidden"></div>
<script nonce="NzY4M2MwODNjOTcyOWU5NjQ2M2RhYzkwMWYxMWJlMmQ=">mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});</script>

<div id="content">
<p id="breadcrumb"><a href="adminer.php">MySQL</a> &raquo; <a href='adminer.php?username=root' accesskey='1' title='Alt+Shift+1'>Server</a> &raquo; <a href="adminer.php?username=root&amp;db=employees">employees</a> &raquo; View: dept_emp_latest_date
<h2>View: dept_emp_latest_date</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>
<p class="links"> <a href='adminer.php?username=root&amp;db=employees&amp;select=dept_emp_latest_date'>Select data</a> <a href='adminer.php?username=root&amp;db=employees&amp;table=dept_emp_latest_date' class='active '>Show structure</a> <a href='adminer.php?username=root&amp;db=employees&amp;view=dept_emp_latest_date'>Alter view</a> <a href='adminer.php?username=root&amp;db=employees&amp;edit=dept_emp_latest_date'>New item</a>
<table cellspacing='0' class='nowrap'>
<thead><tr><th>Column<td>Type<td>Comment</thead>
<tr><th>emp_no<td><span title=''>int(11)</span><td>
<tr class="odd"><th>from_date<td><span title=''>date</span> <i>NULL</i><td>
<tr><th>to_date<td><span title=''>date</span> <i>NULL</i><td>
</table>
</div>

<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="934862:366601">
</p>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target="_blank" rel="noreferrer noopener" id='h1'>Adminer</a> <span class="version">4.6.4-dev</span>
<a href="https://www.adminer.org/#download" target="_blank" rel="noreferrer noopener" id="version"></a>
</h1>
<script src='adminer.php?file=jush.js&amp;version=4.6.4-dev' nonce="NzY4M2MwODNjOTcyOWU5NjQ2M2RhYzkwMWYxMWJlMmQ="></script>
<script nonce="NzY4M2MwODNjOTcyOWU5NjQ2M2RhYzkwMWYxMWJlMmQ=">
var jushLinks = { sql: [ 'adminer.php?username=root&db=employees&table=$&', /\b(current_dept_emp|departments|dept_emp|dept_emp_latest_date|dept_manager|employees|salaries|titles)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.7');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="username" value="root"><span title='database'>DB</span>: <select name='db'><option value=""><option>addressbook<option selected>employees<option>information_schema<option>mysql<option>performance_schema<option>sys</select><script nonce="NzY4M2MwODNjOTcyOWU5NjQ2M2RhYzkwMWYxMWJlMmQ=">mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});</script>
<input type='submit' value='Use' class='hidden'>
</p></form>
<p class='links'><a href='adminer.php?username=root&amp;db=employees&amp;sql='>SQL command</a>
<a href='adminer.php?username=root&amp;db=employees&amp;import='>Import</a>
<a href='adminer.php?username=root&amp;db=employees&amp;dump=dept_emp_latest_date' id='dump'>Export</a>
<a href="adminer.php?username=root&amp;db=employees&amp;create=">Create table</a>
<ul id='tables'><script nonce="NzY4M2MwODNjOTcyOWU5NjQ2M2RhYzkwMWYxMWJlMmQ=">mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});</script>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=current_dept_emp" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=current_dept_emp" class='view' title='Show structure'>current_dept_emp</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=departments" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=departments" class='structure' title='Show structure'>departments</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=dept_emp" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=dept_emp" class='structure' title='Show structure'>dept_emp</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=dept_emp_latest_date" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=dept_emp_latest_date" class='active view' title='Show structure'>dept_emp_latest_date</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=dept_manager" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=dept_manager" class='structure' title='Show structure'>dept_manager</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=employees" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=employees" class='structure' title='Show structure'>employees</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=salaries" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=salaries" class='structure' title='Show structure'>salaries</a>
<li><a href="adminer.php?username=root&amp;db=employees&amp;select=titles" class='select'>select</a> <a href="adminer.php?username=root&amp;db=employees&amp;table=titles" class='structure' title='Show structure'>titles</a>
</ul>
</div>
<script nonce="NzY4M2MwODNjOTcyOWU5NjQ2M2RhYzkwMWYxMWJlMmQ=">setupSubmitHighlight(document);</script>
